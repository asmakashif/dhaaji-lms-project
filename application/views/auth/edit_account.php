<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Edit Account</li>
                </ol>
                <h1 class="h2">Edit Account</h1>
                <div class="card">
                    <ul class="nav nav-tabs nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link active" href="#first" data-toggle="tab">School</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#second" data-toggle="tab">Guardian</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#third" data-toggle="tab">Billing</a>
                        </li> -->
                    </ul>
                    <div class="tab-content card-body">
                        <div class="tab-pane active" id="first">
                            <?php echo form_open('student_controller/account_controller/update_data')?>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label form-label">School Name</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input name="school_name" class="form-control" value="<?php echo $eduData['school_name']?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label form-label">School Address</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <textarea name="school_address" class="form-control"><?php echo $eduData['school_address']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label form-label">State</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input name="state" class="form-control" value="<?php echo $eduData['state']?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label form-label">City</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input name="city" class="form-control" value="<?php echo $eduData['city']?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label form-label">Contact</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input readonly="" name="contact" class="form-control" value="<?php echo $userData['contact']?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
                                    <div class="col-sm-8">
                                         <div class="row">
                                            <div class="col-md-6">
                                                <input readonly=""  name="email" class="form-control" value="<?php echo $userData['email']?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label form-label">Point of Contact</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input  name="pointofcontact" class="form-control" placeholder="Enter Mobile Number" pattern="[1-9]{1}[0-9]{9}" maxlength="10" value="<?php echo $eduData['pointofcontact']?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen">Update</button>
                            <?php echo form_close()?>
                        </div>

                        <div class="tab-pane" id="second">
                            <a href="<?php echo base_url('student_controller/account_controller/add');?>">
                                <button type="button" class="btn btn-primary"style="text-decoration:none;">Add Guardian</button>
                            </a>
                            <br>
                            <br>
                            <?php echo form_open('student_controller/account_controller/updateGuardiandata')?>
                                <div class="form-group row">
                                    <label for="name_on_invoice" class="col-sm-3 col-form-label form-label">Relationship</label>
                                    <div class="col-sm-6 col-md-4">
                                        <input name="relation" class="form-control" value="<?php echo $guardianData['relation']?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name_on_invoice" class="col-sm-3 col-form-label form-label">Name of the Guardian</label>
                                    <div class="col-sm-6 col-md-4">
                                        <input name="guardian_name" class="form-control" value="<?php echo $guardianData['guardian_name']?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="billing_address" class="col-sm-3 col-form-label form-label">Address of the Guardian</label>
                                    <div class="col-sm-6 col-md-4">
                                        <textarea name="guardian_address" class="form-control"><?php echo $guardianData['guardian_address']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="billing_address" class="col-sm-3 col-form-label form-label">Phone Number</label>
                                    <div class="col-sm-6 col-md-4">
                                        <input name="phone_number" class="form-control" value="<?php echo $guardianData['phone_number']?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="billing_address" class="col-sm-3 col-form-label form-label">Email Address</label>
                                    <div class="col-sm-6 col-md-4">
                                        <input name="email" class="form-control" value="<?php echo $guardianData['email']?>" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen">Update</button>
                            <?php echo form_close()?>
                        </div>

                        <div class="tab-pane" id="third">
                            <form action="#" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="name_on_invoice" class="col-sm-3 col-form-label form-label">Name on Invoice</label>
                                    <div class="col-sm-6 col-md-4">
                                        <input id="name_on_invoice" type="text" class="form-control" value="Adrian Demian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="billing_address" class="col-sm-3 col-form-label form-label">Address</label>
                                    <div class="col-sm-6 col-md-4">
                                        <input id="billing_address" type="text" class="form-control" value="Sunny Street, 21, Miami, Florida">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="billing_country" class="col-sm-3 col-form-label form-label">Country</label>
                                    <div class="col-sm-6 col-md-4">
                                        <select id="billing_country" class="custom-control custom-select form-control">
                                            <option value="1" selected>USA</option>
                                            <option value="2">India</option>
                                            <option value="3">United Kingdom</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-4 offset-sm-3">
                                        <a href="#" class="btn btn-success"> Update Billing</a>
                                    </div>
                                </div>
                            </form>
                            <div class="card mt-2">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">Payment Info</h4>
                                        </div>
                                        <div class="media-right">
                                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="material-icons">add</i></a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="card-footer p-0 list-group list-group-fit">
                                    <li class="list-group-item active">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <span class="btn btn-primary btn-circle"><i class="material-icons">credit_card</i></span>
                                            </div>
                                            <div class="media-body">
                                                <p class="mb-0">**** **** **** 2422</p>
                                                <small>Updated on 12/02/2016</small>
                                            </div>
                                            <div class="media-right">
                                                <a href="#" class="btn btn-primary btn-sm">
                                                    <i class="material-icons btn__icon--left">edit</i> EDIT
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <span class="btn btn-white btn-circle"><i class="material-icons">credit_card</i></span>
                                            </div>
                                            <div class="media-body">
                                                <p class="mb-0">**** **** **** 6321</p>
                                                <small class="text-muted">Updated on 11/01/2016</small>
                                            </div>
                                            <div class="media-right">
                                                <a href="#" class="btn btn-white btn-sm">
                                                    <i class="material-icons btn__icon--left">edit</i> EDIT
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php $this->load->view('include/sidebar');?>
