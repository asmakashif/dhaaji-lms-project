
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/index');?>">Courses</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/extra_courses');?>">Extra Courses</a></li>
                    <li class="breadcrumb-item active">Take Course</li>
                </ol>
                <h1 class="h2">Take Course</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Download Test Paper</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if(!empty($pdfdown)){ ?>
                                    <a href="<?php echo base_url().'student_controller/course/download/'.$chapters_id; ?>" class="btn btn-primary btn-block flex-column">
                                        <i class="material-icons">get_app</i> Physical Test Paper
                                    </a>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Course Material</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if(!empty($pdfdown)){ ?>
                                    <a href="<?=base_url('uploads/'.$pdfdown->course_material)?> #toolbar=0&navpanes=0&scrollbar=0" target="_blank" class="btn btn-primary btn-block flex-column"><i class="material-icons">visibility</i>View Material</a>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <a href="<?php echo base_url('student_controller/student_dashboard/get_help');?>" class="btn btn-default btn-block">
                            <i class="material-icons btn__icon--left">help</i> Get Help
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
            