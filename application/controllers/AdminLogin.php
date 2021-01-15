<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Admin Login controller
 * @author Ankur Agrawal
 */
class AdminLogin extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
        $this->load->model('GetModel', 'fetch');
    }

    public function index(){
        $this->redirectIfAdminLoggedIn();
        $this->load->view('admin/login');
    }
    
    public function authenticate(){
        $this->redirectIfAdminLoggedIn();
        $this->form_validation->set_rules('mobile_no', 'Mobile no.', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $response ['errors'] = '';
        if($this->form_validation->run() == FALSE){
            $response[ 'errors' ]= 'Invalid inputs' ;
        }
        else{
            if($user = $this->auth->authenticateAdmin($this->input->post()) ){
                $userSessArr = array(
                    "role_id" => $user->role_id,
                    "user_id" => $user->id,
                    "login_time" =>date("Y-m-d H:i:s"),
                    "is_logged_in" => 1,
                    "ip_address" => $this->input->ip_address(),
                );
                $this->load->model('AddModel', 'add');
                $sessResult = $this->add->create_user_session($userSessArr);
                $user->admin_session_id = $sessResult;
                $this->session->set_userdata(['admin' =>  $user]);
                $this->redirectIfAdminLoggedIn();
            }
            else{
                $response['errors'] .= "Invalid Mobile no. or Password";
            }
        }
        $this->load->view('admin/login',$response);
    }

    public function changePwd(){
        $this->form_validation->set_rules('oldp', 'Old Password', 'required');
        $this->form_validation->set_rules('newp', 'New Password', 'required');
        $this->form_validation->set_rules('cnfp', 'Confirm Password', 'required|matches[newp]');
        if($this->form_validation->run() == TRUE){
            if( password_verify($this->input->post('oldp'), $this->session->admin->password) ){
                $data['password'] = password_hash( $this->input->post('cnfp'), PASSWORD_DEFAULT );
                $status=$this->auth->changeAdminPassword($data, $this->session->admin->id);

                if($status){
                    $this->session->admin->password=$data['password'];
                    $this->session->set_flashdata('success','Password Updated !');
                    redirect('admin-profile');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('admin-profile');
                }
            }
            else{
                $this->session->set_flashdata('failed','Invalid password! Please enter correct password');
                redirect('admin-profile');
            }
        }
        else{
            $this->session->set_flashdata('failed',trim(strip_tags(validation_errors())));
            redirect('admin-profile');
        }
    }

    public function logout(){
        $sessId='';
        $sessId = $this->session->admin->admin_session_id;
		if($sessId!=''){

			$data = array(
				"is_logged_in" => 0,
				"logout_time" => date("Y-m-d H:i:s"),
			);
            $this->load->model('EditModel', 'update');
            $sessResult = $this->update->updateInfoById('user_sessions', $data,'id',$sessId);
		}
        $this->session->unset_userdata(['admin']);
        $this->session->sess_destroy();
        $this->redirectIfAdminNotLoggedIn();
    }


}

