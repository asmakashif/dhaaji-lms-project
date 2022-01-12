
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item active">My Educational Information</li>
                </ol>
                <h1 class="h2">My Educational Information</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="card-body">
                                    <form class="form" action="<?php echo site_url('student_controller/student_profile/my_edu_info');?>" method="post" id="reg_form">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">School Name</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="school_name" class="form-control" value="<?php echo $userData['school_name']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">School Address</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly=""  name="school_address" class="form-control" value="<?php echo $userData['school_address']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Grade/Standard</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="grade" class="form-control" value="<?php echo $userData['grade']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Medium</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="medium" class="form-control" value="<?php echo $userData['medium']?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">School Address</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly=""  name="school_address" class="form-control" value="<?php echo $userData['school_address']?>" />
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Curriculum</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly=""  name="curriculum" class="form-control" value="<?php echo $userData['curriculum']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>