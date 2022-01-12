<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Order Details</a></li>
                    <li class="breadcrumb-item active">Edit Order Details</li>
                </ol>
                <h1 class="h2">Edit Order Details</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="card-body">
                                    <form class="form" action="<?php echo site_url('admin_controller/admin_dashboard/updateRefundDetails/');?>" method="post" id="reg_form">
                                        <div class="row">
                                            <!-- <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Transaction Id</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="txn_id" class="form-control" value="<?php echo $fetchdatabyid[0]->txn_id;?>" />
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Course Name</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly="" name="plan_name" class="form-control" value="<?php echo $fetchdatabyid[0]->plan_name;?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Amount</label>
                                                    <div class="input-group input-group-merge">
                                                        <input readonly=""  name="plan_amount" class="form-control" value="<?php echo $fetchdatabyid[0]->plan_amount;?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Reason</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" name="Reason" class="form-control"/>
                                                    </div>
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
