
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
                                <li class="breadcrumb-item active">Approved user demands</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-7 text-sm-right mt-sm-0 mt-2 text-center">
                        <a href="<?=base_url()?>user-demands" class="btn btn-sm btn-light-secondary mr-1">
                            <i class="bullet bullet-xs bullet-warning"></i> See pending demands
                        </a>
                        <a href="<?=base_url()?>rejected-user-demands" class="btn btn-sm btn-light-secondary mr-1 mt-1 mt-sm-0">
                            <i class="bullet bullet-xs bullet-danger"></i> See rejected demands
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-success">Approved User demands list</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped order-dt">
                                        <thead>
                                            <tr>
                                                <th>Demand no.</th>
                                                <th>Demanded by</th>
                                                <th>Date</th>
                                                <th>Total Amount</th>
                                                <th>Remarks</th>
                                                <?php if($this->uri->segment(1)=='approved-user-demands'){ ?>
                                                <th>Delivery status</th>
                                                <?php }?>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($approved as $d){?>
                                            <tr>
                                                <td><?=$d->id?></td>
                                                <td><?=$d->name?> (Id: <?=$d->user_id?>)</td>
                                                <td><?=date('d-M-Y',strtotime($d->created))?></td>
                                                <td>Rs. <?=$d->demand_amount?>/-</td>
                                                <td><?=$d->customer_remarks?></td>
                                                <?php if($this->uri->segment(1)=='approved-user-demands'){ ?>
                                                    <?php if($d->is_delivered==1){ ?>
                                                    <td><i data-toggle="tooltip" title="Delivered" class="font-medium-5 bx bx-check text-success"></i> </td>
                                                    <?php } else{ ?>
                                                    <td><i data-toggle="tooltip" title="Not delivered" class="font-medium-5 bx bx-x text-warning"></i></td>
                                                <?php } }?>
                                                <td class='d-flex px-0 py-1'>
                                                    <span data-id='<?=$d->id?>' class="approvedDemandDetails mr-1">
                                                        <a href="javascript:;" data-toggle="tooltip" title="See details"><i class="badge-circle badge-circle-light-primary bx bx-info-circle font-medium-5"></i></a>
                                                    </span>
                                                    <?php if($d->is_delivered==0){ ?>
                                                        <a onclick="return confirm('Mark this demand as delivered?');" href="<?=base_url()?>set-delivered/<?=$d->id?>" data-toggle="tooltip" class="mr-1" title="Mark as delivered"><i class="badge-circle badge-circle-light-secondary bx bx-truck text-dark font-medium-5"></i></a>
                                                    <?php } ?>
                                                    <span data-id='<?=$d->id?>' data-undo='reject' class="pendingDemandReject">
                                                        <a href="javascript:;" data-toggle="tooltip" title="Reject demand"><i class="badge-circle badge-circle-light-danger bx bx-x font-medium-5"></i></a>
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
                <h6 class="modal-title" id="exampleModalLongTitle">Demand details</h6>
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