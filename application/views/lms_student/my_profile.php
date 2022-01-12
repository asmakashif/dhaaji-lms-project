<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
                <h1 class="h2">My Profile</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="card-body">
                                    <form class="form" action="<?php echo site_url('student_controller/student_profile/my_profile');?>" method="post" id="reg_form">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">First Name</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="firstname" class="form-control" value="<?php echo $userData['firstname']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Last Name</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="lastname" class="form-control" value="<?php echo $userData['lastname']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Mobile Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="contact" class="form-control" value="<?php echo $userData['contact']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Email address</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly=""  name="email" class="form-control" value="<?php echo $userData['email']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">School Name</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="school_name" class="form-control" value="<?php echo $eduData['school_name']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">School Address</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly=""  name="school_address" class="form-control" value="<?php echo $eduData['school_address']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Grade/Standard</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="grade" class="form-control" value="<?php echo $eduData['grade']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Curriculum</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly=""  name="curriculum" class="form-control" value="<?php echo $eduData['curriculum']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Medium</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="medium" class="form-control" value="<?php echo $eduData['medium']?>" />
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
