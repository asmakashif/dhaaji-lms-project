<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/files/index');?>">Review Answer Papers</a></li>
                    <li class="breadcrumb-item active">Upload Answer Papers</li>
                </ol>
                <h1 class="h2">Review Answer Papers</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Test Sheet</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('admin_controller/files/upload_test_sheet/'.$fetchdatabyid[0]->id);?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Student Name</label>
                                <div class="col-sm-9 col-md-4">
                                    <input id="firstname" name="firstname" type="text" value="<?php echo $fetchdatabyid[0]->firstname;?>" class="form-control">
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Grade</label>
                                <div class="col-sm-9 col-md-4">
                                    <input id="subject" name="class" type="text" value="<?php echo $fetchdatabyid[0]->class;?>" class="form-control">
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Subject</label>
                                <div class="col-sm-9 col-md-4">
                                    <input id="subject" name="subject" type="text" value="<?php echo $fetchdatabyid[0]->subject;?>" class="form-control">
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Upload File</label>
                                <div class="col-sm-9 col-md-4">
                                    <div class="input-group input-group-merge">
                                        <input type="file" name="upload_file" class="form-control" accept=".doc,.docx, .pdf"/>
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
        <?php $this->load->view('include1/sidebar')?>
        