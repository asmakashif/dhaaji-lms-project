<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/student_management/activate_deactivate');?>">Activate/Deactivate</a></li>
                    <li class="breadcrumb-item active">Activate Student</li>
                </ol>
                <h1 class="h2">Activate Student</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">
                     <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <form id="activate" method="post" action="<?php echo base_url('admin_controller/student_management/sendMail/'.$fetchdatabyid[0]->id);?>">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="name">First Name</label>
                                        <div class="input-group input-group-merge">
                                            <input readonly="" name="firstname" class="form-control" value="<?php echo $fetchdatabyid[0]->firstname;?>"/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="email">Email address</label>
                                        <div class="input-group input-group-merge">
                                            <input readonly=""  name="email" class="form-control" value="<?php echo $fetchdatabyid[0]->email;?>" />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen">Activate</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar')?>
