<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('ApiModel','api');
    }


    public function items()
	{
        $data=$this->api->getInfo('items_master');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function categories()
	{
        $data['store']=$this->api->getInfo('categories_master');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function category($id)
	{
        $data=$this->api->getInfoById('categories_master','id',$id);
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function orders($uid)
	{
        $data=$this->api->getInfoById('orders','user_id',$uid);
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function order($oid)
	{
        $data['order_info']=$this->api->orderInfo($oid);
        $data['order_details']=$this->api->orderDetails($oid);
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function user($id)
	{
        $data=$this->api->getUser($id);
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
    



    public function index()
	{
        return;
    }

}