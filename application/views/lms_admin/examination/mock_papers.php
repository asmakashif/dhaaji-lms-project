
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Mock Test Papers</li>
                </ol>
                <h1 class="h2">Upload Mock Test Papers</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Historical / Mock Test </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('admin_controller/examination/submitMockPapers');?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Title</label>
                                <div class="col-sm-9 col-md-4">
                                    <input id="title" name="title" type="text" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            &nbsp;
                            
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Upload File</label>
                                <div class="col-sm-9 col-md-4">
                                    <div class="input-group input-group-merge">
                                        <input type="file" name="file_name" class="form-control" accept=".doc,.docx, .pdf"/>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group row mb-0">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>      
        <?php $this->load->view('include1/sidebar');?>
