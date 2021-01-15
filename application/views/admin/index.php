

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Dashboard</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex flex-row justify-content-between">
                                    <h4 class="card-title">Today's orders &nbsp;<small class="text-muted">(<?= date('d-M-y')?>)</small> </h4>
                                    <a href="user-demands" class="btn btn-light-primary btn-sm">See all</a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table recent-dt">
                                                <thead>
                                                    <tr>
                                                        <th>Order by</th>
                                                        <th>Amount</th>
                                                        <th>Address</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if (isset($demands) && count($demands)) { 
                                                    foreach($demands as $de){?>
                                                    <tr>
                                                        <td><?=$de->name?> <br> (<?=$de->mobile_no?>)</td>
                                                        <td>₹<?=$de->demand_amount?>/- </td>
                                                        <td><?=$de->address?> </td>
                                                        <td><?=$de->status?> </td>
                                                    <?php if($de->status=='PENDING'){?>
                                                        <td class='d-flex pr-0 pl-1 py-1'>
                                                            <span data-id='<?=$de->id?>' data-undo='normal' class="pendingDemandReject mr-1">
                                                                <a href="javascript:;" data-toggle="tooltip" title="Reject"><i class="badge-circle badge-circle-light-danger bx bx-x font-medium-5"></i></a>
                                                            </span>
                                                            <span data-id='<?=$de->id?>' data-undo='normal' class="pendingDemandApprove">
                                                                <a href="javascript:;" data-toggle="tooltip" title="Approve"><i class="badge-circle badge-circle-light-success bx bx-check font-medium-5"></i></a>
                                                            </span>
                                                        </td>
                                                    <?php } else if($de->status=='APPROVED'){?>
                                                        <td class='d-flex pr-0 pl-1 py-1'>
                                                            <span data-id='<?=$de->id?>' class="approvedDemandDetails">
                                                                <a href="javascript:;" data-toggle="tooltip" title="See details"><i class="badge-circle badge-circle-light-secondary bx bx-info-circle text-primary font-medium-5"></i></a>
                                                            </span>
                                                        </td>
                                                    <?php } else{?>
                                                        <td class='d-flex pr-0 pl-1 py-1    '>
                                                            <span data-id='<?=$de->id?>' class="rejectedDemandDetails">
                                                                <a href="javascript:;" data-toggle="tooltip" title="See details"><i class="badge-circle badge-circle-light-secondary bx bx-info-circle text-primary font-medium-5"></i></a>
                                                            </span>
                                                        </td>
                                                    <?php }?>
                                                    </tr>
                                                    <?php }
                                                    }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <a href="<?=base_url('user-demands')?>" class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-dark mx-auto my-1">
                                            <i class="bx bx-cart font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Orders</p>
                                        <h2 class="mb-0 position-relative left-0">
                                            <?=$orders?>
                                        </h2>
                                        <div class="chart-info d-flex justify-content-between mb-75 mt-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bullet bullet-xs bullet-success"></i>
                                                <span class="text-muted text-bold-600 ml-50">Approved</span>
                                            </div>
                                            <div class="text-muted"><?=$appr_orders?></div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-75">
                                            <div class="d-flex align-items-center">
                                                <i class="bullet bullet-xs bullet-danger"></i>
                                                <span class="text-muted text-bold-600 ml-50">Rejected</span>
                                            </div>
                                            <div class="text-muted"><?=$rej_orders?></div>
                                        </div>
                                        <?php if($new_orders>0){?>
                                            <span class="badge badge-danger badge-up badge-glow badge-round mt-2 mr-1 font-small-1"><?=$new_orders?> new</span>
                                        <?php }?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <a href="<?=base_url('items-master')?>" class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-warning mx-auto my-1">
                                            <i class="bx bx-data font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">No. of products</p>
                                        <h2 class="mb-0"><?=$items?></h2>
                                        <div class="chart-info d-flex justify-content-between mb-75 mt-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bullet bullet-xs bullet-success mr-50"></i>
                                                <span class="text-muted text-bold-600 ml-50">Active</span>
                                            </div>
                                            <div class="text-muted"><?=$activeItems?></div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-75">
                                            <div class="d-flex align-items-center">
                                                <i class="bullet bullet-xs bullet-secondary mr-50"></i>
                                                <span class="text-muted text-bold-600 ml-50">Inactive</span>
                                            </div>
                                            <div class="text-muted"><?=$inactiveItems?></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <a href="<?=base_url('users')?>" class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle mx-auto my-1">
                                            <i class="bx bx-user font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Regd. Users</p>
                                        <h2 class="mb-0"><?=$customers?></h2>
                                        <div class="chart-info d-flex justify-content-between mb-75 mt-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bullet bullet-xs bullet-success mr-50"></i>
                                                <span class="text-muted text-bold-600 ml-50">Active</span>
                                            </div>
                                            <div class="text-muted"><?=$activeCust?></div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-75">
                                            <div class="d-flex align-items-center">
                                                <i class="bullet bullet-xs bullet-secondary mr-50"></i>
                                                <span class="text-muted text-bold-600 ml-50">Inactive</span>
                                            </div>
                                            <div class="text-muted"><?=$inactiveCust?></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    
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

<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>

<script src="<?=base_url()?>app-assets/js/scripts/datatables/datatable.js"></script>