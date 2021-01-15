
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-md-9">
                            <h5 class="content-header-title float-left pr-1 mb-0">Users</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="bx bx-home-alt"></i></a></li>
                                    <li class="breadcrumb-item active">users</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header row">
                                <h4 class="card-title col-sm-9">List of all the registered users</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped order-dt">
                                            <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Contact no.</th>
                                                    <th>Registered on</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($data as $d){?>
                                                <tr>
                                                    <td><?=$d->id?></td>
                                                    <td><?=$d->name?></td>
                                                    <td><?=$d->mobile_no?></td>
                                                    <td><?=date('d-M-Y',strtotime($d->created_at))?></td>
                                                    <?php if($d->is_active==1){?>
                                                        <td class="text-success">Active</td>
                                                    <?php } else {?>
                                                        <td class="text-warning">Inactive</td>
                                                    <?php }?>
                                                    <td class='d-flex'>
                                                        <a href="<?=base_url('toggle-user-status/').$d->id.'/'.$d->is_active?>"  onclick="return confirm('Change status of this user?');" class="" data-toggle="tooltip" data-placement="top" title="Toggle status"><i class="badge-circle badge-circle-light-secondary text-info bx bx-transfer-alt font-medium-1"></i></a>

                                                        <span data-id='<?=$d->id?>' class="userDetails ml-1">
                                                            <a href="#" data-toggle="tooltip" title="See details"><i class="badge-circle badge-circle-light-secondary bx bx-info-circle text-primary font-medium-5"></i></a>
                                                        </span>
                                                        <!-- <a href="<?=base_url('delete-user/').$d->id?>"  onclick="return confirm('Delete this user?');" class="" data-toggle="tooltip" data-placement="top" title="Delete user"><i class="badge-circle badge-circle-light-secondary text-danger bx bx-trash font-medium-1"></i></a> -->
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

    
    <div class="modal fade " id="orderModal" tabindex="-1" role="dialog" aria-labelledby="User Modal" aria-modal="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLongTitle">User details</h6>
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
