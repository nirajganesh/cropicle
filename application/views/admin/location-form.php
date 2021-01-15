
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-md-9">
                            <h5 class="content-header-title float-left pr-1 mb-0"><?=isset($data)?'Edit':'Add'?> location</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="bx bx-home-alt"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url('locations-master')?>">Locations master</a></li>
                                    <li class="breadcrumb-item active"><?=isset($data)?'Edit':'Add'?> location</li>
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
                                    <h4 class="card-title"><?=isset($data)?'Edit':'Add'?> information for the location:</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-1">
                                        <form action="<?=$submissionPath?>" method="POST">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label class="dFormLabel">Area name:</label>
                                                    <input type="text" name="area" value="<?=isset($data)?$data->area:''?>" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label class="dFormLabel">City:</label>
                                                    <input type="text" name="city" value="<?=isset($data)?$data->city:''?>" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label class="dFormLabel">State:</label>
                                                    <input type="text" name="state" value="<?=isset($data)?$data->state:''?>" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label class="dFormLabel">Pin code:</label>
                                                    <input type="text" maxlength="6" minlength="6" name="pin_code" value="<?=isset($data)?$data->pin_code:''?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mt-2 px-1">
                                                <a href="<?=base_url('locations-master')?>" class="mr-1 btn btn-secondary">Cancel</a>
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



