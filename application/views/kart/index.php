

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
                    <div class="row justify-content-center">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <a href="<?=base_url()?>manage-kart" class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
                                            <i class="bx bx-cart font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Current Stock</p>
                                        <h2 class="mb-0"><?=$qty?> Kg</h2>
                                        <!-- <p class="text-muted mb-0 line-ellipsis">Total items: <?=$count?></p> -->
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <a href="<?=base_url()?>demand-lists" class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
                                            <i class="bx bx-notepad font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Demand lists</p>
                                        <h2 class="mb-0"><?=$total_demands?></h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <a href="<?=base_url()?>orders" class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
                                            <i class="bx bx-shopping-bag font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Total orders</p>
                                        <h2 class="mb-0"><?=$total_orders?></h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <a href="<?=base_url()?>payments" class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
                                            <i class="bx bx-tag font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Payments done</p>
                                        <h2 class="mb-0"><?=$total_payments?></h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <a href="<?=base_url()?>payments" class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
                                            <i class="bx bx-money font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Latest payment</p>
                                        <h2 class="mb-0">₹ <?=$last_payment?>/-</h2>
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

   