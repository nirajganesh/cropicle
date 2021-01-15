<?php
class GetModel extends CI_Model{


    public function demandLists($lim=NULL)
    {
        $lists=$this->db->select('id,name')
                        ->where('user_id',$this->session->kart->id)
                        ->limit($lim)
                        ->order_by('id','desc')
                        ->get('demand_lists')
                        ->result();
        foreach($lists as $list){
            $list->items=$this->demandListItems($list->id);
            $list->itemsCount=sizeof($list->items);
        }
        return $lists;
    }

    public function demandListsLess($lim=NULL)
    {
        $lists=$this->db->select('id,name,created')
                        ->where('user_id',$this->session->kart->id)
                        ->limit($lim)
                        ->order_by('id','desc')
                        ->get('demand_lists')
                        ->result();
        foreach($lists as $list){
            $list->itemsCount=$this->record_count('demand_lists_details','demand_list_id',$list->id);
        }
        return $lists;
    }

    public function demandListById($id)
    {
        $list=$this->db->select('id,name')
                        ->where('user_id',$this->session->kart->id)
                        ->where('id',$id)
                        ->get('demand_lists')
                        ->row();
        $list->items=$this->demandListItems($list->id);
        $list->itemsCount=sizeof($list->items);
        return $list;
    }

    public function demandListItems($listId)
    {
        $items=$this->db->select('dd.qty,dd.item_id, i.item_name, i.item_price_kart, u.unit_short_name')
                ->from('demand_lists_details dd')
                ->join('items_master i', 'i.id = dd.item_id', 'LEFT')
                ->join('units u', 'u.id = i.unit_id', 'LEFT')
                ->where('i.is_active','1')
                ->where('dd.is_active','1')
                ->where('dd.demand_list_id',$listId)
                ->order_by('dd.id','desc')
                ->get()
                ->result();
        return $items;
    }

    public function allItems($lim=NULL)
    {
        $items=$this->db->select('i.id, i.item_name, i.max_order_qty, i.item_price_kart, u.unit_short_name')
                ->from('items_master i')
                ->join('units u', 'u.id = i.unit_id', 'LEFT')
                ->where('i.is_active','1')
                ->where('i.category_active','1')
                ->limit($lim)
                ->order_by('i.id','desc')
                ->get()
                ->result();
        return $items;
    }

    public function allItemsCust($lim=NULL)
    {
        $items=$this->db->select('i.id, i.item_name, i.item_price_customer, u.unit_short_name')
                ->from('items_master i')
                ->join('units u', 'u.id = i.unit_id', 'LEFT')
                ->where('i.is_active','1')
                ->where('i.category_active','1')
                ->limit($lim)
                ->order_by('i.id','desc')
                ->get()
                ->result();
        return $items;
    }

    public function kartStock()
    {
        $latest_order=$this->db->limit(1)
                ->order_by('id','desc')
                ->where('user_id',$this->session->kart->id)
                ->where('status','DELIVERED')
                ->get('orders')
                ->row();
        if($latest_order){
            if($latest_order->updated_by_hawker=='1'){
                $latest_order=$latest_order->id;
                $order=$this->db->select('od.remaining_qty, od.updated, od.item_id, i.item_name, u.unit_short_name')
                                ->from('order_details od')
                                ->join('items_master i', 'i.id = od.item_id', 'LEFT')
                                ->join('units u', 'u.id = od.unit_id', 'LEFT')
                                ->where('od.order_id',$latest_order)
                                ->order_by('od.id','desc')
                                ->get()
                                ->result();
                return $order;
            }
            else{
                $latest_order=$latest_order->id;
                $order=$this->db->select('od.qty, od.updated, od.item_id, i.item_name, u.unit_short_name')
                                ->from('order_details od')
                                ->join('items_master i', 'i.id = od.item_id', 'LEFT')
                                ->join('units u', 'u.id = od.unit_id', 'LEFT')
                                ->where('od.order_id',$latest_order)
                                ->order_by('od.id','desc')
                                ->get()
                                ->result();
                return $order;
            }
        }
        else{
            return false;
        }

    }

    public function getStockToUpdate()
    {
        $latest_order=$this->db->limit(1)
                ->order_by('id','desc')
                ->where('user_id',$this->session->kart->id)
                ->where('status','DELIVERED')
                ->where('updated_by_hawker','0')
                ->get('orders');

        if($latest_order->num_rows()==0){
            return false;
        }
        else{
            return $latest_order->row()->id;
        }
    }

    
    public function getDemandInfo($id)
    {
        $demands=$this->db->select('c.id, c.created, c.status, c.location_id, c.demand_amount, c.customer_remarks, c.admin_remarks, c.phone_no, c.address, u.name')
                        ->from('customer_demands c')
                        ->join('users u', 'u.id = c.user_id', 'LEFT')
                        ->where('c.id',$id)
                        ->get()
                        ->row();
        return $demands;
    }

