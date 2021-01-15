<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends MY_Controller {

        function __construct(){
                parent:: __construct();
                $this->redirectIfNotLoggedIn();
                $this->load->model('GetModel','fetch');
                $this->load->model('DeleteModel','delete');
        }

        public function News($id)
        {
            $news= $this->fetch->getInfoById('news','id',$id);
            $status= $this->delete->deleteById('news','id',$id);
            if($status){
                if($news->img_src!='defaultNews.png'){
                    $path= 'assets/news/'.$news->img_src;
                    unlink("$path");
                }
                $this->session->set_flashdata('success','News Deleted!');
                redirect('Admin/News');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('Admin/News');
            }
        }

        public function demand($id)
        {
            $status= $this->delete->deleteById('demand_lists','id',$id);
            if($status){
                $this->session->set_flashdata('success','Demand list Deleted!');
                redirect('demand-lists');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('demand-lists');
            }
        }

        public function profile_img()
        {
            $info= $this->fetch->getInfoById('user_info','user_id',$this->session->kart->id);
            $this->load->model('EditModel','edit');
            $data['profile_img']='';
            $status= $this->edit->updateInfoById('user_info',$data,'user_id',$this->session->kart->id);
            if($status){
                if($info->profile_img!=''){
                    $path= 'assets/images/'.$info->profile_img;
                    unlink($path);
                }
                $this->session->set_flashdata('success','Profile image deleted!');
            }
            else{
                $this->session->set_flashdata('failed','Some error occured!');
            }
        }

}
