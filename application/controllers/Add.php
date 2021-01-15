<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends MY_Controller {

        function __construct(){
                parent:: __construct();
                $this->redirectIfNotLoggedIn();
                $this->load->model('AddModel','save');
                $this->load->model('GetModel','fetch');
        }

        public function saveDemand()
        {
            $this->form_validation->set_rules('name', 'List name', 'required');
            $this->form_validation->set_rules('item_id[]', 'Item', 'required');
            $this->form_validation->set_rules('qty[]', 'Item qty', 'required');
            if($this->form_validation->run() == true){
                $data=$this->input->post();
                $name['name']=$data['name'];
                $name['user_id']=$this->session->kart->id;
                // echo'<pre>';var_dump($data);exit;

                $this->db->trans_start();
                $demand_id=$this->save->saveInfo('demand_lists',$name);
                for($d=0;$d<sizeof($data['item_id']);$d++){
                    $data2['demand_list_id']=$demand_id;
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
                    $this->session->set_flashdata('success','Demand list created !');
                    echo true;
                }
            }
            else{
                echo false;
            }
        }

        public function newOrder()
        {
            $this->form_validation->set_rules('payment_type', 'Payment type', 'required');
            $this->form_validation->set_rules('total_qty', 'Qty', 'required');
            $this->form_validation->set_rules('total_amt', 'Amt', 'required');
            $this->form_validation->set_rules('demand_list_id', 'Demand', 'required');
            if($this->form_validation->run() == true){
                $data=$this->input->post();
                $data['user_id']=$this->session->kart->id;
                $data['date']=date('Y-m-d');
                $data['status']='ORDERED';
                $items=$this->fetch->demandListById($data['demand_list_id']);
                unset($data['demand_list_id']);
                $this->db->trans_start();
                $order_id=$this->save->saveInfo('orders',$data);
                $items->order_id=$order_id;
                foreach($items->items as $i){
                    $data2['order_id']=$items->order_id;
                    $data2['item_id']=$i->item_id;
                    $data2['qty']=$i->qty;
                    $data2['item_price_kart']=$i->item_price_kart;
                    $order_item_id=$this->save->saveInfo('order_details',$data2);
                }
                // echo'<pre>';var_dump($data,$items);exit;
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE)
                {
                    $this->session->set_flashdata('failed','some error occured');
                    redirect('demand-lists');
                }
                else{
                    $this->session->set_flashdata('success','Your order has been placed successfully. You can now see your order details in the orders section.');
                    redirect('demand-lists');
                }
            }
            else{
                $this->session->set_flashdata('failed','Please try again !' );
                redirect('demand-lists');
            }
        }

        public function saveNews()
        {
            $this->form_validation->set_rules('heading', 'Heading', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
            $this->form_validation->set_rules('date', 'Date', 'required');
            if($this->form_validation->run() == true){
                $imagename = 'defaultNews.png';
                $data=$this->input->post();
                if( $_FILES['img']['name']!=null ){
                    $path ='assets/news';
                    $initialize = array(
                        "upload_path" => $path,
                        "allowed_types" => "jpg|jpeg|png|bmp",
                        "remove_spaces" => TRUE
                    );
                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('img')) {
                        $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())));
                        redirect('Admin/News');
                    }
                    else {
                        $imgdata = $this->upload->data();
                        $imagename = $imgdata['file_name'];
                    } 
                }
                $data['img_src']=$imagename;
                $data['slug']=$this->generate_url_slug($this->input->post('heading'),'news');
                $status= $this->save->saveInfo('news',$data);

                if($status){
                    $this->session->set_flashdata('success','News added !' );
                    redirect('Admin/News');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('Admin/News');
                }
            }
            else{
                $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
                redirect('Admin/News');
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
