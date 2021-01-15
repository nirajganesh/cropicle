<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditAdm extends MY_Controller {

        function __construct()
        {
            parent:: __construct();
            $this->redirectIfAdminNotLoggedIn();
            $this->load->model('GetModel','fetch');
            $this->load->model('EditModel','edit');
        }

        public function item($id)
        {
            // echo'<pre>';var_dump($this->input->post(),$_FILES);exit;
            $this->form_validation->set_rules('item_name', 'Name', 'required');
            $this->form_validation->set_rules('item_price_customer', 'Customer price', 'required');
            $this->form_validation->set_rules('item_price_kart', 'Hawker price', 'required');
            $this->form_validation->set_rules('max_order_qty', 'Max order qty', 'required');
            $this->form_validation->set_rules('unit_id', 'Unit', 'required');
            $this->form_validation->set_rules('category_id', 'Category', 'required');
            if($this->form_validation->run() == true){
                $unlink="";
                $data=$this->input->post();
                $data['buying_qtys']=explode(',',$data['buying_qtys']);
                sort($data['buying_qtys']);
                $data['buying_qtys']=implode('|',$data['buying_qtys']);
                $data['modified']=date('Y-m-d H:i:s');
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
                        redirect('items-master');
                    }
                    else {
                        $imgdata = $this->upload->data();
                        $data['item_img']= $imgdata['file_name'];
                        $itm= $this->fetch->getInfoById('items_master','id',$id);
                        if($itm->item_img!='defaultItem.jpg'){
                            $unlink= 'assets/images/items/'.$itm->item_img;
                        }
                    } 
                }

                $status= $this->edit->updateInfoById('items_master',$data,'id', $id);
                if($status){
                    if($unlink!=''){
                        unlink($unlink);
                    }
                    $this->session->set_flashdata('success','Item updated !' );
                    redirect('items-master');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('items-master');
                }
            }
            else{
                $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
                redirect('items-master');
            }
        }

        public function category($id)
        {
            // echo'<pre>';var_dump($this->input->post(),$_FILES);exit;
            $this->form_validation->set_rules('category_name', 'Name', 'required');
            if($this->form_validation->run() == true){
                $unlink="";
                $data=$this->input->post();
                $data['modified']=date('Y-m-d H:i:s');
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
                        redirect('categories-master');
                    }
                    else {
                        $imgdata = $this->upload->data();
                        $data['img_src']= $imgdata['file_name'];
                        $catarr= $this->fetch->getInfoById('categories_master','id',$id);
                        $unlink= 'assets/images/'.$catarr->img_src;
                    } 
                }
                $status= $this->edit->updateInfoById('categories_master',$data,'id', $id);
                if($status){
                    if($unlink!=''){
                        unlink($unlink);
                    }
                    $this->session->set_flashdata('success','Category updated !' );
                    redirect('categories-master');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('categories-master');
                }
            }
            else{
                $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
                redirect('categories-master');
            }
        }

        public function editBanner($id)
        {
            // echo'<pre>';var_dump($this->input->post(),$_FILES);exit;
            // $this->form_validation->set_rules('text', 'Text', 'required');
            // if($this->form_validation->run() == true){
                $unlink="";
                $unlink2="";
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
                        redirect('banner');
                    }
                    else {
                        $imgdata = $this->imgupload->data();
                        $data['img_src']= $imgdata['file_name'];
                        $catarr= $this->fetch->getInfoById('banner','id',$id);
                        $unlink= 'assets/images/'.$catarr->img_src;
                    } 
                }
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
                        redirect('banner');
                    }
                    else {
                        $imgdata = $this->imgupload2->data();
                        $data['img_src480w']= $imgdata['file_name'];
                        $catarr= $this->fetch->getInfoById('banner','id',$id);
                        $unlink2= 'assets/images/'.$catarr->img_src480w;
                    } 
                }
                $status= $this->edit->updateInfoById('banner',$data,'id', $id);
                if($status){
                    if($unlink!=''){
                        unlink($unlink);
                    }
                    if($unlink2!=''){
                        unlink($unlink2);
                    }
                    $this->session->set_flashdata('success','Banner updated !' );
                    redirect('banner');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('banner');
                }
            // }
            // else{
            //     $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
            //     redirect('banner');
            // }
        }

        public function location($id)
        {
            // echo'<pre>';var_dump($this->input->post(),$_FILES);exit;
            $this->form_validation->set_rules('area', 'Area', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('pin_code', 'Pincode', 'required|numeric');
            if($this->form_validation->run() == true){
                $data=$this->input->post();
                $data['modified']=date('Y-m-d H:i:s');
                $status= $this->edit->updateInfoById('locations_master',$data,'id', $id);
                if($status){
                    $this->session->set_flashdata('success','Location updated !' );
                    redirect('locations-master');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('locations-master');
                }
            }
            else{
                $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
                redirect('locations-master');
            }
        }

        public function itemStatus($id,$current_stat)
        {
            if($current_stat==0){
                $data['is_active']=1;
                $data['modified']=date('Y-m-d H:i:s');
            }
            else{
                $data['is_active']=0;
                $data['modified']=date('Y-m-d H:i:s');
            }
            $status= $this->edit->updateInfoById('items_master',$data,'id', $id);
            if($status){
                $this->session->set_flashdata('success','Item status updated !' );
                redirect('items-master');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('items-master');
            }
        }

        public function setDelivered($id)
        {
            $data['is_delivered']=1;
            $data['is_processed']=1;
            $data['modified']=date('Y-m-d H:i:s');
            $status= $this->edit->updateInfoById('customer_demands',$data,'id', $id);
            if($status){
                $this->session->set_flashdata('success','Demand status marked as delivered !' );
                redirect('approved-user-demands');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('approved-user-demands');
            }
        }

        public function locStatus($id,$current_stat)
        {
            if($current_stat==0){
                $data['is_active']=1;
                $data['modified']=date('Y-m-d H:i:s');
            }
            else{
                $data['is_active']=0;
                $data['modified']=date('Y-m-d H:i:s');
            }
            $status= $this->edit->updateInfoById('locations_master',$data,'id', $id);
            if($status){
                $this->session->set_flashdata('success','Location status updated !' );
                redirect('locations-master');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('locations-master');
            }
        }

        public function catStatus($id,$current_stat)
        {
            if($current_stat==0){
                $data['is_active']=1;
                $data['modified']=date('Y-m-d H:i:s');
                $data2['category_active']=1;
                $data2['modified']=date('Y-m-d H:i:s');
            }
            else{
                $data['is_active']=0;
                $data['modified']=date('Y-m-d H:i:s');
                $data2['category_active']=0;
                $data2['modified']=date('Y-m-d H:i:s');
            }
            $status= $this->edit->updateInfoById('categories_master',$data,'id', $id);
            $status= $this->edit->updateInfoById('items_master',$data2,'category_id', $id);
            if($status){
                $this->session->set_flashdata('success','Category status updated !' );
                redirect('categories-master');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('categories-master');
            }
        }

        public function kartStatus($id,$current_stat)
        {
            if($current_stat==0){
                $data['is_active']=1;
                $data['modified']=date('Y-m-d H:i:s');
            }
            else{
                $data['is_active']=0;
                $data['modified']=date('Y-m-d H:i:s');
            }
            $status= $this->edit->updateInfoById('users',$data,'id', $id);
            if($status){
                $this->session->set_flashdata('success','Kart status updated !' );
                redirect('karts');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('karts');
            }
        }

        public function userStatus($id,$current_stat)
        {
            if($current_stat==0){
                $data['is_active']=1;
                $data['modified']=date('Y-m-d H:i:s');
            }
            else{
                $data['is_active']=0;
                $data['modified']=date('Y-m-d H:i:s');
            }
            $status= $this->edit->updateInfoById('users',$data,'id', $id);
            if($status){
                $this->session->set_flashdata('success','User status updated !' );
                redirect('users');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('users');
            }
        }

        public function noticeStatus($id,$current_stat)
        {
            if($current_stat==0){
                $data['is_active']=1;
            }
            else{
                $data['is_active']=0;
            }
            $status= $this->edit->updateInfoById('notice_ribbon',$data,'id', $id);
            if($status){
                $this->session->set_flashdata('success','Notice status updated !' );
                redirect('notice');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('notice');
            }
        }

        public function notice($id)
        {
            $data=$this->input->post();
            $status= $this->edit->updateInfoById('notice_ribbon',$data,'id', $id);
            if($status){
                $this->session->set_flashdata('success','Notice updated !' );
                redirect('notice');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('notice');
            }
        }
        
        public function batchUpdatePrice()
        {
            $updateArray = array();
            for($x = 0; $x < sizeof($this->input->post('id')); $x++){
            
                $updateArray[] = array(
                    'id'=>$this->input->post('id')[$x],
                    'item_price_kart' => $this->input->post('item_price_kart')[$x],
                    'item_price_customer' => $this->input->post('item_price_customer')[$x]
                );
            }
            // echo'<pre>';var_dump($updateArray);exit;
            
            $this->db->trans_start();
            $this->db->update_batch('items_master',$updateArray, 'id');
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('failed','some error occured');
                redirect('price-manager');
            }
            else{
                $this->session->set_flashdata('success','Changes saved');
                redirect('price-manager');
            }
        }
        
        public function approveOrder($oid)
        {
            // Getting all items from the last order delivered to add the remaining qty to current order 
            $user_id=$this->fetch->getInfoById('orders','id',$oid)->user_id;
            $last_delivered=$this->fetch->getLastDelivered($user_id);

            // Re-structure POST data for easy array operations & calculate total amt & total qty after admin alterations
            $data=$this->input->post();
            $total_amt=0.00;
            $total_qty=0.00;
            for($i=0;$i<sizeof($data['item_id']);$i++){
                $arr[] = (object) [
                    'item_id' => $data['item_id'][$i],
                    'qty' => $data['qty'][$i]
                ];
                $price=$this->fetch->getInfoById('items_master','id',$data['item_id'][$i])->item_price_kart;
                $amt=$price*$data['qty'][$i];
                $total_amt+=$amt;
                $total_qty+=$data['qty'][$i];
            }

            // Add all the remaining qty's of the last order's items
            if(!empty($last_delivered)){
                foreach($arr as $o){
                    foreach($last_delivered as $k=>$old){
                        if($old->item_id==$o->item_id){
                            $o->qty+=$old->remaining_qty;
                            unset($last_delivered[$k]);
                        }
                        else{
                            $old->qty=$old->remaining_qty;
                        }
                    }
                }
                foreach($last_delivered as $o){
                    $arr[]=$o;
                }
            }

            $this->load->model('AddModel','add');
            // DB updations starts from here
            $this->db->trans_start();
            foreach($arr as $a){
                // If Current order contains the same item as the last order;s remaining item then update it
                if (in_array($a->item_id, $data['item_id'])){
                    $price=$this->fetch->getInfoById('items_master','id',$a->item_id)->item_price_kart;
                    $params = array("order_id"=>$oid, "item_id"=>$a->item_id);
                    $info= array("qty"=>$a->qty, "item_id"=>$a->item_id, "item_price_kart"=>$price, "updated"=>date('Y-m-d H:i:s'),);
                    $status= $this->edit->updateInfoByParams('order_details',$info,$params);
                }
                
                // If last order's remaining item is not in the current order then add it to current order stock (For Kart stock purpose, Amt. is not affected)
                else{
                    $price=$this->fetch->getInfoById('items_master','id',$a->item_id)->item_price_kart;
                    $info= array("order_id"=>$oid, "qty"=>$a->qty, "item_id"=>$a->item_id, "item_price_kart"=>$price);
                    $status= $this->add->saveInfo('order_details',$info);
                }
            }

            // Now change order status to delivered and update order total qty & price if altered by admin
            $info2= array("total_qty"=>$total_qty, "total_amt"=>$total_amt, "status"=>"DELIVERED");
            $params = array("id"=>$oid);
            $status= $this->edit->updateInfoByParams('orders',$info2,$params);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('failed','some error occured');
                redirect('kart-orders');
            }
            else{
                $this->session->set_flashdata('success','Kart order approved !');
                redirect('kart-orders');
            }
        }

        public function cancelOrder($oid)
        {
            $data['status']="REJECTED";
            $this->db->trans_start();
                $params = array("id"=>$oid);
                $status= $this->edit->updateInfoByParams('orders',$data,$params);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('failed','some error occured');
                redirect('kart-orders');
            }
            else{
                $this->session->set_flashdata('success','Order rejected !');
                redirect('kart-orders');
            }
        }
        
        public function approveDemand($did)
        {
            $data=$this->input->post();
            $data['status']="APPROVED";
            $data['notify']=1;
            // echo '<pre>';var_dump($data);exit;
            $this->db->trans_start();
                $params = array("id"=>$did);
                $status= $this->edit->updateInfoByParams('customer_demands',$data,$params);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('failed','some error occured');
                redirect('user-demands');
            }
            else{
                $this->session->set_flashdata('success','User demand approved !');
                redirect('user-demands');
            }
        }
        
        public function rejectDemand($did)
        {
            $data=$this->input->post();
            $data['status']="REJECTED";
            $data['notify']=1;
            $this->db->trans_start();
                $params = array("id"=>$did);
                $status= $this->edit->updateInfoByParams('customer_demands',$data,$params);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('failed','some error occured');
                redirect('user-demands');
            }
            else{
                $this->session->set_flashdata('success','User demand rejected !');
                redirect('user-demands');
            }
        }


}
