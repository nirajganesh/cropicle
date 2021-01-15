<?php

class MY_Controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function loggedIn(){
        if(isset($this->session->kart->id)){
            return true;
        }
        else{
            return false;
        }
    }


    public function redirectIfNotLoggedIn($uri = 'Login'){
        if(!$this->loggedIn()){
            redirect($uri);
        }
    }

    public function redirectIfLoggedIn($uri = 'Home'){
        if($this->loggedIn()){
            redirect($uri);
        }
    }


    public function adminLoggedIn(){
        if(isset($this->session->admin->id)){
            return true;
        }
        else{
            return false;
        }
    }


    public function redirectIfAdminNotLoggedIn($uri = 'AdminLogin'){
        if(!$this->adminLoggedIn()){
            redirect($uri);
        }
    }

    public function redirectIfAdminLoggedIn($uri = 'Admin'){
        if($this->adminLoggedIn()){
            redirect($uri);
        }
    }

    
    protected function getPaginitionConfig($uri, $total_count, $rows =10){
        // for creating paginition configuration
        $config['base_url'] = site_url().$uri;
        $config['total_rows'] = $total_count;
        $config['per_page'] = $rows;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"> <a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        return $config;
    }

}