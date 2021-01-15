
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-md-9">
                            <h5 class="content-header-title float-left pr-1 mb-0">Manage Kart</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="bx bx-home-alt"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>manage-kart">Manage Kart</a></li>
                                    <li class="breadcrumb-item active">List of demands</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-3 text-sm-right">
                            <a href="<?=base_url()?>demand-form" type="button" class="btn btn-sm btn-primary">+ Create new demand list</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <div class="card py-2 col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>CREATED AT</th>
                                            <th>LIST NAME</th>
                                            <th>ITEMS IN LIST</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data as $d){?>
                                        <tr>
                                            <td><?=date('d-M-Y',strtotime($d->created))?></td>
                                            <td><?=$d->name?></td>
                                            <td><?=$d->itemsCount?> <?=$d->itemsCount>1 ? 'items' : 'item'?></td>
                                            <td class='d-flex'>

                                                <span data-id='<?=$d->id?>' class="orderOpen">
                                                    <a href="#" data-toggle="tooltip" title="Order now"><i class="badge-circle badge-circle-light-secondary bx bx-info-circle text-primary bx bx-truck font-medium-1"></i></a>
                                                </span>

                                                <a href="<?=base_url('demand-form/').$d->id?>" class="mx-1" data-toggle="tooltip" data-placement="top" title="Edit list"><i class="badge-circle text-primary badge-circle-light-secondary bx bx-edit font-medium-1"></i></a>

                                                <a href="<?=base_url('Delete/demand/').$d->id?>"  onclick="return confirm(' you want to delete?');" class="mx-1" data-toggle="tooltip" data-placement="top" title="Delete list"><i class="badge-circle badge-circle-light-secondary text-danger bx bx-trash font-medium-1"></i></a>

                                                <span data-id='<?=$d->id?>' class="listOpen">
                                                    <a href="#" data-toggle="tooltip" title="See list"><i class="badge-circle badge-circle-light-secondary bx bx-info-circle text-warning font-medium-1"></i></a>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page ends -->
            </div>
        </div>
    </div>

    <div class="modal fade " id="listModal" tabindex="-1" role="dialog" aria-labelledby="Demand List Modal" aria-modal="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLongTitle">Details of the demand list</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="orderModal" tabindex="-1" role="dialog" aria-labelledby="Order Modal" aria-modal="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLongTitle">Order now</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                
                </div>
            </div>
        </div>
    </div>

    <!-- END: Content-->


