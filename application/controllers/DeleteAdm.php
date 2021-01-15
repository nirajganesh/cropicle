<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteAdm extends MY_Controller {

        function __construct(){
                parent:: __construct();
                $this->redirectIfAdminNotLoggedIn();
                $this->load->model('GetModel','fetch');
                $this->load->model('DeleteModel','delete');
        }

        public function item($id)
        {
            $itm= $this->fetch->getInfoById('items_master','id',$id);
            $status= $this->delete->deleteById('items_master','id',$id);
            if($status){
                if($itm->item_img!='defaultItem.jpg'){
                    $path= 'assets/images/items/'.$itm->item_img;
                    unlink($path);
                }
                $this->session->set_flashdata('success','Item deleted!');
                redirect('items-master');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('items-master');
            }
        }

        public function category($id)
        {
            $itm= $this->fetch->getInfoById('categories_master','id',$id);
            $status= $this->delete->deleteById('categories_master','id',$id);
            if($status){
                $path= 'assets/images/'.$itm->img_src;
                unlink($path);
                $this->session->set_flashdata('success','Category deleted!');
                redirect('categories-master');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('categories-master');
            }
        }

        public function delBanner($id)
        {
            $itm= $this->fetch->getInfoById('banner','id',$id);
            $status= $this->delete->deleteById('banner','id',$id);
            if($status){
                $path= 'assets/images/'.$itm->img_src;
                $path2= 'assets/images/'.$itm->img_src480w;
                unlink($path);
                unlink($path2);
                $this->session->set_flashdata('success','Banner deleted!');
                redirect('banner');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('banner');
            }
        }

        public function location($id)
        {
            $status= $this->delete->deleteById('locations_master','id',$id);
            if($status){
                $this->session->set_flashdata('success','Location deleted!');
                redirect('locations-master');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('locations-master');
            }
        }

        public function kart($id)
        {
            $status= $this->delete->deleteById('users','id',$id);
            $status= $this->delete->deleteById('user_info','user_id',$id);
            if($status){
                $this->session->set_flashdata('success','Kart deleted!');
                redirect('karts');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('karts');
            }
        }

        public function user($id)
        {
            $status= $this->delete->deleteById('users','id',$id);
            $status= $this->delete->deleteById('user_info','user_id',$id);
            if($status){
                $this->session->set_flashdata('success','user deleted!');
                redirect('karts');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('karts');
            }
        }

}
