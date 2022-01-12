<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Collect Fees</li>
                </ol>
                <h1 class="h2">Collect Fees</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Fees Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 18px;">id</th>
                                                <th style="width: 160px;">Name</th>
                                                <th style="width: 50px;">Standard</th>
                                                <th style="width: 70px;">Subject</th>
                                                <th style="width: 50px;">Payment Date</th>
                                                <th style="width: 50px;">Expiry Date</th>
                                                <th style="width: 15px;">Status</th> 
                                                <!-- <th style="width: 24px;">Select</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="search">
                                            <?php $count=1;
                                            foreach ($fees as $key => $fee) { ?>
                                                <tr class="selected">
                                                    <td><?php echo $count++;?></td>
                                                    <td><?php echo $fee->firstname;?></td>
                                                    <td><?php echo $fee->grade;?></td>
                                                    <td><?php echo $fee->curriculum;?></td>
                                                    <td><?php echo $date1 = date('d-m-Y', strtotime($fee->payment_date))?></td>
                                                    <td><?php echo $date2 = date('d-m-Y', strtotime($fee->exp_date))?></td>
                                                    <td><?php if(strtotime(date("d-m-Y")) < strtotime($date2)) echo "Active"; else { echo "Expired";} ?></td>
                                                    <!-- <td> 
                                                        <div class="form-group">
                                                            <div class="custom-controls-stacked">
                                                                <div class="custom-control custom-radio">
                                                                    <input value="" name="" id="" name="radio-stacked" type="radio" class="custom-control-input">
                                                                    <label for="" class="custom-control-label"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td> -->
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <div class="row">
                            <div class="col-md-3">
                                <button type="button" class="btn btn-success">Send Mail</button>
                            </div>
                            <div class="col-md-3">
                                <input id="customCheck05" type="checkbox" class="custom-control-input"> 
                                <label for="customCheck05" class="custom-control-label">Send reminder mail</label>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
            <?php $this->load->view('include1/sidebar');?>
