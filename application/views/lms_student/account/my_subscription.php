<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item active">My Subscription</li>
                </ol>
                <h1 class="h2">My Subscription</h1>
                <div class="card">
                    <?php foreach($subscribe as $row){ ?>
                        <div class="list-group list-group-fit">
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label form-label col-sm-3">Your current plan</label>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <div class="flex"><?php echo $row->plan_name; ?>, ₹ <?php echo $row->plan_amount; ?>/Year</div>
                                        <!-- <a href="student-account-billing-upgrade.html" class="text-secondary">Change plan</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label form-label col-sm-3">Billing cycle</label>
                                    <div class="col-sm-9">
                                        <p class="mb-1">You will be charged ₹ <?php echo $row->plan_amount; ?> on <?php echo date('d-m-Y', strtotime($row->exp_date)); ?></p>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" checked id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">
                                                <strong>Enable automatic renewal</strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label form-label col-sm-3">Cancel</label>
                                    <div class="col-sm-9">
                                        <a href="<?php echo site_url('subscription/in_active/'.$row->id);?>" class="btn btn-warning">Cancel subscription</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>   
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
        