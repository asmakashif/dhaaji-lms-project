<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/account_controller/edit_account');?>">Edit Account</a></li>
                    <li class="breadcrumb-item active">Add Guardian</li>
                </ol>
                <h1 class="h2">Add Guardian</h1>
                <div class="card">
                    <div class="tab-content card-body">
                        <form action="<?php echo base_url('student_controller/account_controller/save_guardian_data');?>" method="post" id="reg_form" class="form-horizontal">
                            <div class="form-group row">
                                <label for="name_on_invoice" class="col-sm-3 col-form-label form-label">Relationship</label>
                                <div class="col-sm-6 col-md-4">
                                    <input name="relation" type="text" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name_on_invoice" class="col-sm-3 col-form-label form-label">Name of the Guardian</label>
                                <div class="col-sm-6 col-md-4">
                                    <input name="guardian_name" type="text" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="billing_address" class="col-sm-3 col-form-label form-label">Address of the Guardian</label>
                                <div class="col-sm-6 col-md-4">
                                    <input name="guardian_address" type="text" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="billing_address" class="col-sm-3 col-form-label form-label">Phone Number</label>
                                <div class="col-sm-6 col-md-4">
                                    <input  name="phone_number" class="form-control" placeholder="Enter Mobile Number" pattern="[1-9]{1}[0-9]{9}" maxlength="10" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="billing_address" class="col-sm-3 col-form-label form-label">Email Address</label>
                                <div class="col-sm-6 col-md-4">
                                    <input name="email" class="form-control" type="email" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar');?>
