<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('GetModel','fetch');
		$this->load->model('AddModel','save');
		$this->redirectIfAdminNotLoggedIn();
	}

	public function index()
	{
		$items=$this->fetch->record_count('items_master');
		$activeItems=$this->fetch->record_count('items_master','is_active','1');
		$inactiveItems=$this->fetch->record_count('items_master','is_active','0');

		$customers=$this->fetch->record_count('users','role_id','3');
		$activeCust=$this->fetch->record_count_arr('users',['is_active'=>'1','role_id'=>'3']);
		$inactiveCust=$this->fetch->record_count_arr('users',['is_active'=>'0','role_id'=>'3']);

		$orders=$this->fetch->record_count('orders');
		$new_orders=$this->fetch->record_count_arr('orders',['status'=>'PENDING']);
		$appr_orders=$this->fetch->record_count_arr('orders',['status'=>'APPROVED']);
		$rej_orders=$this->fetch->record_count_arr('orders',['status'=>'REJECTED']);

		// $demands=$this->fetch->todaysDemands();

		$last_payment='0';

		$this->load->view('admin/header',['title'=>'Dashboard',
										'items'=>$items,
										'activeItems'=>$activeItems,
										'inactiveItems'=>$inactiveItems,
										'customers'=>$customers,
										'activeCust'=>$activeCust,
										'inactiveCust'=>$inactiveCust,
										'orders'=>$orders,
										'new_orders'=>$new_orders,
										'appr_orders'=>$appr_orders,
										'rej_orders'=>$rej_orders,
										'last_payment'=>$last_payment
										]);
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}

	public function profile()
	{
		$profile=$this->fetch->getInfoById('user_info','user_id',$this->session->admin->id);
		$this->load->view('admin/header',['title'=>'Profile','data'=>$profile]);
		$this->load->view('admin/profile');
		$this->load->view('admin/footer');
	}

	public function Banner()
	{
		$items=$this->fetch->getInfo('banner');
		$this->load->view('admin/header',['title'=>'Frontend banners','data'=>$items]);
		$this->load->view('admin/banners');
		$this->load->view('admin/footer');
	}

	public function addBanner()
	{
		$this->load->view('admin/header',['title'=>'Add banner','submissionPath'=>base_url('AddAdm/addBanner')]);
		$this->load->view('admin/banner-form');
		$this->load->view('admin/footer');
	}

	public function editBanner($id)
	{
		$item=$this->fetch->getInfoById('banner','id',$id);
		$this->load->view('admin/header',['title'=>'Edit banner','data'=>$item, 'submissionPath'=>base_url('EditAdm/editBanner/').$id]);
		$this->load->view('admin/banner-form');
		$this->load->view('admin/footer');
	}

	public function itemsMaster()
	{
		$items=$this->fetch->getAllItems();
		$this->load->view('admin/header',['title'=>'Items Master list','data'=>$items]);
		$this->load->view('admin/items-master');
		$this->load->view('admin/footer');
	}

	public function priceManager()
	{
		$items=$this->fetch->getAllItems();
		$this->load->view('admin/header',['title'=>'Price manager','data'=>$items]);
		$this->load->view('admin/price-manager');
		$this->load->view('admin/footer');
	}

	public function locationsMaster()
	{
		$loc=$this->fetch->getInfo('locations_master');
		$this->load->view('admin/header',['title'=>'Locations Master list','data'=>$loc]);
		$this->load->view('admin/locations-master');
		$this->load->view('admin/footer');
	}

	public function categoriesMaster()
	{
		$loc=$this->fetch->getInfo('categories_master');
		$this->load->view('admin/header',['title'=>'Category Master list','data'=>$loc]);
		$this->load->view('admin/categories-master');
		$this->load->view('admin/footer');
	}

	public function addCat()
	{
		$this->load->view('admin/header',['title'=>'Add Category','submissionPath'=>base_url('AddAdm/category')]);
		$this->load->view('admin/category-form');
		$this->load->view('admin/footer');
	}

	public function editCat($id)
	{
		$item=$this->fetch->getInfoById('categories_master','id',$id);
		$this->load->view('admin/header',['title'=>'Edit Category','data'=>$item, 'submissionPath'=>base_url('EditAdm/category/').$id]);
		$this->load->view('admin/category-form');
		$this->load->view('admin/footer');
	}


	public function addItem()
	{
		$units=$this->fetch->getInfo('units');
		$cats=$this->fetch->getInfo('categories_master');
		$this->load->view('admin/header',['title'=>'Add item','units'=>$units,'cats'=>$cats,'submissionPath'=>base_url('AddAdm/item')]);
		$this->load->view('admin/item-form');
		$this->load->view('admin/footer');
	}

	public function editItem($id)
	{
		$item=$this->fetch->getInfoById('items_master','id',$id);
		$units=$this->fetch->getInfo('units');
		$cats=$this->fetch->getInfo('categories_master');
		$this->load->view('admin/header',['title'=>'Edit item','data'=>$item, 'units'=>$units,'cats'=>$cats, 'submissionPath'=>base_url('EditAdm/item/').$id]);
		$this->load->view('admin/item-form');
		$this->load->view('admin/footer');
	}

	public function addLoc()
	{
		$this->load->view('admin/header',['title'=>'Add Location','submissionPath'=>base_url('AddAdm/location')]);
		$this->load->view('admin/location-form');
		$this->load->view('admin/footer');
	}

	public function editLoc($id)
	{
		$item=$this->fetch->getInfoById('locations_master','id',$id);
		$this->load->view('admin/header',['title'=>'Edit Location','data'=>$item, 'submissionPath'=>base_url('EditAdm/location/').$id]);
		$this->load->view('admin/location-form');
		$this->load->view('admin/footer');
	}


	public function demandLists()
	{
		$lists=$this->fetch->demandListsLess();
		// echo'<pre>';var_dump($lists);exit;
		$this->load->view('admin/header',['title'=>'Demand lists',
									'data'=>$lists
								]);
		$this->load->view('admin/demand-lists');
		$this->load->view('admin/footer');
	}

	public function Users()
	{
		$users=$this->fetch->getInfoParams('users','role_id','3');
		$this->load->view('admin/header',['title'=>'Users','data'=>$users]);
		$this->load->view('admin/users');
		$this->load->view('admin/footer');
	}

	public function Notice()
	{
		$data=$this->fetch->getNotice();
		$this->load->view('admin/header',['title'=>'Notice ribbon','data'=>$data]);
		$this->load->view('admin/notice');
		$this->load->view('admin/footer');
	}

	public function editNotice($id)
	{
		$data=$this->fetch->getNotice();
		$this->load->view('admin/header',['title'=>'Edit Notice','data'=>$data, 'submissionPath'=>base_url('EditAdm/notice/').$id]);
		$this->load->view('admin/notice-form');
		$this->load->view('admin/footer');
	}

	public function createOrder()
	{
		$data=$this->fetch->allItemsCust();
		$this->load->view('admin/header',['title'=>'Create new demand','data'=>$data]);
		$this->load->view('admin/new-demand');
		$this->load->view('admin/footer');
	}

	public function ordersPending()
	{
		$pending=$this->fetch->orders('PENDING');
		$this->load->view('admin/header',['title'=>'Pending Orders','data'=>$pending]);
		$this->load->view('admin/orders');
		$this->load->view('admin/footer');
	}
	
	public function ordersApproved()
	{
		$approved=$this->fetch->orders('APPROVED');
		$this->load->view('admin/header',['title'=>'Approved Orders','data'=>$approved]);
		$this->load->view('admin/orders');
		$this->load->view('admin/footer');
	}

	public function ordersRejected()
	{
		$rejected=$this->fetch->orders('REJECTED');
		$this->load->view('admin/header',['title'=>'Rejected Orders','data'=>$rejected]);
		$this->load->view('admin/orders');
		$this->load->view('admin/footer');
	}


	public function payments()
	{
		$this->load->view('admin/header',['title'=>'Payments']);
		$this->load->view('admin/payments');
		$this->load->view('admin/footer');
	}

	
	
	// ---- FOR USERS ---- //
	// Pending orders for approval (AJAX Modal)

	public function pOrderApprove()
	{
		$demand=$this->fetch->orderDetails($this->input->post('id'));
		$info=$this->fetch->orderInfo($this->input->post('id'));
		// echo'<pre>';var_dump($list);exit;
		$response='
		<div class="row mx-0">
			<div class="col-sm-5">
				<p class="text-dark"> Order id : <strong>'.$this->input->post('id').'</strong></p>
				<p class="text-dark">Name : '.$info->name.'</p>
				<p class="text-dark">Contact no. : '.$info->mobile_no.'</p>
			</div>
			<div class="col-sm-7">
				<p class="text-dark">Order date : '.date('d-M-Y',strtotime($info->date)).'</p>
				<p class="text-dark">
					Address : '.$info->street.', '.$info->landmark.', '.$info->city.', '.$info->state.' (pincode - '.$info->pincode.')
				</p>
			</div>
		</div>
		
		<hr class="mt-0 mb-3">';
		foreach($demand as $i){
			$response.='
			<div class="row ">
				<div class="col-8 d-flex align-items-center pr-0">
					<img clas="" src="'.MAIN_DOMAIN.'assets/images/items/'.$i->item_img.'" height="60" width="60" alt="img" style="object-fit:cover;">
					<p class="pl-1 text-black">'.$i->item_name.' apple with some more text in a row <br> <small class="text-secondary">(₹ '.$i->item_price_customer.'/-)</small></p>
				</div>
				<div class="col-2 text-black">
					<p class="">x '.$i->qty.' </p>
				</div>
				<div class="col-2 pl-0 text-black">
					<p class="">₹'.$i->item_price_customer*$i->qty.'</p>
				</div>
			</div>
			<br>';
		}
		$response.='
				</div>
				<div class="row mt-0 mx-0">
					<mark class="col-sm-3 col-12 py-1">Order amount: ₹'.$info->payable_amt.'/-</mark> 
				</div>
				<div class="row mt-1 px-0 mx-0">
					<div class="col py-1">Additional notes: <span class="text-black">'.$info->additional_notes.'</span></div>
				</div>
				<form method="POST" action="'.base_url().'/EditAdm/approveOrder/'.$this->input->post('id').'">
					<div class="modal-footer px-0">
						<button type="submit" class="btn btn-success">Approve</button>
					</div>
				</form>
				
				';
		echo $response;
	}
	
	// Pending orders for rejection (AJAX Modal)
	public function pOrderReject()
	{
		$demand=$this->fetch->orderDetails($this->input->post('id'));
		$info=$this->fetch->orderInfo($this->input->post('id'));
		// echo'<pre>';var_dump($list);exit;
		$response='
		<div class="row mx-0">
			<div class="col-sm-5">
				<p class="text-dark"> Order id : <strong>'.$this->input->post('id').'</strong></p>
				<p class="text-dark">Name : '.$info->name.'</p>
				<p class="text-dark">Contact no. : '.$info->mobile_no.'</p>
			</div>
			<div class="col-sm-7">
				<p class="text-dark">Order date : '.date('d-M-Y',strtotime($info->date)).'</p>
				<p class="text-dark">
					Address : '.$info->street.', '.$info->landmark.', '.$info->city.', '.$info->state.' (pincode - '.$info->pincode.')
				</p>
			</div>
		</div>
		
		<hr class="mt-0 mb-3">';
		foreach($demand as $i){
			$response.='
			<div class="row ">
				<div class="col-8 d-flex align-items-center pr-0">
					<img clas="" src="'.MAIN_DOMAIN.'assets/images/items/'.$i->item_img.'" height="60" width="60" alt="img" style="object-fit:cover;">
					<p class="pl-1 text-black">'.$i->item_name.' apple with some more text in a row <br> <small class="text-secondary">(₹ '.$i->item_price_customer.'/-)</small></p>
				</div>
				<div class="col-2 text-black">
					<p class="">x '.$i->qty.' </p>
				</div>
				<div class="col-2 pl-0 text-black">
					<p class="">₹'.$i->item_price_customer*$i->qty.'</p>
				</div>
			</div>
			<br>';
		}
		$response.='
				</div>
				<div class="row mt-0 mx-0">
					<mark class="col-sm-3 col-12 py-1">Order amount: ₹'.$info->payable_amt.'/-</mark> 
				</div>
				<div class="row mt-1 px-0 mx-0">
					<div class="col py-1">Additional notes: <span class="text-black">'.$info->additional_notes.'</span></div>
				</div>
				<form method="POST" action="'.base_url().'/EditAdm/rejectOrder/'.$this->input->post('id').'">
					<div class="row border mt-1 px-0 mx-0">';
					if($this->input->post('undo')=='approve' || $this->input->post('undo')=='reject'){
						$response.='
						<textarea class="col py-1 form-control" name="admin_remarks" placeholder="Enter reason for rejecting this demand" required></textarea>
						';
					}
					else{
						$response.='
						<textarea class="col py-1 form-control" name="admin_remarks" placeholder="Enter your remarks for rejecting this order" required></textarea>
						';
					}
					$response.='</div>
					<div class="modal-footer px-0">
						<button type="submit" class="btn btn-danger">Reject</button>
					</div>
				</form>
				
				';
		echo $response;
	}
	
	// order details (AJAX Modal)
	public function orderDetails()
	{
		$demand=$this->fetch->orderDetails($this->input->post('id'));
		$info=$this->fetch->orderInfo($this->input->post('id'));
		// echo'<pre>';var_dump($list);exit;
		$response='
		<div class="row mx-0">
			<div class="col-sm-5">
				<p class="text-dark"> Order id : <strong>'.$this->input->post('id').'</strong></p>
				<p class="text-dark">Name : '.$info->name.'</p>
				<p class="text-dark">Contact no. : '.$info->mobile_no.'</p>
			</div>
			<div class="col-sm-7">
				<p class="text-dark">Order date : '.date('d-M-Y',strtotime($info->date)).'</p>
				<p class="text-dark">
					Address : '.$info->street.', '.$info->landmark.', '.$info->city.', '.$info->state.' (pincode - '.$info->pincode.')
				</p>
			</div>
		</div>
		<div class="row mx-0">
			<div class="col">
				<p class="text-dark"> Status : <strong>'.$info->status.'</strong></p>
			</div>
		</div>
		
		<hr class="mt-0 mb-3">';
		foreach($demand as $i){
			$response.='
			<div class="row ">
				<div class="col-8 d-flex align-items-center pr-0">
					<img clas="" src="'.MAIN_DOMAIN.'assets/images/items/'.$i->item_img.'" height="60" width="60" alt="img" style="object-fit:cover;">
					<p class="pl-1 text-black">'.$i->item_name.' apple with some more text in a row <br> <small class="text-secondary">(₹ '.$i->item_price_customer.'/-)</small></p>
				</div>
				<div class="col-2 text-black">
					<p class="">x '.$i->qty.' </p>
				</div>
				<div class="col-2 pl-0 text-black">
					<p class="">₹'.$i->item_price_customer*$i->qty.'</p>
				</div>
			</div>
			<br>';
		}
		$response.='
				</div>
				<div class="row mt-0 mx-0">
					<mark class="col-sm-3 col-12 py-1">Order amount: ₹'.$info->payable_amt.'/-</mark> 
				</div>
				<div class="row mt-1 px-0 mx-0">
					<div class="col py-1">Additional notes: <span class="text-black">'.$info->additional_notes.'</span></div>
				</div>
				<div class="modal-footer px-0">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
				</div>
				';
		echo $response;
	}

	
	// User details (AJAX Modal)
	public function userDetails()
	{
		$user=$this->fetch->getInfoById('users','id',$this->input->post('id'));
		$user_info=$this->fetch->getInfoById('user_info','user_id',$this->input->post('id'));
		$user_address=$this->fetch->getInfoById('user_address','user_id',$this->input->post('id'));
		// echo'<pre>';var_dump($list);exit;
		$response='
		<div class="row mx-0">
			<img clas="pl-1" src="'.MAIN_DOMAIN.'assets/images/'.$user_info->profile_img.'" height="60" width="60" alt="img" style="object-fit:cover;">
		</div>
		<div class="row mx-0 mt-2">
			<p class="">User id : <strong class="text-dark">'.$user->id.'</strong></p>
		</div>
		<div class="row mx-0">
			<p class="">Name : <strong class="text-dark">'.$user->name.'</strong></p>
		</div>
		';
		$response.='
			<div class="row mx-0">
				<p class="">Contact no. : <strong class="text-dark">'.$user->mobile_no.'</strong></p>
			</div>
			<div class="row mx-0">
				<p class="">Email : <strong class="text-dark">'.$user_info->email.'</strong></p>
			</div>
		';
		if($user_address){
			$response.='
				<div class="row mx-0 pb-0 mb-0">
					<p class="text-dark">Address : <strong class="text-dark"> '.$user_address->street.', '.$user_address->landmark.', '.$user_address->city.', '.$user_address->state.' ('.$user_address->pin_code.')</strong></p>
				</div>'
			;
		}
		else{
			$response.='
				<div class="row mx-0 pb-0 mb-0">
					<p class="text-dark">Address : </p>
				</div>';
		}
		$response.='
			<div class="row mx-0">
				<p class="text-dark">Created : <strong class="text-dark"> '.date('d-M-Y',strtotime($user->created_at)).'</strong></p>
			</div>
		';
		$response.='
				<div class="modal-footer px-0">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
				</div>
				
				';
		echo $response;
	
	}



}
