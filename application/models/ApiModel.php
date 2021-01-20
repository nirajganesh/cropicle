<?php
class ApiModel extends CI_Model{


    
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

    public function getInfo($table)
    {
        return $this->db->get($table)->result();
    }

    public function getActive($table)
    {
        return $this->db->where('is_active','1')->get($table)->result();
    }

    public function getUser($id)
    {
        $res=$this->db->select('u.*, ui.*')
                ->from('users u')
                ->join('user_info ui', 'ui.user_id = u.id', 'LEFT')
                // ->join('user_address ua', 'ua.user_id =u.id', 'LEFT')
                ->where('u.id',$id)
                // ->where('ua.is_default','1')
                ->get()
                ->row();
        return $res;
    }

    public function getInfoById($table,$column,$id)
    {
        $this->db->where($column, $id);
        return $this->db->get($table)->row();
    }

    public function getInfoArrById($table,$column,$id)
    {
        $this->db->where($column, $id);
        return $this->db->get($table)->result();
    }

    public function saveInfo($table,$d)
    {
        if(!empty($d)){
            $this->db->insert($table,$d);
            return $this->db->insert_id();
        }
		return false;
    }

    public function updateInfoById($tbl,$data,$col,$key)
    {
        $this->db->where($col,$key);
        $wpflag = $this->db->update($tbl,$data);
        if($wpflag){
            return true;
        }
        else{
            return false;
        }
    }
    

}
?>