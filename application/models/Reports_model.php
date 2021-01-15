<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportsmodel extends CI_Model{
	function salesBetweenDates($from,$to){
		$q=$this->db->query("SELECT * FROM transactions,sub_accounts WHERE transactions_type='SALES' AND  transactions_account=sub_accounts_id AND transactions_dr_cr='Dr' AND transactions_date BETWEEN '$from' AND '$to'");
	
		return $q=$q->result();
	}

	function expenseBetweenDates($from,$to){
		$q=$this->db->query("SELECT * FROM transactions,sub_accounts WHERE transactions_dr_cr = 'Cr' AND transactions_type='EXPENSE' AND transactions_account=sub_accounts_id AND transactions_date BETWEEN '$from' AND '$to'");
		return $q->result();
	}

	function itemSalesCustomerWiseBetweenDates($from,$to,$item){
		$q=$this->db->query("SELECT transactions_date,transactions_no,transactions_account,transactions_items_items_id,transactions_items_qty , transactions_items_name,items_code,sub_accounts_name FROM transactions,transactions_items,items,sub_accounts WHERE transactions_items_txn_no=transactions_no AND `transactions_items_items_id`=items_id AND transactions_type='SALES' AND transactions_dr_cr='Dr' AND transactions_type=transactions_items_txn_type AND sub_accounts_id=transactions_account AND `transactions_items_items_id`=$item AND transactions_date BETWEEN '$from' AND '$to'");
		return $q->result();
		
	}

	function itemSalesBetweenDates($from,$to){
		$q=$this->db->query("SELECT DISTINCT (transactions_items_items_id),transactions_items_name,items_code FROM transactions,transactions_items,items WHERE transactions_items_txn_no=transactions_no AND `transactions_items_items_id`=items_id AND transactions_type='SALES' AND transactions_dr_cr='Dr' AND transactions_type=transactions_items_txn_type AND transactions_date BETWEEN '$from' AND '$to'");
		if($q->result()){
			$q=$q->result();

			$size=count($q);
			$i=0;
			while ($size > $i) {
				//var_dump($q[$i]);exit;
				$id=$q[$i]->transactions_items_items_id;
				$q2=$this->db->query("SELECT SUM(`transactions_items_qty`)as qty FROM `transactions_items`,transactions WHERE `transactions_items_items_id`=$id AND transactions_items_txn_no=transactions_no AND transactions_type=transactions_items_txn_type AND transactions_type='SALES' AND transactions_dr_cr='Dr' AND transactions_date BETWEEN '$from' AND '$to'");
				$q2=$q2->row();
				
				$q[$i]->qty=$q2->qty;
				
				$i++;
			}
		}
		
		return $q;
		
	}

	function purchasesBetweenDates($from,$to){
		$q=$this->db->query("SELECT * FROM transactions,sub_accounts WHERE transactions_type='PURCHASE' AND  transactions_account=sub_accounts_id AND transactions_dr_cr='Cr' AND transactions_date BETWEEN '$from' AND '$to'");
	
		return $q=$q->result();
	}

	function receiptBetweenDates($from,$to){
		$q=$this->db->query("SELECT * FROM transactions,sub_accounts WHERE transactions_type='RECEIPT' AND  transactions_account=sub_accounts_id AND transactions_dr_cr='Cr' AND transactions_date BETWEEN '$from' AND '$to'");
	
		return $q=$q->result();
	}

	function paymentBetweenDates($from,$to){
		$q=$this->db->query("SELECT * FROM transactions,sub_accounts WHERE transactions_type='PAYMENT' AND  transactions_account=sub_accounts_id AND transactions_dr_cr='Dr' AND transactions_date BETWEEN '$from' AND '$to'");
	
		return $q=$q->result();
	}

	function IncomeExpenditure($from,$to){
		$q=$this->db->query("SELECT * FROM transactions,transactions_items WHERE transactions_no=transactions_items_txn_no AND transactions_type='SALES' AND transactions_items_txn_type='SALES' AND transactions_dr_cr='Dr' AND transactions_date BETWEEN '$from' AND '$to'");
		$q=$q->result();
		$saleAt5=0;
		$saleAt0=0;
		$saleAt12=0;
		$saleAt28=0;
		$saleAt18=0;

		foreach ($q as $value) {
			if ($value->transactions_items_cgst==0 && $value->transactions_items_igst==0) {
				 $taxable=0;
				 $taxable=($value->transactions_items_price*$value->transactions_items_qty)-(($value->transactions_items_price*$value->transactions_items_qty)*($value->transactions_items_disc/100));
				 $cgstitem=0;
				 $cgstitem=(($taxable)*(($value->transactions_items_cgst*2)/100));
	             $igstitem=0;
	             $igstitem=(($taxable)*($value->transactions_items_igst/100));
	             $itemamount=$taxable + $cgstitem + $igstitem; 
				$saleAt0+=$itemamount;
			}
			elseif ($value->transactions_items_cgst==2.5 || $value->transactions_items_igst==5) {
				 $taxable=0;
				 $taxable=($value->transactions_items_price*$value->transactions_items_qty)-(($value->transactions_items_price*$value->transactions_items_qty)*($value->transactions_items_disc/100));
				 $cgstitem=0;
				 $cgstitem=(($taxable)*(($value->transactions_items_cgst*2)/100));
	             $igstitem=0;
	             $igstitem=(($taxable)*($value->transactions_items_igst/100));
	             $itemamount=$taxable + $cgstitem + $igstitem; 
				$saleAt5+=$itemamount;
			}
			elseif ($value->transactions_items_cgst==6 || $value->transactions_items_igst==12) {
				 $taxable=0;
				 $taxable=($value->transactions_items_price*$value->transactions_items_qty)-(($value->transactions_items_price*$value->transactions_items_qty)*($value->transactions_items_disc/100));
				 $cgstitem=0;
				 $cgstitem=(($taxable)*(($value->transactions_items_cgst*2)/100));
	             $igstitem=0;
	             $igstitem=(($taxable)*($value->transactions_items_igst/100));
	             $itemamount=$taxable + $cgstitem + $igstitem; 
				$saleAt12+=$itemamount;
			}
			elseif ($value->transactions_items_cgst==9 || $value->transactions_items_igst==28) {
				 $taxable=0;
				 $taxable=($value->transactions_items_price*$value->transactions_items_qty)-(($value->transactions_items_price*$value->transactions_items_qty)*($value->transactions_items_disc/100));
				 $cgstitem=0;
				 $cgstitem=(($taxable)*(($value->transactions_items_cgst*2)/100));
	             $igstitem=0;
	             $igstitem=(($taxable)*($value->transactions_items_igst/100));
	             $itemamount=$taxable + $cgstitem + $igstitem; 
				$saleAt18+=$itemamount;
			}
			elseif ($value->transactions_items_cgst==14 || $value->transactions_items_igst==28) {
				 $taxable=0;
				 $taxable=($value->transactions_items_price*$value->transactions_items_qty)-(($value->transactions_items_price*$value->transactions_items_qty)*($value->transactions_items_disc/100));
				 $cgstitem=0;
				 $cgstitem=(($taxable)*(($value->transactions_items_cgst*2)/100));
	             $igstitem=0;
	             $igstitem=(($taxable)*($value->transactions_items_igst/100));
	             $itemamount=$taxable + $cgstitem + $igstitem; 
				$saleAt28+=$itemamount;
			}
		}

		$q=$this->db->query("SELECT * FROM transactions,transactions_items WHERE transactions_no=transactions_items_txn_no AND transactions_type='PURCHASE' AND transactions_items_txn_type='PURCHASE' AND transactions_dr_cr='Cr' AND transactions_date BETWEEN '$from' AND '$to'");
		$q=$q->result();
		$purchaseAt5=0;
		$purchaseAt0=0;
		$purchaseAt12=0;
		$purchaseAt28=0;
		$purchaseAt18=0;

		foreach ($q as $value) {
			if ($value->transactions_items_cgst==0 && $value->transactions_items_igst==0) {
				 $taxable=0;
				 $taxable=($value->transactions_items_price*$value->transactions_items_qty)-(($value->transactions_items_price*$value->transactions_items_qty)*($value->transactions_items_disc/100));
				 $cgstitem=0;
				 $cgstitem=(($taxable)*(($value->transactions_items_cgst*2)/100));
	             $igstitem=0;
	             $igstitem=(($taxable)*($value->transactions_items_igst/100));
	             $itemamount=$taxable + $cgstitem + $igstitem; 
				$purchaseAt0+=$itemamount;
			}
			elseif ($value->transactions_items_cgst==2.5 || $value->transactions_items_igst==5) {
				$taxable=0;
				 $taxable=($value->transactions_items_price*$value->transactions_items_qty)-(($value->transactions_items_price*$value->transactions_items_qty)*($value->transactions_items_disc/100));
				 $cgstitem=0;
				 $cgstitem=(($taxable)*(($value->transactions_items_cgst*2)/100));
	             $igstitem=0;
	             $igstitem=(($taxable)*($value->transactions_items_igst/100));
	             $itemamount=$taxable + $cgstitem + $igstitem; 
				$purchaseAt5+=$itemamount;
			}
			elseif ($value->transactions_items_cgst==6 || $value->transactions_items_igst==12) {
				$taxable=0;
				 $taxable=($value->transactions_items_price*$value->transactions_items_qty)-(($value->transactions_items_price*$value->transactions_items_qty)*($value->transactions_items_disc/100));
				 $cgstitem=0;
				 $cgstitem=(($taxable)*(($value->transactions_items_cgst*2)/100));
	             $igstitem=0;
	             $igstitem=(($taxable)*($value->transactions_items_igst/100));
	             $itemamount=$taxable + $cgstitem + $igstitem; 
				$purchaseAt12+=$itemamount;
			}
			elseif ($value->transactions_items_cgst==9 || $value->transactions_items_igst==18) {
				$taxable=0;
				 $taxable=($value->transactions_items_price*$value->transactions_items_qty)-(($value->transactions_items_price*$value->transactions_items_qty)*($value->transactions_items_disc/100));
				 $cgstitem=0;
				 $cgstitem=(($taxable)*(($value->transactions_items_cgst*2)/100));
	             $igstitem=0;
	             $igstitem=(($taxable)*($value->transactions_items_igst/100));
	             $itemamount=$taxable + $cgstitem + $igstitem; 
				$purchaseAt18+=$itemamount;
			}
			elseif ($value->transactions_items_cgst==14 || $value->transactions_items_igst==28) {
				$taxable=0;
				 $taxable=($value->transactions_items_price*$value->transactions_items_qty)-(($value->transactions_items_price*$value->transactions_items_qty)*($value->transactions_items_disc/100));
				 $cgstitem=0;
				 $cgstitem=(($taxable)*(($value->transactions_items_cgst*2)/100));
	             $igstitem=0;
	             $igstitem=(($taxable)*($value->transactions_items_igst/100));
	             $itemamount=$taxable + $cgstitem + $igstitem; 
				$purchaseAt28+=$itemamount;
			}
		} //for each
		$q2=$this->db->query("SELECT sub_accounts_id FROM sub_accounts WHERE sub_accounts_name LIKE '%shipping%'LIMIT 1");
		$id=$q2->row();
		$id=$id->sub_accounts_id;
		
		$q=$this->db->query("SELECT * FROM transactions WHERE  transactions_type='EXPENSE'  AND transactions_dr_cr='Cr' AND transactions_date BETWEEN '$from' AND '$to'");
		$q=$q->result();
		$freightexpense=0;
		foreach ($q as  $value) {
			$freightexpense+=$value->transactions_amount;
		}

		$report= new stdClass();
		$report->freightexpense=$freightexpense;
		$report->purchaseAt0=$purchaseAt0;
		$report->purchaseAt5=$purchaseAt5;
		$report->purchaseAt12=$purchaseAt12;
		$report->purchaseAt18=$purchaseAt18;
		$report->purchaseAt28=$purchaseAt28;
		$report->saleAt0=$saleAt0;
		$report->saleAt5=$saleAt5;
		$report->saleAt12=$saleAt12;
		$report->saleAt18=$saleAt18;
		$report->saleAt28=$saleAt28;
		$report->saletotal=$saleAt0+$saleAt5+$saleAt12+$saleAt18+$saleAt28;
		$report->purchasetotal=$purchaseAt0+$purchaseAt5+$purchaseAt12+$purchaseAt18+$purchaseAt28;
		$report->from=$from;
		$report->to=$to;
		//var_dump($report);
		return $report;

	}


}
?>