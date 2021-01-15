
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-md-9">
                            <h5 class="content-header-title float-left pr-1 mb-0">Create new demand</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="bx bx-home-alt"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>user-demands">User demands</a></li>
                                    <li class="breadcrumb-item active">Create new demand</li>
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
                                    <h4 class="card-title">Start creating a new user demand :</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-1">
                                        <form action="<?=base_url('AddAdm/saveDemand')?>" method="POST" id="demand-form">
                                            <div class="row mt-2">
                                                <div class="col-md-12 form-group file-repeater">
                                                    <div id="repeater-list">
														<div class="row mb-2" style="flex-wrap: nowrap;">
															<div class="col-md-6 col-5 pr-0 px-md-1 mb-1">
																<select name="item_id[]" class="select form-control" onchange="checkSelects()" required>
																	<option value="">Items</option>
																	<?php $c=100; foreach($data as $d){?>
																		<option data-price="<?=$d->item_price_customer?>" value="<?=$d->id?>" data-unit="<?=$d->unit_short_name?>" data-row="<?=$c?>" ><?=$d->item_name.'&nbsp;(Rs. '.$d->item_price_customer.'/'.$d->unit_short_name.')'?></option>
																	<?php }?>
																</select>
															</div>
															<div class="input-group col-md-3 col-5 mb-1">
																<input type="number" name="qty[]" step="0.01" min="0" class="form-control unit<?=$c?>" placeholder="Qty" aria-describedby="basic-addon2" required>
                                                                <span id="unitSpan<?=$c?>" style="padding-top:8px;">&nbsp;</span>
															</div>
															<div class="input-group col-md-3 col-2 mb-1">
																<input type="number" name="price[]" step="0.01" min="0" class="form-control prc price<?=$c?>" placeholder="price" aria-describedby="basic-addon2" required hidden style="display:none">
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
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 form-group">
                                                    <label class="">Customer Name :</label>
                                                    <input type="text" class="form-control" name="name" required>
                                                </div>
                                                <div class="col-md-6 col-sm-12 form-group">
                                                    <label class="">Customer Contact no. :</label>
                                                    <input type="text" maxlength="10" minlength="10" class="form-control digits" name="phone" required>
                                                </div>
                                                <div class="col-md-6 col-sm-12 form-group">
                                                    <label class="">Delivery address:</label>
                                                    <textarea class="form-control" name="address" rows="3" required></textarea>
                                                </div>
                                                
                                            </div>
                                            <hr>
                                            <div class="row mt-1">
                                                <div class="col-md-4 text-dark">Total no. of items: <span id="total_items">1</span></div>
                                            </div>
                                            <hr>
                                            <div class="row mt-2">
                                                <a href="<?=base_url()?>admin" class="mx-1 btn btn-secondary">cancel</a>
                                                <button type="button" id="submit" class="mx-1 btn btn-primary">Create</button>
                                                <button type="submit" id="realSubmit" class="hidden" style="display:none" hidden></button>
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
                                <option data-price="<?=$d->item_price_customer?>" data-unit="<?=$d->unit_short_name?>" data-row="`+i+`" value="<?=$d->id?>"><?=$d->item_name.'&nbsp;(Rs. '.$d->item_price_customer.'/'.$d->unit_short_name.')'?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="input-group col-md-3 col-5 mb-1">
                        <input type="number" name="qty[]" step="0.01" min="0" class=" form-control unit`+i+`"  placeholder="Qty" aria-describedby="basic-addon2" required>
                        <span id="unitSpan`+i+`" style="padding-top:8px;">&nbsp;</span>
                    </div>
                    <div class="col-md-2 col-1 pl-0 px-md-1 ">
                        <button type="button" id="`+i+`" class="btn btn-icon btn-light-danger btn_remove">
                            <i class="bx bx-x"></i>
                            <span class="d-lg-inline-block d-none">Remove</span>
                        </button>
                    </div>
                    <div class="input-group col-md-3 col-2 mb-1">
                        <input type="number" name="price[]" step="0.01" min="0" class="form-control prc price`+i+`"  placeholder="price" aria-describedby="basic-addon2" required hidden style="display:none">
                    </div>
                </div>
            `).hide().fadeIn();
            updateItemsCount();
        });


        // Remove dynamic input row
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id"); 
            $('#row'+button_id+'').remove();
            updateItemsCount();
        });

        // Update total no. of items
        function updateItemsCount(){
            itemsCount=$("select").length;
            $('#total_items').text(itemsCount);
        }

        // check for duplicate items
        function checkSelects(event) 
        {
            var elem=this.event.target.selectedOptions;
            var row=elem[0].dataset.row;
            var price=elem[0].dataset.price;
            $('.price'+row).val(price);
            var unit=elem[0].dataset.unit;
            $('#unitSpan'+row).html('&nbsp;'+unit).addClass('badge badge-light-secondary rounded-0 pt-1');
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

        // Form Submit
        $("#demand-form").on("click", "#submit", function(){
            var form = $('#demand-form');
            if(form.valid()){
                $("#realSubmit").click();
                $("#realSubmit").remove();
            }
        });

    </script>
    


