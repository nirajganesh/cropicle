<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policy extends MY_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('GetModel','fetch');
	}
	
	public function index()
	{
		$profile=$this->fetch->getWebProfile();
		$this->load->view('header',['web'=>$profile ,
									'title'=>'Privacy Policy',
									]);
		$this->load->view('policies');
		$this->load->view('footer');
	}

}
