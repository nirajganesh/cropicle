
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Manage Kart</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active"> Manage kart
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card widget-notification">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title d-flex align-items-center">
                                        <i class='bx bx-cart font-medium-4 mr-1'></i>Kart stock (<?=$qty ?> Kg)
                                    </h4>
                                    <?php $tc=0; if(!empty($stock)){ 
                                            foreach($stock as $s){
                                                    if($s->qty>0){$tc++;}
                                            }
                                    }?>
                                    <small class='font-small-2'> (Total <?=$tc?> items)</small>
                                    <div class="heading-elements">
                                        <?php if(!empty($stock)){?>
                                            <?php if($kart_up_to_date==0){?>

                                                <?php date_default_timezone_set("Asia/Kolkata"); $t=time();
                                                    $hour=date('H', $t);
                                                    if(($hour >=00) && ($hour <=22)) {?>
                                                        <button type="button" class="btn btn-sm btn-light-primary" data-toggle="modal" data-target="#stockModal">
                                                            End of Day
                                                        </button>
                                                <?php }else{ ?>
                                                    <span class="text-dark" data-toggle="tooltip" title="You can do EOD (End of Day) only between 6pm to 10pm.">EOD between 6 to 10 PM</span>
                                                <?php } ?>
                                               
                                        <?php }
                                        else{?>
                                            <span class="text-success" data-toggle="tooltip" title="You have already done End of Day. Your kart is up-to-date. Place an order to refill your kart.">✔ EOD done</span> <br>
                                            <a href="demand-lists" class="mt-1 btn btn-sm btn-light-primary">Order to refill</a>
                                       <?php }
                                    }?>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-2">
                                        <small>Last updated: <?=$time?></small>
                                        <div class="row">
                                        <?php if(!empty($stock)){ 
                                                foreach($stock as $s){
                                                    if($s->qty>0){
                                                    ?>
                                                    <div class="col-sm-6 p-0 pt-1  d-flex">
                                                        <div class="col-6"><?=$s->item_name?> -</div>
                                                        <div class="col-5"><?=$s->qty?><?=$s->unit_short_name?></div>
                                                    </div>
                                        <?php   }}
                                            }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="card widget-notification">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title d-flex align-items-center">
                                        <i class='bx bx-notepad font-medium-4 mr-1'></i>List of demands
                                    </h4>
                                    <small class='font-small-2'> (Total <?=$total_demands?> lists)</small>
                                    <div class="heading-elements">
                                        <a href="<?=base_url()?>demand-lists" type="button" class="btn btn-sm btn-light-primary">See All</a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <?php foreach($data as $d){?>
                                            <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                                <div class="list-left d-flex">
                                                    <div class="list-content">
                                                        <span class="list-title"><?=$d->name?></span>
                                                        <small class="text-muted d-block">
                                                        <?php 
                                                            $z=1; 
                                                            foreach($d->items as $i){ 
                                                                if($z<4){
                                                        ?>
                                                                    <?=$i->item_name.' ('.$i->qty.' '.$i->unit_short_name.')&nbsp; '?>
                                                        <?php   
                                                                }
                                                                $z++;
                                                            }
                                                        ?>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <span data-id='<?=$d->id?>' class="orderOpen mr-md-1 mr-0 my-1">
                                                        <a href="#" data-toggle="tooltip" class="badge-circle badge-circle badge-circle-light-primary" title="Order now"><i class="bx bx-truck font-small-5"></i></a>
                                                    </a>
                                                    </span>
                                                    <span data-id='<?=$d->id?>' class="listOpen">
                                                        <a class="badge-circle badge-circle badge-circle-light-warning my-1 cpointer"  data-toggle="tooltip" title="See list">
                                                            <i class="bx bx-info-circle font-small-5 text-warning"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page ends -->
            </div>
        </div>
    </div>

    <?php if($kart_up_to_date==0){?>
    <div class="modal fade " id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModal" aria-modal="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="<?=base_url('update-stock')?>" method="POST">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 heads row mb-2 align-items-center">
                            <div class="col-md-6 modItm text-dark text-bold-600">Items </div>
                            <div class="col-md-3 modQty text-dark text-bold-600">Qty</div>
                            <div class="col-md-3 text-dark text-bold-600">
                                Remaining Stock
                            </div>
                        </div>
                        <?php foreach($stock as $s){?>
                        <div class="form-group col-12 row align-items-center">
                            <div class="col-md-6 modItm"> <input type="text" name="item_id[]" value="<?=$s->item_id?>" required hidden><?=$s->item_name?>:</div>
                            <div class="col-md-3 modQty"><?=$s->qty?><?=$s->unit_short_name?></div>
                            <div class="input-group input-group-sm modStk col-md-3 ">
                                <input type="number" data-bts-step="0.25" data-bts-decimals="2" min="0" max="<?=$s->qty?>" step="0.25" class="digits touchspin touchspin-min-max" data-bts-postfix="Kg" placeholder="Qty" name="remaining_qty[]" required>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>

                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <?php }?>

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

    <script>
        
    </script>
