<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('GetModel','fetch');
		$this->load->model('ReportsModel','report');
		$this->load->model('AddModel','save');
		$this->redirectIfAdminNotLoggedIn();
	}

	public function index()
	{
		$loc=$this->fetch->getInfo('locations_master');
		$this->load->view('admin/header',['reportTitle'=>'Reports','loc'=>$loc]);
		$this->load->view('admin/reports');
		$this->load->view('admin/footer');
	}
	
	
	public function showReport()
	{
		$from=date('Y-m-d 00:00:00',strtotime($_POST['from']));
		$your_date = strtotime("1 day", strtotime($_POST['to']));
		$to = date("Y-m-d 00:00:00", $your_date);

		switch ($_POST['type']) {

			case 'userDemands':
				$response= $this->report->userDemands($from, $to);
				foreach($response as $r){
					$r->name=$r->name.'<br>('.$r->mobile_no.')';
					$r->area=$r->area.', '.$r->city.', '.$r->state.', '.$r->pin_code ;
					$r->created=date('d-M-Y', strtotime($r->created));
					$r->date=$r->created;
					$r->demand_amount='₹'.$r->demand_amount.'/-';
					unset($r->city);
					unset($r->state);
					unset($r->pin_code);
					unset($r->mobile_no);
					unset($r->created);
					unset($r->status);
				}
				$result='"User demands" <br> From:'.date('d-M-Y',strtotime($_POST['from'])).'<br>To:'.date('d-M-Y',strtotime($_POST['to']));
				$title='User demands: '.date('d-m-y',strtotime($_POST['from'])).' to '.date('d-m-y',strtotime($_POST['to']));
			break;

			case 'detailedUserDemands':
				$response= $this->report->detailedUserDemands($from , $to);
				foreach($response as $r){
					$r->order_no=$r->id;
					$r->demand_amount='₹'.$r->demand_amount.'/-';
					$r->info= $r->name.'<br>('.$r->phone_no.')</mark><br>Address: '.$r->address.'<br> <mark> Bill amt. :'.$r->demand_amount;
					unset($r->id);
					unset($r->name);
					unset($r->address);
					unset($r->phone_no);
					unset($r->demand_amount);
					foreach($r->items as $i){
						$r->products[]=$i->item_name.' ('.$i->item_quantity.' '.$i->unit_short_name.') (₹'.$i->item_quantity*$i->item_price_customer.')';
					}
					unset($r->items);
					$r->items='';
					foreach($r->products as $p){
						$r->items.=$p.'<br>';
					}
					unset($r->products);
					$r->cust_remarks=$r->customer_remarks;
					unset($r->customer_remarks);
				}
				// echo '<pre>';var_dump($response);exit;
				$result='"All user demands" <br> From:'.date('d-M-Y',strtotime($_POST['from'])).'<br>To:'.date('d-M-Y',strtotime($_POST['to']));
				$title='All User demands: '.date('d-m-y',strtotime($_POST['from'])).' to '.date('d-m-y',strtotime($_POST['to']));
			break;

			case 'approvedUserDemands':
				$response= $this->report->approvedUserDemands($from , $to);
				foreach($response as $r){
					$r->order_no=$r->id;
					$r->demand_amount='₹'.$r->demand_amount.'/-';
					$r->info= $r->name.'<br>('.$r->phone_no.')</mark><br>Address: '.$r->address.'<br> <mark> Bill amt. :'.$r->demand_amount;
					unset($r->id);
					unset($r->name);
					unset($r->address);
					unset($r->phone_no);
					unset($r->demand_amount);
					foreach($r->items as $i){
						$r->products[]=$i->item_name.' ('.$i->item_quantity.' '.$i->unit_short_name.') (₹'.$i->item_quantity*$i->item_price_customer.')';
					}
					unset($r->items);
					$r->items='';
					foreach($r->products as $p){
						$r->items.=$p.'<br>';
					}
					unset($r->products);
					$r->cust_remarks=$r->customer_remarks;
					unset($r->customer_remarks);
				}
				// echo '<pre>';var_dump($response);exit;
				$result='"Un-processed user demands" <br> From:'.date('d-M-Y',strtotime($_POST['from'])).'<br>To:'.date('d-M-Y',strtotime($_POST['to']));
				$title='Approved User demands: '.date('d-m-y',strtotime($_POST['from'])).' to '.date('d-m-y',strtotime($_POST['to']));
			break;

			case 'processedUserDemands':
				$response= $this->report->processedUserDemands($from , $to);
				foreach($response as $r){
					$r->order_no=$r->id;
					$r->demand_amount='₹'.$r->demand_amount.'/-';
					$r->info= $r->name.'<br>('.$r->phone_no.')</mark><br>Address: '.$r->address.'<br> <mark> Bill amt. :'.$r->demand_amount;
					unset($r->id);
					unset($r->name);
					unset($r->address);
					unset($r->phone_no);
					unset($r->demand_amount);
					foreach($r->items as $i){
						$r->products[]=$i->item_name.' ('.$i->item_quantity.' '.$i->unit_short_name.') (₹'.$i->item_quantity*$i->item_price_customer.')';
					}
					unset($r->items);
					$r->items='';
					foreach($r->products as $p){
						$r->items.=$p.'<br>';
					}
					unset($r->products);
					$r->cust_remarks=$r->customer_remarks;
					unset($r->customer_remarks);
				}
				// echo '<pre>';var_dump($response);exit;
				$result='"Processed user demands" <br> From:'.date('d-M-Y',strtotime($_POST['from'])).'<br>To:'.date('d-M-Y',strtotime($_POST['to']));
				$title='Processed User demands: '.date('d-m-y',strtotime($_POST['from'])).' to '.date('d-m-y',strtotime($_POST['to']));
			break;

			case 'deliveredUserDemands':
				$response= $this->report->deliveredUserDemands($from , $to);
				foreach($response as $r){
					$r->order_no=$r->id;
					$r->demand_amount='₹'.$r->demand_amount.'/-';
					$r->info= $r->name.'<br>('.$r->phone_no.')</mark><br>Address: '.$r->address.'<br> <mark> Bill amt. :'.$r->demand_amount;
					unset($r->id);
					unset($r->name);
					unset($r->address);
					unset($r->phone_no);
					unset($r->demand_amount);
					foreach($r->items as $i){
						$r->products[]=$i->item_name.' ('.$i->item_quantity.' '.$i->unit_short_name.') (₹'.$i->item_quantity*$i->item_price_customer.')';
					}
					unset($r->items);
					$r->items='';
					foreach($r->products as $p){
						$r->items.=$p.'<br>';
					}
					unset($r->products);
					$r->cust_remarks=$r->customer_remarks;
					unset($r->customer_remarks);
				}
				// echo '<pre>';var_dump($response);exit;
				$result='"Delivered user demands" <br> From:'.date('d-M-Y',strtotime($_POST['from'])).'<br>To:'.date('d-M-Y',strtotime($_POST['to']));
				$title='Delivered User demands: '.date('d-m-y',strtotime($_POST['from'])).' to '.date('d-m-y',strtotime($_POST['to']));
			break;

			case 'rejectedUserDemands':
				$response= $this->report->rejectedUserDemands($from , $to);
				foreach($response as $r){
					$r->order_no=$r->id;
					$r->demand_amount='₹'.$r->demand_amount.'/-';
					$r->info= $r->name.'<br>('.$r->phone_no.')</mark><br>Address: '.$r->address.'<br> <mark> Bill amt. :'.$r->demand_amount;
					unset($r->id);
					unset($r->name);
					unset($r->address);
					unset($r->phone_no);
					unset($r->demand_amount);
					foreach($r->items as $i){
						$r->products[]=$i->item_name.' ('.$i->item_quantity.' '.$i->unit_short_name.') (₹'.$i->item_quantity*$i->item_price_customer.')';
					}
					unset($r->items);
					$r->items='';
					foreach($r->products as $p){
						$r->items.=$p.'<br>';
					}
					unset($r->products);
					$r->cust_remarks=$r->customer_remarks;
					unset($r->customer_remarks);
				}
				// echo '<pre>';var_dump($response);exit;
				$result='"Rejected user demands" <br> From:'.date('d-M-Y',strtotime($_POST['from'])).'<br>To:'.date('d-M-Y',strtotime($_POST['to']));
				$title='Rejected User demands: '.date('d-m-y',strtotime($_POST['from'])).' to '.date('d-m-y',strtotime($_POST['to']));
			break;

			case 'undeliveredItemWiseDemands':
				$response= $this->report->undeliveredItemWiseDemands($from , $to);
				$veg=$response;
				$response=array();
				$f=0;
				foreach($veg as $r){
					$response[$f]['Item']=$r['name'];
					$response[$f]['Quantity']=$r['qty'].' '.$r['unit'];
					$f++;
				}
				// echo '<pre>';var_dump($response);exit;
				$result='"Item wise demands (Un-delivered)" <br> From:'.date('d-M-Y',strtotime($_POST['from'])).'<br>To:'.date('d-M-Y',strtotime($_POST['to']));
				$title='Item wise demands (Un-delivered): '.date('d-m-y',strtotime($_POST['from'])).' to '.date('d-m-y',strtotime($_POST['to']));
			break;

			case 'itemWiseDemands':
				$response= $this->report->itemWiseDemands($from , $to);
				$veg=$response;
				$response=array();
				$f=0;
				foreach($veg as $r){
					$response[$f]['Item']=$r['name'];
					$response[$f]['Quantity']=$r['qty'].' '.$r['unit'];
					$f++;
				}
				// echo '<pre>';var_dump($response);exit;
				$result='"Item wise demands (Overall)" <br> From:'.date('d-M-Y',strtotime($_POST['from'])).'<br>To:'.date('d-M-Y',strtotime($_POST['to']));
				$title='Item wise demands (Overall): '.date('d-m-y',strtotime($_POST['from'])).' to '.date('d-m-y',strtotime($_POST['to']));
			break;

			case 'custRates':
				$response= $this->report->custRates();
				foreach($response as $r){
					$r->price='₹'.$r->item_price_customer.'/'.$r->unit_short_name;
					unset($r->item_price_customer);
					unset($r->unit_short_name);
				}
				$result='"Items rate list for customers"';
				$title='Rate list as on '.date('d-m-y');
			break;

			case 'hawkerRates':
				$response= $this->report->hawkerRates();
				foreach($response as $r){
					$r->price='₹'.$r->item_price_kart.'/'.$r->unit_short_name;
					unset($r->item_price_kart);
					unset($r->unit_short_name);
				}
				$result='"Items rate list for hawkers"';
				$title='Rate list for hawkers as on '.date('d-m-y');
			break;

			default:
				$response=false;
			break;
		}

		if($response){
			// echo '<pre>';var_dump($response);exit;
			if($_POST['type']=='approvedUserDemands'){
				$this->session->set_flashdata('info','The status of the below demands has now been updated as "Processed"');
			}
			$this->load->view('admin/header',['reportTitle'=>$title, 'response'=>$response, 'result'=>$result]);
			$this->load->view('admin/reports');
			$this->load->view('admin/footer');
		}
		else{
			$this->session->set_flashdata('info','No results found');
			redirect('reports');
		}
	}
	

}
