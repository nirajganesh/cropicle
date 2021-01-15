<div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-left d-inline-block">&copy; 2020 | All rights reserved with Cropicle</span><span class="float-right d-sm-inline-block d-none">Powered by : <a class="text-uppercase" href="http://digikraftsocial.com/" target="_blank">Digikraft Social</a></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?=base_url()?>app-assets/vendors/js/vendors.min.js"></script>
    <script src="<?=base_url()?>app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="<?=base_url()?>app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="<?=base_url()?>app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?=base_url()?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?=base_url()?>app-assets/js/scripts/configs/horizontal-menu.js"></script>
    <script src="<?=base_url()?>app-assets/js/core/app-menu.js"></script>
    <script src="<?=base_url()?>app-assets/js/core/app.js"></script>
    <script src="<?=base_url()?>app-assets/js/scripts/components.js"></script>
    <script src="<?=base_url()?>app-assets/js/scripts/footer.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?=base_url()?>app-assets/js/scripts/forms/number-input.js"></script>
    <script src="<?=base_url()?>assets/js/scripts.js"></script>
    <!-- END: Page JS-->

    <script>
          <?php 
          if($this->session->flashdata('success') || $message = $this->session->flashdata('failed')|| $this->session->flashdata('info')):
                if($this->session->flashdata('success')){
                  $class ='success';
                }
                elseif($this->session->flashdata('failed')){
                  $class ='failed';
                }
                else{
                  $class ='info';
                }

                if($class=='success'){
                ?>
                    toastr.success('<?=$this->session->flashdata('success')?>', 'Done !', {"showMethod": "slideDown","timeOut": 0,"closeButton": true });
                <?php } elseif($class=='failed'){?>
                    toastr.error('<?=$this->session->flashdata('failed')?>', 'Error !', {"showMethod": "slideDown","timeOut": 0,"closeButton": true});
                <?php }else{?>
                    toastr.info('<?=$this->session->flashdata('info')?>', 'Info !', {"showMethod": "slideDown","timeOut": 0,"closeButton": true});
                <?php }?>
        <?php 
          endif;
        ?>
          
    </script>

</body>
<!-- END: Body-->

</html>