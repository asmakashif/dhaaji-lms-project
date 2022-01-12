<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/student_management/add_approve');?>">Add/Approve</a></li>
                    <li class="breadcrumb-item active">Add Student</li>
                </ol>
                <h1 class="h2">Add/Approve</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Student Add/Approve</h4>
                    </div>
                    <div class="card-body">
                     <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <form method="post" action="<?php echo base_url('admin_controller/student_management/saveStudent');?>">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="name">First Name</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="text" name="firstname" id = "txt" onkeyup = "Validate(this)" placeholder="Enter First Name" required /> 
                                            <div id="errFirst"></div>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fa fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="name">Last Name</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="text" name="lastname" id = "txt" onkeyup = "Validate(this)" placeholder="Enter Last Name" required />
                                            <div id="errLast"></div>
                                            
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fa fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="name">Mobile Number</label>
                                        <div class="input-group input-group-merge">
                                            <input  name="contact" class="form-control" placeholder="Enter Mobile Number" value="<?php echo set_value('contact'); ?>" pattern="[1-9]{1}[0-9]{9}" maxlength="10" required/>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fa fa-phone"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="email">Email address</label>
                                        <div class="input-group input-group-merge">
                                            <!-- <input class="form-control"  type="text" name="email" id = "email"  onchange="email_validate(this.value);" required/>
                                            <div class="status" id="status"></div> -->
                                            
                                            <input name="email" class="form-control" type="email" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo set_value('email'); ?>" required/>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fa fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input name="password"  type="password" id="txtPassword" title="Password must contain: Minimum 8 characters atleast 1 Alphabet and 1 Number" class="form-control" placeholder="Enter Password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" />
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fa fa-key"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="password">Re-enter Password</label>
                                        <div class="input-group input-group-merge">
                                            <input name="password_confirm" type="password" id="txtConfirmPassword" class="form-control" placeholder="Confirm Password" />
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fa fa-key"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="password">Select Course Type</label>
                                        <div class="input-group input-group-merge">
                                            <select name="plan_name" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                                <option value="">Select Course Type</option>
                                                <?php foreach($subscribe as $row){ ?>
                                                  <option value="<?php echo $row->subject; ?>"><?php echo $row->subject; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen">Add Student</button>

                            </form>
                        </div>
                        <!-- <div class="col-lg-1"></div> -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar')?>
