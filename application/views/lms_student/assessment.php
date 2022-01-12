<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item active">Assessments</li>
                </ol>
                <h1 class="h2">Reviewed Answer Sheets</h1>
                <!-- <div class="card-header">
                    <div class="row">
                        <div class="col-md-9 col-md-4">
                            <h4 class="card-title">Reviewed Answer Sheets</h4>
                        </div>
                    </div>
                </div> -->
                <div class="card-columns">
                    <?php foreach($test_papers as $cd){?>
                        <div class="card">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-left"></div>
                                    <div class="media-body">
                                        <h4 class="card-title"><a href=""><?php echo $cd->subject; ?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="<?php echo base_url().'student_controller/files/downloadTestPapers/'.$cd->id; ?>" class="btn btn-primary">Download &nbsp;<i class="fa fa-download"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <h1 class="h2">Unit Test</h1>
                <div class="card-columns">
                    <?php if(!empty($files)){ foreach($files as $frow){ ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-left"></div>
                                    <div class="media-body">
                                        <h4 class="card-title"><a href=""><?php echo $frow->title; ?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="<?php echo base_url().'student_controller/files/download/'.$frow->id; ?>" class="btn btn-primary">Download &nbsp;<i class="fa fa-download"></i></a>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
        