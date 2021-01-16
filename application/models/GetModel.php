<?php
class GetModel extends CI_Model{


    
    public function orderInfo($id)
    {
        $demands=$this->db->select('o.*, u.name, u.mobile_no')
                        ->from('orders o')
                        ->join('users u', 'u.id = o.user_id', 'LEFT')
                        ->where('o.id',$id)
                        ->get()
                        ->row();
        return $demands;
    }

    public function orderDetails($id)
    {
        $items=$this->db->select('od.qty, od.item_price_customer, i.item_name,i.item_img')
                        ->from('order_details od')
                        ->join('items_master i', 'i.id = od.item_id', 'LEFT')
                        // ->where('i.is_active','1')
                        ->where('od.order_id',$id)
                        ->get()
                        ->result();
        return $items;
    }


    public function todaysDemands($status=NULL)
    {
        $date=date('Y-m-d');
		$your_date = strtotime("1 day", strtotime($date));
		$dateto = date("Y-m-d 00:00:00", $your_date);
        $demands=$this->db->select('c.id, c.address, c.demand_amount, c.status, u.name, u.mobile_no')
                        ->from('customer_demands c')
                        ->join('users u', 'u.id = c.user_id', 'LEFT')
                        ->order_by('c.id','desc')
						->where("c.created >='$date'")
						->where("c.created <='$dateto'");
        if($status!=NULL){
            $demands=$this->db->where('c.status',$status);
        }
        $demands=$this->db->get()->result();
        // echo'<pre>';var_dump($demands);exit;
        return $demands;
    }


    public function orders($status)
    {
        $orders=$this->db->select('o.*, u.name, u.mobile_no')
                        ->from('orders o')
                        ->join('users u', 'u.id = o.user_id', 'LEFT')
                        ->order_by('o.id','desc')
                        ->where('o.status',$status)
                        ->get()
                        ->result();
        return $orders;
    }


    public function orderDetailsById($id)
    {
        $items=$this->db->select('od.qty, od.remaining_qty, od.item_id, i.item_name, i.item_price_kart')
                        ->from('order_details od')
                        ->join('items_master i', 'i.id = od.item_id', 'LEFT')
                        // ->where('i.is_active','1')
                        ->where('od.order_id',$id)
                        ->order_by('od.id','desc')
                        ->get()
                        ->result();
        return $items;
    }
    
    public function checkPendingOrders($user_id) 
    {
        return $this->db->where('status','ORDERED')->where('user_id',$user_id)->get('orders')->num_rows();
    }




    //  -----------------------------------------------------------



    public function getInfo($table)
    {
        return $this->db->get($table)->result();
    }

    public function getNotice()
    {
        return $this->db->get('notice_ribbon')->row();
    }

    public function getAllItems()
    {
        return $this->db->where('is_deleted',0)->get('items_master')->result();
    }

    public function getInfoById($table,$column,$id)
    {
        $this->db->where($column, $id);
        return $this->db->get($table)->row();
    }

    public function getInfoParams($table,$column,$id)
    {
        $this->db->where($column, $id);
        return $this->db->get($table)->result();
    }

    public function getInfoOrderBy($table,$column)
    {
        $this->db->order_by($column,'desc');
        return $this->db->get($table)->result();
    }


    public function getInfoLim($table,$lim,$orderby)
    {
        return $this->db->order_by($orderby,'desc')
                        ->limit($lim)
                        ->get($table)
                        ->result();
    }

    public function record_count($table,$col=NULL,$id=NULL) 
    {
        if($col!=NULL){
            return $this->db->where($col,$id)->get($table)->num_rows();
        }
        else{
            return $this->db->get($table)->num_rows();
        }
    }
    
    
    public function record_count_arr($table,$arr) 
    {
        return $this->db->where($arr)->get($table)->num_rows();
    }



    public function getAdminProfile()
    {
        return $this->db->get('users')->row();
    }


    public function getLastPayment($uid)
    {
        $last_order=$this->db->where('user_id',$uid)
                ->where('status','DELIVERED')
                ->order_by('id','desc')
                ->limit(1)
                ->get('orders')
                ->row()->total_amt;
        if(!empty($last_order)){
            return $last_order;
        }
        else{
            return false;
        }
    }

    

}
?>