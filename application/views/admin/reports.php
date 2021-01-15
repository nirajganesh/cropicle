

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/pickers/pickadate/pickadate.css">

<style>
    .report-dt td p,.report-dt td{
        color:black !important;
    }
</style>
    
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
                        <div class="col-sm-3 border-right mb-2">
                            <div class="mb-1">
                                <h4>Reports:</h4>
                            </div>
                            <form action="<?=base_url()?>Reports/showReport" method="POST">
                                <label for="reportType">Report type:</label>
                                <select name="type" class="form-control mb-1" id="reportType" required>
                                    <option value="">-- Select report type --</option>
                                    <!-- <option value="userDemands">Approved user demands</option> -->
                                    <option value="approvedUserDemands">Un-processed user demands with details</option>
                                    <option value="processedUserDemands">Processed user demands with details</option>
                                    <option value="deliveredUserDemands">Delivered user demands with details</option>
                                    <option value="detailedUserDemands">All approved user demands with details</option>
                                    <option value="rejectedUserDemands">Rejected user demands with details</option>
                                    <option value="undeliveredItemWiseDemands">Item wise demands (Un-delivered)</option>
                                    <option value="itemWiseDemands">Item wise demands (Overall)</option>
                                    <option value="custRates">Rate list for customers</option>
                                    <option value="hawkerRates">Rate list for hawkers</option>
                                    <!-- <option value="detailedOrders">Item wise User demands</option>
                                    <option value="detailedOrders">Location wise user demands</option> -->
                                </select>
                                
                               <!-- <label for="item_id">Select Item:</label>
                                <select name="item_id" class="form-control mb-1" required>
                                    <option value="">-- Select Item --</option>
                                    <?php foreach($loc as $l){?>
                                        <option value="<?=$l->id?>"><?=$i->item_name?></option>
                                    <?php }?>
                                </select> -->
                                
                                 <!-- <label for=":">Select Location:</label>
                                <select name="type" class="form-control mb-1" required>
                                    <option value="">-- Select report type --</option>
                                    <option value="orders">User demands</option>
                                    <option value="detailedOrders">User demands with details</option>
                                    <option value="detailedOrders">Item wise User demands</option>
                                    <option value="detailedOrders">Location wise user demands</option>
                                </select> -->

                                <label for=":" class="dateLabel">From:</label>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="date" name="from" class="form-control pickadate" id="from" placeholder="From Date" data-value="<?=date('Y-m-d')?>">
                                    <div class="form-control-position">
                                        <i class='bx bx-calendar'></i>
                                    </div>
                                </fieldset>
        
                                <label for=":" class="dateLabel">To:</label>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="date" name="to" data-value="<?=date('Y-m-d')?>" class="form-control pickadate" placeholder="To Date">
                                    <div class="form-control-position">
                                        <i class='bx bx-calendar'></i>
                                    </div>
                                </fieldset>

                                <button type="submit" class="btn btn-primary">Get report</button>
                                <?php if (isset($result)){?>
                                 <p class="mt-3 font-medium-2">
                                    Showing results for: <br><code><?=$result?></code>
                                 </p>
                                <?php }?>
                            </form>
                        </div>
                        <div class="col-sm-9">
                                <div class="table-responsive">
                                    <table class="table table-striped report-dt">
                                      
                                        <?php if (isset($response)){?>
                                        <thead>
                                            <tr>
                                            <?php $keys = array_keys((array)$response[0]);
                                                    foreach($keys as $k){
                                            ?>
                                                <th><?=$k?></th>
                                            <?php }?>
                                            </tr>
                                        </thead>
                                        <?php } else{?>
                                        <thead>
                                            <tr>
                                                <th>No data</th>
                                            </tr>
                                        </thead>
                                        <?php } ?>
                                        <tbody>
                                            <?php if (isset($response)){
                                                    foreach($response as $r){
                                                    $values = array_values((array)$r);?>
                                            <tr>
                                                    <?php
                                                    foreach($values as $v){
                                            ?>
                                                    <td class="text-dark"><?=$v?></td>

                                            <?php }?>
                                            </tr>
                                            <?php }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <script src="<?=base_url()?>app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="<?=base_url()?>app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>

    
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.colVis.min.js"></script>
<script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js" integrity="sha512-y3o0Z5TJF1UsKjs/jS2CDkeHN538bWsftxO9nctODL5W40nyXIbs0Pgyu7//icrQY9m6475gLaVr39i/uh/nLA==" crossorigin="anonymous"></script>

<script src="<?=base_url()?>app-assets/js/scripts/datatables/datatable.js"></script>

<style>
        .dataTables_length{
            float:left !important;
            display:inline !important;
        }
        .dt-buttons{
            float:right !important;
            display:inline !important;
            margin-top:15px !important;
        }
        .custom-select{
            width:60px !important;
        }
    </style>

<script>
    $( "#reportType" ).change(function() {
        if($(this).val()=='custRates' || $(this).val()=='hawkerRates'){
            $('.dateLabel').hide();
            $('fieldset').hide();
        }
        else{
            $('.dateLabel').show();
            $('fieldset').show();
        }
    });
</script>