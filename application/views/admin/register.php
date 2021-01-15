<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Ankur (Cluebix)">
    <title>Kart.cropicle - Register</title>
    <link rel="apple-touch-icon" href="<?=base_url()?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>app-assets/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/plugins/forms/wizard.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
    <!-- END: Custom CSS-->
    <script>
		var loc = `<?=base_url()?>`;
    </script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu navbar-sticky 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
<a href="<?=base_url('admin')?>" target="_blank" accesskey="l" hidden></a>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrappers mt-5 pt-1">
            <div class="content-body">
                <!-- Form wizard with step validation section start -->
                <section id="validation row border border-success">
                    <div class="row row-flex col-11 col-sm-10 mx-auto align-items-stretch pb-5 px-0">
                        <div class="col-md-7 bg-white shadow-lg col-12 px-0 m-0">
                            <div class="car mb-0 px-1">
                                <div class="card-header pb-0">
                                    <div class="card-title mb-1 text-center">
                                        <img src="<?=base_url('app-assets/images/logo/logo.png')?>" class="d-md-none" alt="logo" height="40">
                                        <h4 class="text-center pt-2">Sign Up</h4>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p> <small> Please enter your details to sign up and be part of our great community</small>
                                    </p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0 pb-3">
                                        <form action="#" class="wizard-validation">
                                            <!-- Step 1 -->
                                            <h6>
                                                <i class="step-icon"></i>
                                                <small>Baisc Info</small>
                                            </h6>
                                            <!-- Step 1 -->
                                            <!-- body content of step 1 -->
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="firstName3">Name </label>
                                                            <input type="text" class="form-control required" id="name" name="name" placeholder="Enter Your Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="emailAddress5">Contact</label>
                                                            <input type="twxt" class="form-control digits required" id="phone" name="phone" placeholder="Enter 10 digit contact no." maxlength="10" minlength="10">
                                                            <label id="checkPh" class="danger"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- body content of step 1 end -->
                                            <!-- Step 2 -->
                                            <h6>
                                                <i class="step-icon"></i>
                                                <small>OTP verification</small>
                                            </h6>
                                            <!-- step 2 -->
                                            <!-- body content of step 2 end -->
                                            <fieldset>
                                                <div class="row my-2">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="proposalTitle3 mb-2">
                                                               An OTP has been sent to your number:
                                                            </label>
                                                            <input type="text" class="form-control digits required" id="otp" name="otp" placeholder="Enter 6 digit OTP here" maxlength="6" minlength="6">
                                                        </div>
                                                        <label id="otp_status" ></label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- body content of step 2 end -->
                                            <!-- Step 3 -->
                                            <h6>
                                                <i class="step-icon"></i>
                                                <small>Password</small>
                                            </h6>
                                            <!-- step 3 end -->
                                            <!-- step 3 content -->
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="eventName3">
                                                                Choose passsowrd
                                                            </label>
                                                            <input type="password" class="form-control required" id="pwd" name="pwd" placeholder="Enter password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="eventName3">
                                                                Retype password
                                                            </label>
                                                            <input type="password" class="form-control required" data-rule-equalTo="#pwd" data-msg-equalTo="Please enter the same password again" id="pwd2" name="pwd2" placeholder="Enter password again">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- step 3 content end-->
                                        </form>
                                        <hr>
                                        <div class="text-center"><span class="mr-25">Already have an account?</span><a href="<?=base_url('login')?>"><span>Sign in</span> </a></div>
                                    </div>
                                </div>
                            </div>
                            <small class="brand-name d-flex align-items-center text-muted" style="position: absolute; bottom: 5px; left: 15px;">Kart.cropicle</small>
                        </div>
                        <div class="col-md-5 d-md-block d-none text-center p-3 shadow-lg" style="z-index: -1;">
                            <img class="img-float" src="<?=base_url()?>app-assets/images/logo/badge-logo.png" height="40" alt="logo"  style="position:absolute;top:0;right:0;">
                            <img class="img-fluid" src="<?=base_url()?>app-assets/images/pages/register.png" alt="branding logo">
                        </div>
                    </div>
                </section>
                <!-- Form wizard with step validation section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="<?=base_url()?>app-assets/vendors/js/vendors.min.js"></script>
    <script src="<?=base_url()?>app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="<?=base_url()?>app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="<?=base_url()?>app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?=base_url()?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?=base_url()?>app-assets/js/scripts/configs/horizontal-menu.js"></script>
    <script src="<?=base_url()?>app-assets/js/core/app-menu.js"></script>
    <script src="<?=base_url()?>app-assets/js/core/app.js"></script>
    <script src="<?=base_url()?>app-assets/js/scripts/components.js"></script>
    <script src="<?=base_url()?>app-assets/js/scripts/footer.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?=base_url()?>app-assets/js/scripts/forms/wizard-steps.js"></script>
    <script src="<?=base_url()?>assets/js/scripts.js"></script>
    <!-- END: Page JS-->
    <script>
       
      
    </script>

</body>
<!-- END: Body-->

</html>