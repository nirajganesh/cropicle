
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-md-9">
                            <h5 class="content-header-title float-left pr-1 mb-0">Payments</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a></li>
                                    <li class="breadcrumb-item active">Payments</li>
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
                            <div class="card-header">
                                <h4 class="card-title">See all the Payments</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>Payment Id</th>
                                                    <th>Payment date</th>
                                                    <th>Payment Amt.</th>
                                                    <th>Payment for</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#xyz5547</td>
                                                    <td>25-06-2020</td>
                                                    <td>Rs. 10500/-</td>
                                                    <td>order id- #5148</td>
                                                    <td class="text-success">Success</td>
                                                    <td class='d-flex'>
                                                        <span data-toggle="modal" data-target="#payModal">
                                                            <a href="#" data-toggle="tooltip" title="See details"><i class="badge-circle border badge-circle-light-primary bx bx-info-circle text-dark font-medium-1"></i></a>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#xyz5548</td>
                                                    <td>25-06-2020</td>
                                                    <td>Rs. 10500/-</td>
                                                    <td>order id- #5148</td>
                                                    <td class="text-success">Success</td>
                                                    <td class='d-flex'>
                                                        <span data-toggle="modal" data-target="#payModal">
                                                            <a href="#" data-toggle="tooltip" title="See details"><i class="badge-circle border badge-circle-light-primary bx bx-info-circle text-dark font-medium-1"></i></a>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#xyz5549</td>
                                                    <td>25-06-2020</td>
                                                    <td>Rs. 10500/-</td>
                                                    <td>order id- #5148</td>
                                                    <td class="text-success">Success</td>
                                                    <td class='d-flex'>
                                                        <span data-toggle="modal" data-target="#payModal">
                                                            <a href="#" data-toggle="tooltip" title="See details"><i class="badge-circle border badge-circle-light-primary bx bx-info-circle text-dark font-medium-1"></i></a>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#xyz5550</td>
                                                    <td>25-06-2020</td>
                                                    <td>Rs. 10500/-</td>
                                                    <td>order id- #5148</td>
                                                    <td class="text-danger">Failed</td>
                                                    <td class='d-flex'>
                                                        <span data-toggle="modal" data-target="#payModal">
                                                            <a href="#" data-toggle="tooltip" title="See details"><i class="badge-circle border badge-circle-light-primary bx bx-info-circle text-dark font-medium-1"></i></a>
                                                        </span>
                                                    </td>
                                                </tr>
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

    <div class="modal fade " id="payModal" tabindex="-1" role="dialog" aria-labelledby="Payment Modal" aria-modal="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLongTitle">Order details</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <p class="text-dark">Payment date- <span class="">26-06-2020</span></p>
                    </div>
                    <div class="row">
                        <p class="text-dark">Status- <span class="text-success">Success</span></p>
                    </div>
                    <div class="row">
                        <p class="text-dark">Payment Id- <mark class="px-1">xyz5548</mark></p>
                    </div>
                    <div class="row">
                        <p class="text-dark">For Order id- #5148</p>
                    </div>
                    <div class="row">
                        <p class="text-dark">Payment mode: <span class="text-dark">cash</span> </p>
                    </div>
                    <div class="row">
                        <p class="text-dark">Amount: <span class="text-dark">Rs. 10500/-</span> </p>
                    </div>
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

    <!-- END: Content-->
