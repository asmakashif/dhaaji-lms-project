<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/current_orders');?>">Order Details</a></li>
                    <li class="breadcrumb-item active">Edit Order Details</li>
                </ol>
                <h1 class="h2">Edit Order Details</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="card-body">
                                    <form class="form" action="<?php echo site_url('admin_controller/admin_dashboard/updateOrderDetails/'.$fetchdatabyid[0]->id);?>" method="post" id="reg_form">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Name</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="firstname" class="form-control" value="<?php echo $fetchdatabyid[0]->name;?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Mobile Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="contact" class="form-control" value="<?php echo $fetchdatabyid[0]->contact;?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Address</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly=""  name="email" class="form-control" value="<?php echo $fetchdatabyid[0]->address;?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Book Name</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="school_name" class="form-control" value="<?php echo $fetchdatabyid[0]->book_name;?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Purchase Date</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly=""  name="school_address" class="form-control" value="<?php echo $fetchdatabyid[0]->purchase_date;?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Status</label>
                                                    <select name="status" id="val_select" class="form-control" required data-md-selectize style="color:black;">
                                                        <option value="<?php echo $fetchdatabyid[0]->status;?>"><?php echo $fetchdatabyid[0]->status;?></option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Completed">Completed</option>
                                                        <option value="Cancel">Cancel</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button  type="submit" class="btn btn-success col-md-1">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('include1/sidebar')?>
