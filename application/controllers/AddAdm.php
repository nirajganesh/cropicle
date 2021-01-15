<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddAdm extends MY_Controller {

        function __construct(){
                parent:: __construct();
                $this->redirectIfAdminNotLoggedIn();
                $this->load->model('AddModel','save');
                $this->load->model('GetModel','fetch');
        }

        public function item()
        {
            $this->form_validation->set_rules('item_name', 'Name', 'required');
            $this->form_validation->set_rules('item_price_customer', 'Customer price', 'required');
            $this->form_validation->set_rules('max_order_qty', 'Max order qty', 'required');
            // $this->form_validation->set_rules('unit_id', 'Unit', 'required');
            $this->form_validation->set_rules('category_id', 'Category', 'required');
            if($this->form_validation->run() == true){
                $imagename = 'defaultItem.jpg';
                $data=$this->input->post();
                
                // echo'<pre>';var_dump($data);exit;
                if( $_FILES['img']['name']!=null ){
                    $path ='assets/images/items';
                    $initialize = array(
                        "upload_path" => $path,
                        "allowed_types" => "jpg|jpeg|png|bmp",
                        "remove_spaces" => TRUE
                    );
                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('img')) {
                        $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())));
                        redirect('add-item');
                    }
                    else {
                        $imgdata = $this->upload->data();
                        $imagename = $imgdata['file_name'];
                    } 
                }
                $data['item_img']=$imagename;

                $status= $this->save->saveInfo('items_master',$data);
                if($status){
                    $this->session->set_flashdata('success','Item added !' );
                    redirect('add-item');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('add-item');
                }
            }
            else{
                $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
                redirect('add-item');
            }
        }

        public function category()
        {
            // echo'<pre>';var_dump($this->input->post(),$_FILES);exit;
            $this->form_validation->set_rules('category_name', 'Name', 'required');
            if($this->form_validation->run() == true){
                $data=$this->input->post();
                if( $_FILES['img']['name']!=null ){
                    $path ='assets/images';
                    $initialize = array(
                        "upload_path" => $path,
                        "allowed_types" => "jpg|jpeg|png|bmp",
                        "remove_spaces" => TRUE
                    );
                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('img')) {
                        $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())));
                        redirect('add-item');
                    }
                    else {
                        $imgdata = $this->upload->data();
                        $imagename = $imgdata['file_name'];
                    } 
                }
                $data['img_src']=$imagename;
                $status= $this->save->saveInfo('categories_master',$data);
                if($status){
                    $this->session->set_flashdata('success','category added !' );
                    redirect('categories-master');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('add-cat');
                }
            }
            else{
                $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
                redirect('add-cat');
            }
        }

        
        public function saveDemand()
        {
            $this->form_validation->set_rules('name', 'Customer name', 'required');
            $this->form_validation->set_rules('phone', 'Customer contact no. ', 'required');
            $this->form_validation->set_rules('address', 'Delivery address', 'required');
            $this->form_validation->set_rules('item_id[]', 'Item', 'required');
            $this->form_validation->set_rules('qty[]', 'Item qty', 'required');
            if($this->form_validation->run() == true){
                $arr=$this->input->post();
                $data['address']=$this->input->post('address');
                $data['customer_remarks']='Customer name & no. : '.$this->input->post('name').' ('.$this->input->post('phone').')';
                $data['status']='PENDING';
                $data['phone_no']=$this->input->post('phone');
                $data['location_id']=0;
                $data['user_id']=1;
                $data['demand_amount']=0;
                for($d=0;$d<sizeof($arr['item_id']);$d++){
                    $data['demand_amount']+=$arr['qty'][$d]*$arr['price'][$d];
                }
                // echo'<pre>';var_dump($data);exit;

                $this->db->trans_start();
                $demand_id=$this->save->saveInfo('customer_demands',$data);
                for($d=0;$d<sizeof($arr['item_id']);$d++){
                    $data2['customer_demand_id']=$demand_id;
                    $data2['item_id']=$arr['item_id'][$d];
                    $data2['item_quantity']=$arr['qty'][$d];
                    $data2['item_price_customer']=$arr['price'][$d];
                    $this->save->saveInfo('customer_demand_details',$data2);
                }
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE)
                {
                    $this->session->set_flashdata('failed','Some error occured');
                    redirect('new-demand');
                }
                else{
                    $this->session->set_flashdata('success','Demand created !');
                    redirect('new-demand');
                }
            }
            else{
                $this->session->set_flashdata('failed','Invalid input');
                redirect('new-demand');
            }
        }

        public function addBanner()
        {
            // echo'<pre>';var_dump($this->input->post(),$_FILES);exit;
            // $this->form_validation->set_rules('text', 'Text', 'required');
            // if($this->form_validation->run() == true){
                $data=$this->input->post();
                if( $_FILES['img']['name']!=null ){
                    $path ='assets/images';
                    $initialize = array(
                        "upload_path" => $path,
                        "allowed_types" => "jpg|jpeg|png|bmp",
                        "remove_spaces" => TRUE
                    );
                    $this->load->library('upload', $initialize, 'imgupload');
                    $this->imgupload->initialize($initialize);
                    if (!$this->imgupload->do_upload('img')) {
                        $this->session->set_flashdata('failed',trim(strip_tags($this->imgupload->display_errors())));
                        redirect('add-banner');
                    }
                    else {
                        $imgdata = $this->imgupload->data();
                        $imagename = $imgdata['file_name'];
                    } 
                }
                $data['img_src']=$imagename;

                if( $_FILES['img2']['name']!=null ){
                    $path ='assets/images';
                    $initialize = array(
                        "upload_path" => $path,
                        "allowed_types" => "jpg|jpeg|png|bmp",
                        "remove_spaces" => TRUE
                    );
                    $this->load->library('upload', $initialize, 'imgupload2');
                    $this->imgupload2->initialize($initialize);
                    if (!$this->imgupload2->do_upload('img2')) {
                        $this->session->set_flashdata('failed',trim(strip_tags($this->imgupload2->display_errors())));
                        redirect('add-banner');
                    }
                    else {
                        $imgdata = $this->imgupload2->data();
                        $imagename = $imgdata['file_name'];
                    } 
                }
                $data['img_src480w']=$imagename;
                $status= $this->save->saveInfo('banner',$data);
                if($status){
                    $this->session->set_flashdata('success','Banner added !' );
                    redirect('banner');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('banner');
                }
            // }
            // else{
            //     $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
            //     redirect('add-banner');
            // }
        }

        public function location()
        {
            // echo'<pre>';var_dump($this->input->post(),$_FILES);exit;
            $this->form_validation->set_rules('area', 'Area', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('pin_code', 'Pincode', 'required|numeric');
            if($this->form_validation->run() == true){
                $data=$this->input->post();
                $status= $this->save->saveInfo('locations_master',$data);
                if($status){
                    $this->session->set_flashdata('success','Location added !' );
                    redirect('locations-master');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('add-loc');
                }
            }
            else{
                $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
                redirect('add-loc');
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
