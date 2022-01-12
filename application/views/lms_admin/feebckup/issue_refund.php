<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Issue Refund</li>
                </ol>
                <h1 class="h2">Issue Refund</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Refund Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 18px;">Order Id</th>
                                        <th style="width: 100px;">Name</th>
                                        <th style="width: 50px;">Course Name</th>
                                        <th style="width: 70px;">Amount</th>
                                        <th style="width: 100px;">Transaction Id</th>
                                        <th style="width: 50px;">Payment Id</th>
                                        <!-- <th style="width: 50px;">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody class="list" id="search">
                                    <?php $count=1;
                                    if(!empty($refund)){ foreach($refund as $frow){ ?>
                                        <tr>
                                            <td><?php echo $count++;?></td>
                                            <td><?php echo $frow->firstname;?></td>
                                            <td><?php echo $frow->plan_name; ?></td>
                                            <td><?php echo $frow->plan_amount; ?></td>
                                            <td><?php echo $frow->txn_id; ?></td>
                                            <td><?php echo $frow->Payment_Id; ?></td> 
                                            <!-- <td>
                                                <a href="<?php echo base_url('admin_controller/admin_dashboard/editRefundDetails/'.$frow->id);?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a> 
                                                <a href="<?php echo base_url('admin_controller/admin_dashboard/deleteRefundDetails/'.$frow->id);?>" class="btn btn-info btn-xs"><i class="fa fa-trash"></i></a>
                                            </td> -->
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar')?>
        