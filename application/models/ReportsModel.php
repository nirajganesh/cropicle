<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportsmodel extends CI_Model{

	function userDemands($from,$to){
		return $this->db->select('u.name, u.mobile_no, cd.demand_amount, l.area, l.city, l.state, l.pin_code, cd.address, cd.created')
						->from('customer_demands cd')
						->join('users u', 'u.id = cd.user_id', 'LEFT')
						->join('locations_master l', 'l.id = cd.location_id', 'LEFT')
						->where("cd.created >='$from'")
						->where("cd.created <='$to'")
						->where('cd.status','APPROVED')
						->get()->result();
	}

	function custRates(){
		return $this->db->select('i.item_name, i.item_price_customer, u.unit_short_name')
						->from('items_master i')
						->join('units u', 'u.id = i.unit_id', 'LEFT')
						->where("i.is_active",'1')
						->where("i.category_active",'1')
						->where("i.admin_item",'0')
						->get()->result();
	}

	function hawkerRates(){
		return $this->db->select('i.item_name, i.item_price_kart, u.unit_short_name')
						->from('items_master i')
						->join('units u', 'u.id = i.unit_id', 'LEFT')
						->where("i.is_active",'1')
						->where("i.category_active",'1')
						->where("i.admin_item",'0')
						->get()->result();
	}

	function detailedUserDemands($from,$to){
		$arr= $this->db->select('cd.id,u.name, cd.phone_no, cd.demand_amount, cd.customer_remarks, cd.address')
						->from('customer_demands cd')
						->join('users u', 'u.id = cd.user_id', 'LEFT')
						->where("cd.created >='$from'")
						->where("cd.created <='$to'")
						->where('cd.status','APPROVED')
						->get()->result();
		foreach($arr as $a){
			$a->items=$this->detailedUserDemandsItems($a->id);
		}
		return $arr;
	}
	function detailedUserDemandsItems($did){
		return $this->db->select('cdd.item_price_customer, cdd.item_quantity, i.item_name, ut.unit_short_name')
						->from('customer_demand_details cdd')
						->join('items_master i', 'i.id = cdd.item_id', 'LEFT')
						->join('units ut', 'ut.id = i.unit_id', 'LEFT')
						->where('cdd.customer_demand_id',$did)
						->get()->result();
	}


	function approvedUserDemands($from,$to){
		$arr= $this->db->select('cd.id,u.name, cd.phone_no, cd.demand_amount, cd.customer_remarks, cd.address')
						->from('customer_demands cd')
						->join('users u', 'u.id = cd.user_id', 'LEFT')
						->where("cd.created >='$from'")
						->where("cd.created <='$to'")
						->where('cd.status','APPROVED')
						->where('cd.is_processed',0)
						->get()->result();
		foreach($arr as $a){
			$a->items=$this->detailedUserDemandsItems($a->id);
			$this->db->where('id',$a->id)->update('customer_demands',['is_processed'=>1]);
		}
		return $arr;
	}

	function processedUserDemands($from,$to){
		$arr= $this->db->select('cd.id,u.name, cd.phone_no,cd.demand_amount, cd.customer_remarks, cd.address')
						->from('customer_demands cd')
						->join('users u', 'u.id = cd.user_id', 'LEFT')
						->where("cd.created >='$from'")
						->where("cd.created <='$to'")
						->where('cd.is_delivered',0)
						->where('cd.status','APPROVED')
						->where('cd.is_processed',1)
						->get()->result();
		foreach($arr as $a){
			$a->items=$this->detailedUserDemandsItems($a->id);
		}
		return $arr;
	}

	function deliveredUserDemands($from,$to){
		$arr= $this->db->select('cd.id,u.name, cd.phone_no,cd.demand_amount, cd.customer_remarks, cd.address')
						->from('customer_demands cd')
						->join('users u', 'u.id = cd.user_id', 'LEFT')
						->where("cd.created >='$from'")
						->where("cd.created <='$to'")
						->where('cd.is_delivered',1)
						->where('cd.status','APPROVED')
						->get()->result();
		foreach($arr as $a){
			$a->items=$this->detailedUserDemandsItems($a->id);
		}
		return $arr;
	}

	function rejectedUserDemands($from,$to){
		$arr= $this->db->select('cd.id,u.name, cd.phone_no,cd.demand_amount, cd.customer_remarks, cd.address')
						->from('customer_demands cd')
						->join('users u', 'u.id = cd.user_id', 'LEFT')
						->where("cd.created >='$from'")
						->where("cd.created <='$to'")
						->where('cd.status','REJECTED')
						->get()->result();
		foreach($arr as $a){
			$a->items=$this->detailedUserDemandsItems($a->id);
		}
		return $arr;
	}

	function undeliveredItemWiseDemands($from,$to){
		$arr= $this->db->select('cd.id')
						->from('customer_demands cd')
						->where("cd.created >='$from'")
						->where("cd.created <='$to'")
						->where('cd.status','APPROVED')
						->where('cd.is_delivered',0)
						->get()->result();
		foreach($arr as $a){
			$a->items=$this->itemWiseDemandsItems($a->id);
		}
		$veg=array();
		foreach($arr as $a){
			foreach($a->items as $it){
				if(isset($veg[$it->id])){
					$veg[$it->id]['qty']+=$it->item_quantity;
				}
				else{
					$veg[$it->id]['qty']=$it->item_quantity;
					$veg[$it->id]['name']=$it->item_name;
					$veg[$it->id]['unit']=$it->unit_short_name;
				}
			}
		}
		// echo'<pre>';var_dump($arr, $veg);exit;
		return $veg;
	}

	function itemWiseDemands($from,$to){
		$arr= $this->db->select('cd.id')
						->from('customer_demands cd')
						->where("cd.created >='$from'")
						->where("cd.created <='$to'")
						->where('cd.status','APPROVED')
						->get()->result();
		foreach($arr as $a){
			$a->items=$this->itemWiseDemandsItems($a->id);
		}
		$veg=array();
		foreach($arr as $a){
			foreach($a->items as $it){
				if(isset($veg[$it->id])){
					$veg[$it->id]['qty']+=$it->item_quantity;
				}
				else{
					$veg[$it->id]['qty']=$it->item_quantity;
					$veg[$it->id]['name']=$it->item_name;
					$veg[$it->id]['unit']=$it->unit_short_name;
				}
			}
		}
		// echo'<pre>';var_dump($arr, $veg);exit;
		return $veg;
	}
	function itemWiseDemandsItems($did){
		return $this->db->select('cdd.item_quantity, i.id, i.item_name, ut.unit_short_name')
						->from('customer_demand_details cdd')
						->join('items_master i', 'i.id = cdd.item_id', 'LEFT')
						->join('units ut', 'ut.id = i.unit_id', 'LEFT')
						->where('cdd.customer_demand_id',$did)
						->get()->result();
	}



}
?>