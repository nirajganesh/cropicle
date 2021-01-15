<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends MY_Controller {

        function __construct()
        {
            parent:: __construct();
            $this->redirectIfNotLoggedIn();
            $this->load->model('GetModel','fetch');
            $this->load->model('EditModel','edit');
        }


        public function updateTC($id)
        {
            
            $data=$this->input->post();
            $unlink='';
            if( $_FILES['img']['name']!=null ){
                $path ='assets/tc';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "jpg|jpeg|png|bmp|pdf",
                    "remove_spaces" => TRUE
                );
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())));
                    redirect('Admin/TC');
                }
                else {
                    $imgdata = $this->upload->data();
                    $data['img_src'] = $imgdata['file_name'];
                    $tc= $this->fetch->getInfoById('transfer_cert','id',$id);
                    $unlink= 'assets/tc/'.$tc->img_src;
                }
            }
            $status= $this->edit->updateInfoById('transfer_cert',$data,'id', $id);

            if($status){
                if($unlink!=''){
                    unlink($unlink);
                }
                $this->session->set_flashdata('success','TC Updated !' );
                redirect('Admin/TC');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/TC');
            }
        }

        public function updateStock()
        {

            $data=$this->input->post();
            $stockId=$this->fetch->getStockToUpdate();
            if($stockId){
                $this->db->trans_start();
                $arr['updated_by_hawker']='1';
                $this->edit->updateInfoById('orders', $arr , 'id', $stockId);
                for($i=0;$i<sizeof($data['item_id']);$i++){
                    $info['remaining_qty']= $data['remaining_qty'][$i];
                    $this->edit->updateStock($info, $data['item_id'][$i], $stockId);
                }
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE)
                {
                    $this->session->set_flashdata('failed','some error occured');
                    redirect('manage-kart');
                }
                else{
                    $this->session->set_flashdata('success','Kart stock updated !');
                    redirect('manage-kart');
                }
            }
            else{
                $this->session->set_flashdata('info','Kart already up-to-date. Make an order to refill your kart !');
                redirect('manage-kart');
            }
        }

        public function updateDemand($id)
        {
            // echo'<pre>';var_dump($this->input->post());
            $this->form_validation->set_rules('name', 'List name', 'required');
            $this->form_validation->set_rules('item_id[]', 'Item', 'required');
            $this->form_validation->set_rules('qty[]', 'Item qty', 'required');
            if($this->form_validation->run() == true){
                $data=$this->input->post();
                $name['name']=$data['name'];
                $name['modified']=date('Y-m-d H:i:s');
                $this->load->model('AddModel','save');
                $this->load->model('DeleteModel','del');

                $this->db->trans_start();
                $this->edit->updateInfoById('demand_lists',$name,'id',$id);
                $this->del->deleteById('demand_lists_details','demand_list_id',$id);
                for($d=0;$d<sizeof($data['item_id']);$d++){
                    $data2['demand_list_id']=$id;
                    $data2['item_id']=$data['item_id'][$d];
                    $data2['qty']=$data['qty'][$d];
                    $data2['unit_id']='1';
                    $this->save->saveInfo('demand_lists_details',$data2);
                }
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE)
                {
                    $this->session->set_flashdata('failed','some error occured');
                    echo false;
                }
                else{
                    $this->session->set_flashdata('success','Demand list updated !');
                    echo true;
                }
            }
            else{
                $this->session->set_flashdata('failed','Invalid inputs');
                echo false;
            }
        }

        public function img_upload()
        {
            $path ='assets/images';
            $initialize = array(
                "upload_path" => $path,
                "allowed_types" => "jpg|jpeg|png|bmp",
                "remove_spaces" => TRUE,
                "max_size" => 820
            );
            $this->load->library('upload', $initialize);
            if (!$this->upload->do_upload('file')) {
                $error=trim(strip_tags($this->upload->display_errors()));
                $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())));
            }
            else {
                $imgdata = $this->upload->data();
                $data['profile_img'] = $imgdata['file_name'];
                $data['modified'] = date('Y-m-d H:i:s');
                $t= $this->fetch->getInfoById('user_info','user_id',$this->session->kart->id);
                $status= $this->edit->updateInfoById('user_info',$data,'user_id',$this->session->kart->id);
                if($status){
                    if($t->profile_img!=''){
                        unlink('assets/images/'.$t->profile_img);
                    }
                    $this->session->set_flashdata('success','Profile image updated');
                }
            }
           
        }

        public function general()
        {
            $data=$this->input->post();
            $this->session->kart->name=$data['name'];
            unset($data['name']);
            unset($data['mobile_no']);
            $data['modified'] = date('Y-m-d H:i:s');
            $status= $this->edit->updateInfoById('user_info',$data,'user_id', $this->session->kart->id);

            if($status){
                $this->session->set_flashdata('success','Profile updated !' );
                redirect('profile');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('profile');
            }
        }

        public function kart_profile()
        {
            $data=$this->input->post();
            $data['modified'] = date('Y-m-d H:i:s');
            $status= $this->edit->updateInfoById('user_info',$data,'user_id', $this->session->kart->id);

            if($status){
                $this->session->set_flashdata('success','Profile updated !' );
                redirect('profile');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('profile');
            }
        }

        public function bank_info()
        {
            $data=$this->input->post();
            $data['modified'] = date('Y-m-d H:i:s');
            // var_dump($data);exit;
            $status= $this->edit->updateInfoById('user_info',$data,'user_id', $this->session->kart->id);

            if($status){
                $this->session->set_flashdata('success','Profile updated !' );
                redirect('profile');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('profile');
            }
        }

        function generate_url_slug($string,$table,$field='slug',$key=NULL,$value=NULL){
            $t =& get_instance();
            $slug = url_title($string);
            $slug = strtolower($slug);
            $i = 0;
            $params = array ();
            $params[$field] = $slug;
            if($key)$params["$key !="] = $value; 
            while ($t->db->where($params)->get($table)->num_rows())
            {
                if (!preg_match ('/-{1}[0-9]+$/', $slug )){
                    $slug .= '-' . ++$i;
                }
                else{
                    $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
                }
                $params [$field] = $slug;
            }
                return $slug;
        }
        

}
