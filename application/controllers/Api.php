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
        $data =$this->api->getInfo('categories_master');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function category($id)
	{
        $data=$this->db->select('*')
                ->from('items_master')
                // ->join('items_master i', 'i.id = od.item_id', 'LEFT')
                // ->where('i.is_active','1')
                ->where('category_id',$id)
                ->get()
                ->result();
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