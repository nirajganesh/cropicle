
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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>demand-lists">List of demands</a></li>
                                    <li class="breadcrumb-item active">Create demand list</li>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header px-1">
                                    <h4 class="card-title">Start creating new demand list:</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-1">
                                        <form action="<?=base_url('Add/saveDemand')?>" method="POST" id="demand-form">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 form-group">
                                                    <label class="dFormLabel">Name of list:</label>
                                                    <input type="text" name="name" class="form-control" placeholder="List name (Eg: Fruits list)" required>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12 form-group file-repeater">
                                                    <div id="repeater-list">
														<div class="row mb-2" style="flex-wrap: nowrap;">
															<div class="col-md-6 col-5 pr-0 px-md-1 mb-1">
																<select name="item_id[]" class="select form-control" onchange="checkSelects()" required>
																	<option value="">Items</option>
																	<?php $c=100; foreach($data as $d){?>
																		<option value="<?=$d->id?>" data-max="<?=$d->max_order_qty?>" data-row="<?=$c?>" ><?=$d->item_name.'&nbsp;(Rs. '.$d->item_price_kart.'/'.$d->unit_short_name.')'.'&nbsp;(max:'.$d->max_order_qty.' '.$d->unit_short_name.')'?></option>
																	<?php }?>
																</select>
															</div>
															<div class="input-group col-md-3 col-5 mb-1">
																<input type="number" name="qty[]" step="0.25" min="0" class="digits form-control maxQty<?=$c?>" placeholder="Qty" aria-describedby="basic-addon2" required>
																<div class="input-group-append">
																	<span class="input-group-text font-small-3 " style="padding:0 5px" id="basic-addon2">kg</span>
																</div>
															</div>
														</div>
                                                    </div>
                                                    <div class="col form-group p-0">
                                                        <button class="btn btn-light-primary dFormAdder" type="button">
                                                            <i class="bx bx-plus"></i>Add item
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mt-1">
                                                <div class="col-md-4 text-dark">Total no. of items: <span id="total_items">1</span></div>
                                                <div class="col-md-4 text-dark my-1 my-sm-0">Total Qty: <span id="total_qty">0</span> Kg</div>
                                            </div>
                                            <hr>
                                            <div class="row mt-2">
                                                <a href="<?=base_url()?>demand-lists" class="mx-1 btn btn-secondary">cancel</a>
                                                <button type="button" id="submit" class="mx-1 btn btn-primary">Save List</button>
                                            </div>
                                        </form>
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
    <!-- END: Content-->
    
    <script>

        var i=1;
        var itemsCount=0;
        
        // Add dynamic input row
        $('.dFormAdder').click(function(){
            i++;
            $('#repeater-list').append( `
                <div class="row mb-2" id="row`+i+`" style="flex-wrap: nowrap;">
                    <div class="col-md-6 col-5 pr-0 px-md-1 mb-1">
                        <select name="item_id[]" class="select form-control" onchange="checkSelects()" required>
                            <option value="">Items</option>
                            <?php foreach($data as $d){?>
                                <option data-max="<?=$d->max_order_qty?>" data-row="`+i+`" value="<?=$d->id?>"><?=$d->item_name.'&nbsp;(Rs. '.$d->item_price_kart.'/'.$d->unit_short_name.')'.'&nbsp;(max:'.$d->max_order_qty.' '.$d->unit_short_name.')'?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="input-group col-md-3 col-5 mb-1">
                        <input type="number" name="qty[]" step="0.25" min="0" class="digits form-control maxQty`+i+`"  placeholder="Qty" aria-describedby="basic-addon2" required>
                        <div class="input-group-append">
                            <span class="input-group-text font-small-3 " style="padding:0 5px" id="basic-addon2">kg</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-1 pl-0 px-md-1 ">
                        <button type="button" id="`+i+`" class="btn btn-icon btn-light-danger btn_remove">
                            <i class="bx bx-x"></i>
                            <span class="d-lg-inline-block d-none">Delete</span>
                        </button>
                    </div>
                </div>
            `);
            updateItemsCount();
        });


        // Remove dynamic input row
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id"); 
            $('#row'+button_id+'').remove();
            updateItemsCount();
            updateQty();
        });


        // Update total no. of items
        function updateItemsCount(){
            itemsCount=$("select").length;
            $('#total_items').text(itemsCount);
        }


        // Update total qty
        $(document).keyup(function(){
        var totalPoints = 0;
            $('#repeater-list').find('input[type="number"]').each(function(i,n){
                totalPoints += parseFloat($(n).val(),10); 
            });
            $('#total_qty').text(totalPoints);
        });
        function updateQty(){
            var totalPoints = 0;
            $('#repeater-list').find('input[type="number"]').each(function(i,n){
                totalPoints += parseFloat($(n).val(),10); 
            });
            $('#total_qty').text(totalPoints);
        }


        // check for duplicate items
        function checkSelects(event) 
        {
            var elem=this.event.target.selectedOptions;
            var max=elem[0].dataset.max;
            var row=elem[0].dataset.row;
            $('.maxQty'+row).val(max);
            $('.maxQty'+row).attr('max',max);
            var $elements = $('select');
            $elements
                .removeClass('errorB')
                .each(function () {
                    var selectedValue = this.value;
                    $elements
                        .not(this)
                        .filter(function() {
                            return this.value == selectedValue;
                        })
                        .addClass('errorB');
                });
        }

        // Add max value rule
        function addMaxRule(event){
        }


        // Form Submit
        $("#submit").click(function(){
            if(parseFloat($('#total_qty').text())><?=$cap?>){
                toastr.info('Your demand list is more than the Max capacity of your Kart. Please reduce some items.', 'Warning !', {"showMethod": "slideDown","timeOut": 0,"closeButton": true});
            }
            else{
                var form = $('#demand-form');
                var url = form.attr('action');
                if(form.valid()){
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(),
                        success: function(data)
                        {
                            if(data){
                                window.location.replace('demand-lists');
                            }
                            else{
                                toastr.error('Invalid/incomplete data submitted', 'Error !', {"showMethod": "slideDown","timeOut": 0,"closeButton": true});
                            }
                        },
                        error: function(){
                            alert('error');
                        }
                    });
                }
            }
            
        });

    </script>
    