    public function userDemands($status)
    {
        $demands=$this->db->select('c.id, c.created, c.demand_amount, c.is_delivered, c.customer_remarks, c.user_id, u.name')
                        ->from('customer_demands c')
                        ->join('users u', 'u.id = c.user_id', 'LEFT')
                        ->order_by('c.id','desc')
                        ->where('c.status',$status)
                        ->get()
                        ->result();
        return $demands;
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

           
    public function userDemandDetails($id)
    {
        $items=$this->db->select('dd.item_quantity, dd.item_id, i.item_name, i.item_img, u.unit_short_name, dd.item_price_customer')
                        ->from('customer_demand_details dd')
                        ->join('items_master i', 'i.id = dd.item_id', 'LEFT')
                        ->join('units u', 'u.id = i.unit_id', 'LEFT')
                        // ->where('i.is_active','1')
                        ->where('dd.customer_demand_id',$id)
                        ->get()
                        ->result();
        return $items;
    }

    public function orders($status)
    {
        $orders=$this->db->select('o.id, o.date, o.total_qty, o.total_amt, u.name')
                        ->from('orders o')
                        ->join('users u', 'u.id = o.user_id', 'LEFT')
                        ->order_by('o.id','desc')
                        ->where('o.status',$status)
                        ->get()
                        ->result();
        return $orders;
    }

    public function kartOrders($status)
    {
        $orders=$this->db->select('o.id, o.date, o.total_qty, o.total_amt, u.name')
                        ->from('orders o')
                        ->join('users u', 'u.id = o.user_id', 'LEFT')
                        ->order_by('o.id','desc')
                        ->where('o.status',$status)
                        ->where('o.user_id',$this->session->kart->id)
                        ->get()
                        ->result();
        return $orders;
    }

    public function getLastDelivered($uid)
    {
        $last_order=$this->db->where('user_id',$uid)
                ->where('status','DELIVERED')
                ->order_by('id','desc')
                ->limit(1)
                ->get('orders')
                ->row()->id;
        $order=$this->orderDetailsById($last_order);
        if(!empty($order)){
            return $order;
        }
        else{
            return false;
        }
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
    
    public function getBeforeOrder($id)
    {
        $uid=$this->getInfoById('orders','id', $id)->user_id;
        $lid=$this->db->where('id <',$id)
                        ->where('user_id',$uid)
                        ->order_by('id','desc')
                        ->limit(1)
                        ->get('orders')
                        ->row();
        if($lid){
            return $lid->id;
        }
        else{
            return false;
        }
    }

    public function getPhone($phn)
    {
        $query= $this->db->select('*')
                        ->where('mobile_no',$phn)
                        ->get('users');
        return $query->num_rows();
    }

    public function checkPendingOrders($user_id) 
    {
            return $this->db->where('status','ORDERED')->where('user_id',$user_id)->get('orders')->num_rows();
    }

    public function checkDayEnd($user_id) 
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
        return $this->db->select('i.*, u.unit_short_name ')
                        ->from('items_master i')
                        ->join('units u','u.id=i.unit_id','LEFT')
                        // ->where('i.is_active',1)
                        ->get()
                        ->result();
    }

    public function getItemInfo2($id)
    {
        return $this->db->select('i.id, i.item_name, i.item_price_customer, i.item_img, u.unit_short_name')
                        ->from('items_master i')
                        ->join('units u', 'u.id = i.unit_id', 'LEFT')
                        ->where('i.id',$id)
                        ->where('i.is_active',1)
                        ->get()
                        ->row();
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

    public function getWebProfile()
    {
        return $this->db->get('webprofile')->row();
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

    public function getEnquiries()
    {
        return $this->db->get('enquiries')->result();
    }

    public function fetch_paginated_data($table,$limit, $start)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('id','desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getInfoQuery($table,$conds)
    {
        $this->db->where($conds);
        return $this->db->get($table)->result();
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



       // public function lastKartStock()
    // {
    //     $latest_order=$this->db->limit(1)
    //             ->order_by('id','desc')
    //             ->where('user_id',$this->session->kart->id)
    //             ->where('updated_by_hawker','0')
    //             ->get('orders')
    //             ->row();
    //     if(!empty($latest_order)){
    //         $latest_order=$latest_order->id;
    //         $order=$this->db->select('od.qty, od.updated, od.item_id, i.item_name, u.unit_short_name')
    //                         ->from('orders o')
    //                         ->join('order_details od', 'od.order_id = o.id', 'LEFT')
    //                         ->join('items_master i', 'i.id = od.item_id', 'LEFT')
    //                         ->join('units u', 'u.id = od.unit_id', 'LEFT')
    //                         ->where('o.is_deleted','0')
    //                         ->where('od.order_id',$latest_order)
    //                         ->order_by('o.id','desc')
    //                         ->get()
    //                         ->result();
    //         return $order;
    //     }
    //     else{
    //         return false;
    //     }
    // }

    // public function lastSecondKartStock()
    // {
    //     $last_second_order=$this->db->limit(1)
    //             ->order_by('id','desc')
    //             ->where('user_id',$this->session->kart->id)
    //             ->where('updated_by_hawker','1')
    //             ->get('orders')
    //             ->row()->id;

    //     $lsorder=$this->db->select('od.item_id, od.remaining_qty, od.updated, i.item_name, u.unit_short_name')
    //             ->from('order_details od')
    //             ->join('items_master i', 'i.id = od.item_id', 'LEFT')
    //             ->join('units u', 'u.id = od.unit_id', 'LEFT')
    //             ->where('od.order_id',$last_second_order)
    //             ->where('od.order_id',$last_second_order)
    //             ->get()
    //             ->result();
    //     return $lsorder;
    // }

    

}
?>