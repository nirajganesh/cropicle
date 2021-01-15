<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('GetModel','fetch');
		$this->load->model('AddModel','save');
		$this->redirectIfNotLoggedIn();
	}

	public function index()
	{
		$order=$this->fetch->kartStock();
		$total_demands=$this->fetch->record_count('demand_lists','user_id',$this->session->kart->id);
		$total_orders=$this->fetch->record_count('orders','user_id',$this->session->kart->id);
		$total_payments=$this->fetch->getInfoQuery('orders',['user_id'=>$this->session->kart->id, 'status'=>'DELIVERED']);
		$last_payment=0;
		$amt=$this->fetch->getLastPayment($this->session->kart->id);
		if($amt){
			$last_payment=$amt;
		}
		$q=0;
		$tc=0;
		if($order){
			foreach($order as $o){
				if(isset($o->remaining_qty)){
					$o->qty=$o->remaining_qty;
				}
				$time=date('d-m-Y',strtotime($o->updated));
				$q+=$o->qty;

				if($o->qty>0) { $tc++; }
			}
		}
		$response=['title'=>'Dashboard',
					'total_demands'=>$total_demands,
					'total_orders'=>$total_orders,
					'total_payments'=>sizeof($total_payments),
					'last_payment'=>$last_payment,
					'count'=>$tc,
					'qty'=>$q	
					];
		$this->load->view('kart/header',$response);
		$this->load->view('kart/index');
		$this->load->view('kart/footer');
	}

	public function profile()
	{
		$loc=$this->fetch->getInfoParams('locations_master','is_active','1');
		$profile=$this->fetch->getInfoById('user_info','user_id',$this->session->kart->id);
		$this->load->view('kart/header',['title'=>'Profile',
									'loc'=>$loc,
									'data'=>$profile
								]);
		$this->load->view('kart/profile');
		$this->load->view('kart/footer');
	}


	public function manageKart()
	{
		$lists=$this->fetch->demandLists(4);
		$total_demands=$this->fetch->record_count('demand_lists','user_id',$this->session->kart->id);
		$order=$this->fetch->kartStock();
		$stockId=$this->fetch->getStockToUpdate();
		if($stockId){
			$kart_up_to_date=0;
		}
		else{
			$kart_up_to_date=1;
		}
		$q=0;
		$c=0;
		$time=NULL;
		// echo'<pre>';var_dump($order);exit;
		if($order){
			foreach($order as $o){
				if(isset($o->remaining_qty)){
					$o->qty=$o->remaining_qty;
				}
				$time=date('d-m-Y',strtotime($o->updated));
				$q+=$o->qty;
			}
			$c=sizeof($order);
		}
		$response=['title'=>'Manage Kart',
					'data'=>$lists,
					'stock'=>$order,
					'total_demands'=>$total_demands,
					'count'=>$c,
					'time'=>$time,
					'kart_up_to_date'=>$kart_up_to_date,
					'qty'=>$q	
					];
		$this->load->view('kart/header',$response);
		$this->load->view('kart/manage-kart');
		$this->load->view('kart/footer');
	}

	public function demandLists()
	{
		$lists=$this->fetch->demandListsLess();
		// echo'<pre>';var_dump($lists);exit;
		$this->load->view('kart/header',['title'=>'Demand lists',
									'data'=>$lists
								]);
		$this->load->view('kart/demand-lists');
		$this->load->view('kart/footer');
	}

	public function demandForm()
	{
		$data=$this->fetch->allItems();
		$cap=$this->fetch->getInfoById('user_info','user_id',$this->session->kart->id);
		$this->load->view('kart/header',['title'=>'Demand form','data'=>$data,'cap'=>$cap->capacity_kart]);
		$this->load->view('kart/demand-form');
		$this->load->view('kart/footer');
	}

	public function editDemand($id)
	{
		$list=(object)[
					'info'=>$this->fetch->getInfoById('demand_lists','id',$id),
					'items'=>$this->fetch->getInfoParams('demand_lists_details','demand_list_id',$id)
					];
		// echo'<pre>';var_dump($list->info);exit;
		if(!empty($list->info)){
			if($list->info->user_id==$this->session->kart->id){
				$data=$this->fetch->allItems();
				$cap=$this->fetch->getInfoById('user_info','user_id',$this->session->kart->id);
				$this->load->view('kart/header',['title'=>'Edit demand','data'=>$data, 'list'=>$list, 'cap'=>$cap->capacity_kart]);
				$this->load->view('kart/edit-demand-form');
				$this->load->view('kart/footer');
			}
			else{
				echo '<h3>Invalid user !</h3>';
			}
		}
		else{
				echo '<h4>Demand list does not exist!<h4>';
		}
	}

	public function orders()
	{
		$ordered=$this->fetch->kartOrders('ORDERED');
		$delivered=$this->fetch->kartOrders('DELIVERED');
		$rejected=$this->fetch->kartOrders('REJECTED');
		$this->load->view('kart/header',['title'=>'Orders', 'ordered'=>$ordered, 'delivered'=>$delivered, 'rejected'=>$rejected]);
		$this->load->view('kart/orders');
		$this->load->view('kart/footer');
	}

	public function payments()
	{
		$this->load->view('kart/header',['title'=>'Payments']);
		$this->load->view('kart/payments');
		$this->load->view('kart/footer');
	}

	
	// Demand list details (AJAX Modal)
	public function listFullDetails()
	{
		$list=$this->fetch->demandListById($this->input->post('id'));
		$response='
			<div class="row">
				<p class="ml-1 text-dark">List Name - <strong>'.$list->name.'</strong></p>
			</div>
			<div class="row">
				<p class="ml-1 text-dark">No. of items - '.$list->itemsCount.'</p>
			</div>
			<hr>
			<div class="row">';

		foreach($list->items as $i){
			$response.='
						<div class="col-sm-6 p-0 pt-1 border-right d-flex">
							<div class="col-6">'.$i->item_name.' -</div>
							<div class="col-5">'.$i->qty.' '.$i->unit_short_name.'</div>
						</div>
						';
		}	
		$response.='</div>';
		echo $response;
	}

	// Ordering demand list (AJAX Modal)
	public function orderDetails()
	{
		if($this->fetch->checkPendingOrders($this->session->kart->id)>0){
			$response='
						<h4 class="text-dark mb-1">Cannot order !</h4>
						<h6 class="text-dark">You have a previous <span class="text-warning">pending</span> order.</h6>
						<h6 class="text-dark">You can order again after your previous order has been delivered.</h6>
				</div>
					
				<div class="modal-footer px-0 mt-2">
						<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
							<i class="bx bx-x d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Cancel</span>
						</button>
				';
			echo $response;
		}
		elseif($this->fetch->getStockToUpdate()){
			$response='
						<h4 class="text-dark mb-1">Cannot order !</h4>
						<h6 class="text-dark">Order can be placed only after EOD (End of Day).</h6>
						<h6 class="text-dark">You can do EOD between 6pm to 10pm.</h6>
				</div>
					
				<div class="modal-footer px-0 mt-2">
						<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
							<i class="bx bx-x d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Close</span>
						</button>
				';
			echo $response;
		}
		else{
			$list=$this->fetch->demandListById($this->input->post('id'));
			$response='
				<div class="row">
					<p class="ml-1 text-dark">List Name - <strong>'.$list->name.'</strong></p>
				</div>
				<div class="row">
					<p class="ml-1 text-dark">No. of items - '.$list->itemsCount.'</p>
				</div>
				<hr class="mt-0">
				<div class="row">';
			$total_cost=0;
			$total_qty=0;
			foreach($list->items as $i){
				$total_qty+=$i->qty;
				$total_cost+=$i->qty*$i->item_price_kart;
				$response.='
							<div class="col-sm-6 p-0 pt-1 border-right d-flex">
								<div class="col-6">'.$i->item_name.' -</div>
								<div class="col-5">'.$i->qty.' '.$i->unit_short_name.' (₹'.$i->qty*$i->item_price_kart.'/-)</div>
							</div>
							';
			}	
			$response.='</div>';
			$response.='
						<div class="row mt-2">
							<mark class="p-1"><span class="">Total amt. = ₹'.$total_cost.'/-</span></mark>
						</div>
						<form action="'.base_url("Add/newOrder").'" class="mt-2" method="POST">
							<h6>Payment mode:</h6>
							<div class="row">
								<div class="col-sm-6 mb-1 mb-sm-0">
									<input id="cash" type="radio" name="payment_type" value="CASH" required>
									<label for="cash">Cash</label>
								</div>
								<!--<div class="col-sm-6">
									<input id="online" type="radio" name="payment_type" value="ONLINE">
									<label for="online">Online</label>
								</div>-->
								<input type="text" name="total_amt" value="'.$total_cost.'" hidden required>
								<input type="text" name="total_qty" value="'.$total_qty.'" hidden required>
								<input type="text" name="demand_list_id" value="'.$this->input->post('id').'" hidden required>
							</div>
							<div class="modal-footer px-0">
								<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
									<i class="bx bx-x d-block d-sm-none"></i>
									<span class="d-none d-sm-block">Cancel</span>
								</button>
								<button type="submit" class="btn btn-primary">Place order</button>
							</div>
						</form>
						';
			echo $response;
		}
	}

	// Pending order details (AJAX Modal)
	public function pOrderDetails()
	{
		$list=$this->fetch->orderDetailsById($this->input->post('id'));
		$info=$this->fetch->getInfoById('orders','id',$this->input->post('id'));
		$amt=0;
		// echo'<pre>';var_dump($list);exit;
		$response='
			<div class="row">
				<p class="text-dark col-5">Order no. : <strong>'.$this->input->post('id').'</strong></p>
				<p class="text-dark col-7 text-right">Order date : '.date('d-M-Y',strtotime($info->date)).'</p>
			</div>
			<div class="row">
				<p class="ml-1 text-dark">Status : <strong class="text-warning">PENDING</strong></p>
			</div>
			<div class="row">
				<p class="ml-1 text-dark">No. of items - '.sizeof($list).'</p>
			</div>
			<hr>
				<div class="row">';
		foreach($list as $i){
			$amt+=$i->qty*$i->item_price_kart;
			$response.='
						<div class="col-sm-6 p-0 pt-1 border-right d-flex">
							<div class="col-6">'.$i->item_name.'</div>
							<div class="col-6">'.$i->qty.' Kg</div>
						</div>';
		}	
		$response.='
					<div class="col-12 p-0 mt-2">
						<mark class="col py-1">Amount: Rs.'.$amt.'/-</mark> <br>
						<div class="col mt-2">Payment mode: <span class="text-dark">Cash</span> </div>
					</div>
				</div>
				<div class="modal-footer px-0">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
				</div>';
		echo $response;
	}

	// Rejected order details (AJAX Modal)
	public function rOrderDetails()
	{
		$list=$this->fetch->orderDetailsById($this->input->post('id'));
		$info=$this->fetch->getInfoById('orders','id',$this->input->post('id'));
		$amt=0;
		// echo'<pre>';var_dump($list);exit;
		$response='
			<div class="row">
				<p class="text-dark col-5">Order no. : <strong>'.$this->input->post('id').'</strong></p>
				<p class="text-dark col-7 text-right">Order date : '.date('d-M-Y',strtotime($info->date)).'</p>
			</div>
			<div class="row">
				<p class="ml-1 text-dark">Status : <strong class="text-danger">REJECTED</strong></p>
			</div>
			<div class="row">
				<p class="ml-1 text-dark">No. of items - '.sizeof($list).'</p>
			</div>
			<hr>
				<div class="row">';
		foreach($list as $i){
			$amt+=$i->qty*$i->item_price_kart;
			$response.='
						<div class="col-sm-6 p-0 pt-1 border-right d-flex">
							<div class="col-6">'.$i->item_name.'</div>
							<div class="col-6">'.$i->qty.' Kg</div>
						</div>';
		}	
		$response.='
					<div class="col-12 p-0 mt-2">
						<mark class="col py-1">Amount: Rs.'.$amt.'/-</mark>
					</div>
				</div>
				<div class="modal-footer px-0">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
				</div>';
		echo $response;
	}
	
	// Delivered order details (AJAX Modal)
	public function dOrderDetails()
	{
		$order=$this->fetch->orderDetailsById($this->input->post('id'));
		$before_order_id=$this->fetch->getBeforeOrder($this->input->post('id'));
		if($before_order_id){
			$before_order=$this->fetch->orderDetailsById($before_order_id);
			foreach($order as $or){
				foreach($before_order as $b){
					if($or->item_id==$b->item_id){
						$or->qty-=$b->remaining_qty;
					}
				}
			}
		}
		foreach($order as $a){
			if($a->qty>0){
				$arr[] = (object) [
					'item_name' => $a->item_name,
					'item_id' => $a->item_id,
					'qty' => $a->qty
				];
			}
		}
		$info=$this->fetch->getInfoById('orders','id',$this->input->post('id'));
		// echo'<pre>';var_dump($arr,$info);exit;
		$response='
			<div class="row">
				<p class="text-dark col-5">Order no. : <strong>'.$this->input->post('id').'</strong></p>
				<p class="text-dark col-7 text-right">Order date : '.date('d-M-Y',strtotime($info->date)).'</p>
			</div>
			<div class="row">
				<p class="ml-1 text-dark">Status : <strong class="text-success">'.$info->status.'</strong></p>
			</div>
			<div class="row">
				<p class="ml-1 text-dark">No. of items : '.sizeof($arr).'</p>
			</div>
			<hr>
				<div class="row">';
		foreach($arr as $i){
			$response.='
						<div class="col-sm-6 p-0 pt-1 border-right d-flex">
							<div class="col-6">'.$i->item_name.' -</div>
							<div class="col-6">'.$i->qty.' Kg</div>
						</div>';
		}	
		$response.='
					<div class="col-12 p-0 mt-2">
						<mark class="col py-1">Amount: Rs.'.$info->total_amt.'/-</mark> <br>
						<div class="col mt-2">Payment mode: <span class="text-dark">'.$info->payment_type.'</span> </div>
					</div>
				</div>
				<div class="modal-footer px-0">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
				</div>';
		echo $response;
	}

	public function Mail()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Contact no.', 'required|max_length[10]|min_length[10]');
		if($this->input->post('message')!=null){
			$this->form_validation->set_rules('message', 'Message', 'max_length[250]');
		}
		if($this->form_validation->run() == true){
			$web=$this->fetch->getWebProfile();
			$name=$this->input->post('name');
			$phone=$this->input->post('phone');
			$message="";
			$guest_email="";
			if($this->input->post('message')!=null){
				$message=$this->input->post('message');
			}
			if($this->input->post('email')!=null){
				$guest_email=$this->input->post('email');
			}

			$to= $web->email;
			$subject = "New enquiry received - Gyan Ganga School";
			$msg = '<p><strong>You have a new qnquiry from-</strong></p>';
			$msg .= '<p>Name: <strong>'.$name.'</strong></p>';
			$msg .= '<p>Email: <strong>'.$guest_email.'</strong></p>';
			$msg .= '<p>Contact no.: <strong>'.$phone.'</strong></p>';
			$msg .= '<p>Message: <strong>'.$message.'</strong></p>';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <'.$guest_email.'>' . "\r\n";
			mail($to,$subject,$msg,$headers);
			
			$data=$this->input->post();
			$data['date']=date('Y-m-d');
			$status= $this->save->saveInfo('enquiries',$data);

			if($status){
				$this->session->set_flashdata('success','Message Sent ! We will connect with you soon.' );
				redirect('Home');
			}
			else{
				$this->session->set_flashdata('failed','Error sending message !');
				redirect('Home');
			}
		}else{
			$error=trim(strip_tags(validation_errors()));
			$this->session->set_flashdata('failed',$error);
			redirect('Home');
		}
	}

}
