<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Current Orders</li>
                </ol>
                <h1 class="h2">Current Orders</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Order Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 18px;">Order Id</th>
                                        <th style="width: 100px;">Student Name</th>
                                        <th style="width: 50px;">Book Name</th>
                                        <th style="width: 70px;">Purchase Date</th>
                                        <th style="width: 50px;">Quantity</th>
                                        <th style="width: 50px;">Status</th>
                                        <th style="width: 50px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="search">
                                    <?php $count=1;
                                    if(!empty($orders)){ foreach($orders as $frow){ ?>
                                        <tr>
                                            <td><?php echo $count++;?></td>
                                            <td><?php echo $frow->name; ?></td>
                                            <td><?php echo $frow->book_name; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($frow->purchase_date))?></td>
                                            <td>1</td>
                                            <td><?php echo $frow->status; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin_controller/admin_dashboard/editOrderDetails/'.$frow->id);?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        <br>
                            <button type="button" class="btn btn-primary" onclick="windows:location.href='https://trailroom.in/dhaji_lms/admin_controller/admin_dashboard/books'">Prev</button>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar')?>
        