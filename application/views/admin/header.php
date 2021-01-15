<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Ankur (DigiKraft Social)">
    <?php if(isset($reportTitle)){?>
        <title><?=$reportTitle?></title>
    <?php } else {?>
        <title><?=isset($title)? $title.' - ' :''?> Admin Cropicle</title>
    <?php }?>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>app-assets/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    
    <script>
		var loc = `<?=base_url()?>`;
    </script>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/tags/bootstrap-tagsinput.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
    <!-- END: Custom CSS-->
    <script src="<?=base_url()?>app-assets/js/core/libraries/jquery.min.js"></script>
    
    <script>
		var loc = `<?=base_url()?>`;
    </script>
    <style>
        th{
            padding:15px 10px !important;
        }
        td{
            padding:8px 10px !important;
        }
    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu navbar-sticky 2-columns footer-static" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-brand-center adminNav">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="<?=base_url('admin')?>">
                        <div class="brand-logo d-flex" style="align-items:center">
                            <img class="logo" src="<?=base_url()?>app-assets/images/logo/logo.png">
                            <h5 class="badge badge-black ml-1 mt-1  cursor-text"> ( Admin ) </h5>
                        </div>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu mr-auto"><a class="nav-link nav-menu-main menu-toggle" href="#"><i class="text-black bx bx-menu"></i></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right d-flex align-items-center">
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language text-black d-lg-inline d-none">English</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us mr-50"></i>English</a>
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon text-black bx bx-fullscreen"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search pt-2"><i class="ficon text-black bx bx-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
                                <input class="input" type="text" placeholder="Explore Kart.cropicle..." tabindex="-1" data-search="template-search">
                                <div class="search-input-close"><i class="bx bx-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-lg-flex d-none"><span class="user-name text-black"><?=$this->session->admin->name?></span></div><span><img class="round" src="<?=base_url()?>app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0">
                                <a class="dropdown-item" href="<?=base_url('admin-profile')?>"><i class="bx bx-user mr-50"></i> Edit Profile</a>
                                <div class="dropdown-divider mb-0"></div>
                                <a class="dropdown-item" href="<?=base_url('logout-admin')?>"><i class="bx bx-power-off mr-50"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow shadow" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header d-xl-none d-block">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?=base_url('admin')?>">
                        <div class="brand-logo"><img class="logos" height="38" src="<?=base_url()?>app-assets/images/logo/logo.png" /></div>
                        <h2 class="brand-text mb-0"></h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content mx-auto" data-menu="menu-container">
            <!-- include <?=base_url()?>includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="filled">

                <li class="mr-2 my-25 mb-5 d-md-none">
                    <a class="nav-link text-center badge badge-black d-block">
                        <span class="text-white">( Admin )</span>
                    </a>
                </li>
                <hr class="my-1">
                <li class="nav-item mt-5 mr-2 my-25">
                    <a class="nav-link bg-white shadow-md <?=$this->uri->segment(1)=='admin'?' activeLink':''?>" href="<?=base_url('admin')?>">
                        <i class="menu-livicon" data-icon="desktop"></i><span data-i18n="Dashboard">
                        Dashboard</span>
                    </a>
                </li>

                <li class="dropdown nav-item mr-2 my-25" data-menu="dropdown"><a class="dropdown-toggle nav-link nav-link bg-white <?=$this->uri->segment(1)=='items-master' || $this->uri->segment(1)=='price-manager' || $this->uri->segment(1)=='categories-master' ?' activeLink':''?>" href="" data-toggle="dropdown"><i class="menu-livicon" data-icon="apple"></i><span data-i18n="Dashboard">Items master</span></a>
                    <ul class="dropdown-menu">
                        <li class="<?=$this->uri->segment(1)=='categories-master' ?' active':''?>" data-menu=""><a class="dropdown-item align-items-center <?=$this->uri->segment(1)=='categories-master' ?' activeLink':''?>" href="<?=base_url()?>categories-master" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Categories list</a>
                        </li>
                        <li class="<?=$this->uri->segment(1)=='items-master' ?' active':''?>" data-menu=""><a class="dropdown-item align-items-center <?=$this->uri->segment(1)=='items-master' ?' activeLink':''?>" href="<?=base_url()?>items-master" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>All Items List</a>
                        </li>
                        <li class="<?=$this->uri->segment(1)=='price-manager' ?' active':''?>" data-menu=""><a class="dropdown-item align-items-center <?=$this->uri->segment(1)=='price-manager' ?' activeLink':''?>" href="<?=base_url()?>price-manager" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Price manager</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown nav-item mr-2 my-25" data-menu="dropdown"><a class="dropdown-toggle nav-link nav-link bg-white <?=$this->uri->segment(1)=='orders' ?' activeLink':''?>" href="" data-toggle="dropdown"><i class="menu-livicon" data-icon="shoppingcart"></i><span data-i18n="Dashboard">Orders</span></a>
                    <ul class="dropdown-menu">
                        <li class="<?=$this->uri->segment(1)=='orders' &&  $this->uri->segment(2)=='pending' ?' active':''?>" data-menu=""><a class="dropdown-item align-items-center <?=$this->uri->segment(1)=='orders' &&  $this->uri->segment(2)=='pending' ?' activeLink':''?>" href="<?=base_url()?>orders/pending" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Pending Orders</a>
                        </li>
                        <li class="<?=$this->uri->segment(1)=='orders' &&  $this->uri->segment(2)=='approved' ?' active':''?>" data-menu=""><a class="dropdown-item align-items-center <?=$this->uri->segment(1)=='orders' &&  $this->uri->segment(2)=='approved' ?' activeLink':''?>" href="<?=base_url()?>orders/approved" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Approved Orders</a>
                        </li>
                        <li class="<?=$this->uri->segment(1)=='orders' &&  $this->uri->segment(2)=='rejected' ?' active':''?>" data-menu=""><a class="dropdown-item align-items-center <?=$this->uri->segment(1)=='orders' &&  $this->uri->segment(2)=='rejected' ?' activeLink':''?>" href="<?=base_url()?>orders/rejected" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Rejected Orders</a>
                        </li>
                        <li class="<?=$this->uri->segment(1)=='orders' &&  $this->uri->segment(2)=='new' ?' active':''?>" data-menu=""><a class="dropdown-item text-primary align-items-center <?=$this->uri->segment(1)=='oreders' &&  $this->uri->segment(2)=='new' ?' activeLink':''?>" href="<?=base_url()?>new-demand" data-toggle="dropdown"><i class="bx bx-plus text-primary"></i>Create new Order</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown nav-item mr-2 my-25" data-menu="dropdown"><a class="dropdown-toggle nav-link nav-link bg-white <?=$this->uri->segment(1)=='users' || $this->uri->segment(1)=='user-demands' ?' activeLink':''?>" href="" data-toggle="dropdown"><i class="menu-livicon" data-icon="user"></i><span data-i18n="Dashboard">Users</span></a>
                    <ul class="dropdown-menu">
                        <li class="<?=$this->uri->segment(1)=='users' ?' active':''?>" data-menu=""><a class="dropdown-item align-items-center <?=$this->uri->segment(1)=='users' ?' activeLink':''?>" href="<?=base_url()?>users" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>See all users</a>
                        </li>
                        <li class="<?=$this->uri->segment(1)=='new-demand' ?' active':''?>" data-menu=""><a class="dropdown-item text-primary align-items-center <?=$this->uri->segment(1)=='new-demand' ?' activeLink':''?>" href="<?=base_url()?>new-demand" data-toggle="dropdown"><i class="bx bx-plus text-primary"></i>Register new user</a>
                        </li>
                    </ul>
                </li>


                <!-- <li class="nav-item mr-2 my-25">
                    <a class="nav-link bg-white <?=$this->uri->segment(1)=='kart-payments'?' activeLink':''?>" href="#">
                        <i class="menu-livicon" data-icon="bank"></i><span data-i18n="Dashboard">
                        Payments</span>
                    </a>
                </li> -->

                <li class="nav-item mr-2 my-25">
                    <a class="nav-link bg-white <?=$this->uri->segment(1)=='reports'?' activeLink':''?>" href="<?=base_url('reports')?>">
                        <i class="menu-livicon" data-icon="notebook"></i><span data-i18n="Dashboard">
                        Reports</span>
                    </a>
                </li>
                
                <li class="dropdown nav-item mr-2 my-25" data-menu="dropdown"><a class="dropdown-toggle nav-link nav-link bg-white <?=$this->uri->segment(1)=='banner' || $this->uri->segment(1)=='notice' ?' activeLink':''?>" href="javascript:;" data-toggle="dropdown"><i class="menu-livicon" data-icon="magic"></i><span data-i18n="Dashboard">Frontend</span></a>
                    <ul class="dropdown-menu">
                        <li class="<?=$this->uri->segment(1)=='banner' ?' active':''?>" data-menu=""><a class="dropdown-item align-items-center <?=$this->uri->segment(1)=='banner' ?' activeLink':''?>" href="<?=base_url()?>banner" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Banner images</a>
                        <li class="<?=$this->uri->segment(1)=='banner' ?' active':''?>" data-menu=""><a class="dropdown-item align-items-center <?=$this->uri->segment(1)=='notice' ?' activeLink':''?>" href="<?=base_url()?>notice" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Notice ribbon</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /horizontal menu content-->
    </div>
    <!-- END: Main Menu-->