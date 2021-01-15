
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-md-9">
                            <h5 class="content-header-title float-left pr-1 mb-0"><?=isset($data)?'Edit':'Add'?> item</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="bx bx-home-alt"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url('items-master')?>">Items master</a></li>
                                    <li class="breadcrumb-item active"><?=isset($data)?'Edit':'Add'?> item</li>
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
                                    <h4 class="card-title"><?=isset($data)?'Edit':'Add'?> information for the item:</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-1">
                                        <form action="<?=$submissionPath?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label class="dFormLabel">Item name:</label>
                                                    <input type="text" name="item_name" value="<?=isset($data)?$data->item_name:''?>" class="form-control" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="basicInputFile">Category:</label>
                                                    <select name="category_id" class="select form-control" required>
                                                        <option value="">-- Choose one category --</option>
                                                        <?php foreach($cats as $cat){?>
                                                            <option value="<?=$cat->id?>" <?=isset($data)?($data->category_id==$cat->id?' selected':''):''?>><?=$cat->category_name?> <?=$cat->is_active==0?'(inactive)':''?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <fieldset class="form-group">
                                                        <label for="basicInputFile">Item image: </label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="img" id="img" accept=".jpg, .jpeg, .png">
                                                            <label class="custom-file-label" for="img">Choose file</label>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="basicInputFile">Select Unit:</label>
                                                    <select name="unit_id" class="select form-control" required>
                                                        <option value="">-- Choose one unit --</option>
                                                        <?php foreach($units as $u){?>
                                                            <option value="<?=$u->id?>" <?=isset($data)?($data->unit_id==$u->id?' selected':''):''?>><?=$u->unit_name?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label>Buying qtys:</label>
                                                    <input name="buying_qtys" id="tags-input" data-role="tagsinput" class="form-control" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label>Max order qty:</label>
                                                    <input type="number" name="max_order_qty" value="<?=isset($data)?$data->max_order_qty:''?>" class="form-control" step="0.01" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label>Price per unit (for hawker):</label>
                                                    <input type="number" name="item_price_kart" value="<?=isset($data)?$data->item_price_kart:''?>" step="0.01" class="form-control" required>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label>Price per unit (for customer):</label>
                                                    <input type="number" name="item_price_customer" value="<?=isset($data)?$data->item_price_customer:''?>" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-2 px-1">
                                                <a href="<?=base_url('items-master')?>" class="mr-1 btn btn-secondary">Cancel</a>
                                                <button type="submit" class=" btn btn-primary"><?=isset($data)?'Update':'Save'?></button>
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

    <script src="<?=base_url()?>app-assets/vendors/js/tags/bootstrap-tagsinput.js"></script>
    <script>
        $('#tags-input').tagsinput({
            confirmKeys: [13, 188]
        });
        <?php if(isset($data)){?>
            var js_array =<?php echo json_encode(explode('|',$data->buying_qtys))?>;
            js_array.forEach(myFunction);
            function myFunction(item, index) {
                $('#tags-input').tagsinput('add', item);
            }
        <?php } else{?>
            $('#tags-input').tagsinput('add', '0.25');
            $('#tags-input').tagsinput('add', '0.5');
            $('#tags-input').tagsinput('add', '0.75');
            $('#tags-input').tagsinput('add', '1');
            $('#tags-input').tagsinput('add', '2');
            $('#tags-input').tagsinput('add', '3');
            $('#tags-input').tagsinput('add', '4');
            $('#tags-input').tagsinput('add', '5');
        <?php }?>
    </script>
