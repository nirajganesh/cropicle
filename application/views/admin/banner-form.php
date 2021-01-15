
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-md-9">
                            <h5 class="content-header-title float-left pr-1 mb-0"><?=isset($data)?'Edit':'Add'?> banner</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="bx bx-home-alt"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url('banner')?>">Frontend banners</a></li>
                                    <li class="breadcrumb-item active"><?=isset($data)?'Edit':'Add'?> banner</li>
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
                                    <h4 class="card-title"><?=isset($data)?'Edit':'Add'?> information for the banner:</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-1">
                                        <form action="<?=$submissionPath?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <fieldset class="form-group">
                                                        <label for="basicInputFile">Upload banner image:</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="img" id="img" accept=".jpg, .jpeg, .png" <?=isset($data)?'':' required'?>>
                                                            <label class="custom-file-label" for="img">Choose file</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <fieldset class="form-group">
                                                        <label for="basicInputFile">Upload banner image for mobile:</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="img2" id="img2" accept=".jpg, .jpeg, .png" <?=isset($data)?'':' required'?>>
                                                            <label class="custom-file-label" for="img2">Choose file</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label>Text:</label>
                                                    <input type="text" name="text" value="<?=isset($data)?$data->text:''?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-2 px-1">
                                                <a href="<?=base_url('banner')?>" class="mr-1 btn btn-secondary">Cancel</a>
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



