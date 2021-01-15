
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/tables/datatable/datatables.min.css">

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-sm-5">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href="<?=base_url('Admin')?>"><i class="bx bx-home-alt"></i></a></li>
                                <?php if($this->uri->segment(2)=='pending') {?>
                                <li class="breadcrumb-item active">Pending Orders</li>
                                <?php } elseif($this->uri->segment(2)=='approved') {?>
                                <li class="breadcrumb-item active">Approved Orders</li>
                                <?php } else {?>
                                <li class="breadcrumb-item active">Rejected Orders</li>
                                <?php } ?>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-7 text-sm-right mt-sm-0 mt-2 text-center">
                    
                        <?php if($this->uri->segment(2)=='pending') {?>
                            <a href="<?=base_url()?>orders/approved" class="btn btn-sm btn-light-secondary mr-1">
                                <i class="bullet bullet-xs bullet-success"></i> See approved Orders
                            </a>
                            <a href="<?=base_url()?>orders/rejected" class="btn btn-sm btn-light-secondary mr-1 mt-1 mt-sm-0">
                                <i class="bullet bullet-xs bullet-danger"></i> See rejected Orders
                            </a>
                        <?php } elseif($this->uri->segment(2)=='approved') {?>
                            <a href="<?=base_url()?>orders/pending" class="btn btn-sm btn-light-secondary mr-1">
                                <i class="bullet bullet-xs bullet-warning"></i> See pending Orders
                            </a>
                            <a href="<?=base_url()?>orders/rejected" class="btn btn-sm btn-light-secondary mr-1 mt-1 mt-sm-0">
                                <i class="bullet bullet-xs bullet-danger"></i> See rejected Orders
                            </a>
                        <?php } else {?>
                            <a href="<?=base_url()?>orders/approved" class="btn btn-sm btn-light-secondary mr-1">
                                <i class="bullet bullet-xs bullet-success"></i> See approved Orders
                            </a>
                            <a href="<?=base_url()?>orders/pending" class="btn btn-sm btn-light-secondary mr-1 mt-1 mt-sm-0">
                                <i class="bullet bullet-xs bullet-warning"></i> See pending Orders
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                        <?php if($this->uri->segment(2)=='pending') {?>
                            <h4 class="card-title text-warning">Pending Orders list</h4>
                        <?php } elseif($this->uri->segment(2)=='approved') {?>
                            <h4 class="card-title text-success">Approved Orders list</h4>
                        <?php } else {?>
                            <h4 class="card-title text-danger">Rejected Orders list</h4>
                        <?php } ?>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped order-dt">
                                        <thead>
                                            <tr>
                                                <th>Order no.</th>
                                                <th>Date</th>
                                                <th>Ordered by</th>
                                                <th>Order Amount</th>
                                                <th>Additional notes</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data as $p){?>
                                            <tr>
                                                <td><?=$p->id?></td>
                                                <td><?=date('d-M-Y',strtotime($p->date))?></td>
                                                <td><?=$p->name?><br>(<?=$p->mobile_no?>)</td>
                                                <td>Rs. <?=$p->payable_amt?>/-</td>
                                                <td><?=$p->additional_notes?></td>
                                                <td class='d-flex px-0 py-1'>
                                                    <span data-id='<?=$p->id?>' data-undo='normal' class="pendingOrderReject mr-1">
                                                        <a href="javascript:;" data-toggle="tooltip" title="Reject"><i class="badge-circle badge-circle-light-danger bx bx-x font-medium-5"></i></a>
                                                    </span>
                                                    <span data-id='<?=$p->id?>' data-undo='normal' class="pendingOrderApprove">
                                                        <a href="javascript:;" data-toggle="tooltip" title="Approve"><i class="badge-circle badge-circle-light-success bx bx-check font-medium-5"></i></a>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="orderModal" tabindex="-1" role="dialog" aria-labelledby="Demand Modal" aria-modal="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">Order details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body px-md-2 px-1">

            </div>
        </div>
    </div>
</div>

<!-- END: Content-->


<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>

<script src="<?=base_url()?>app-assets/js/scripts/datatables/datatable.js"></script>