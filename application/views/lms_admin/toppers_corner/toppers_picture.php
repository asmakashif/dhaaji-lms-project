
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Toppers Picture</li>
                </ol>
                <h1 class="h2">Upload Toppers Picture</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Toppers Picture</h4>
                    </div>
                    <div class="card-body">
                        <?php echo validation_errors();?>
                            <?php echo form_open_multipart('admin_controller/Toppers_corner/submitPicture');?>
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Upload Images</label>
                                <div class="col-sm-9 col-md-4">
                                    <div class="input-group input-group-merge">
                                        <input type="file" name="toppers_img[]" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group row mb-0">
                                <div class="col-sm-9 offset-sm-3">
                                    <input type="submit" class="btn btn-success"/>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>      
        <?php $this->load->view('include1/sidebar');?>
