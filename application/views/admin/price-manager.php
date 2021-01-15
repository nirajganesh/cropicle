    <style>
        table {
            max-width:80%;
        }
        table tr td{
            padding:8px 0px !important;
            text-align:center;
        }
        table tr td input{
            width:80px !important;
            height:initial !important;
            padding:5px 5px !important;
        }
        .fixed-btn {
            position: fixed ;
            top: 170px;
            right: 90px;
            z-index: 100000;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-sm-7">
                            <h5 class="content-header-title float-left pr-1 mb-0">Price Manager</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="bx bx-home-alt"></i></a></li>
                                    <li class="breadcrumb-item active">Price manager</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <form action="EditAdm/batchUpdatePrice" method="POST">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Item ID</th>
                                                    <th>Item name</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($data as $d){?>
                                                <tr>
                                                    <td>
                                                        <?=$d->id?>
                                                        <input type="number" name="id[]" class="form-control" value="<?=$d->id?>" readonly required hidden>
                                                    </td>
                                                    <td><?=$d->item_name?></td>
                                                    <td>
                                                        <fieldset>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">₹</span>
                                                                </div>
                                                                <input type="number" class="form-control number d-inline" step="0.5" name="item_price_customer[]" value="<?=$d->item_price_customer?>" required>
                                                            </div>
                                                        </fieldset>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                        <button type="submit" class="btn btn-light-primary py-25 px-1 fixed-btn"><i class="bx bxs-save"></i> Update changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
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
