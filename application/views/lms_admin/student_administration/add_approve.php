<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Add/Approve</li>
                </ol>
                <h1 class="h2">Add/Approve</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Student Add/Approve</h4>
                    </div>
                    <div class="card-body">
                        <div class="panel-heading">
                            <a href="<?php echo base_url('admin_controller/student_management/addStudent');?>" style="text-decoration:none;"><button type="button" class="btn btn-success">Add</button></a>
                        </div>
                        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 18px;">#</th>
                                        <th>Student</th>
                                        <th>School</th>
                                        <th>Address</th>
                                        <th>Board</th>
                                        <th>Standard</th>
                                        <th>Course</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $count=1;
                                    if(!empty($approve)){ foreach($approve as $frow){ ?>
                                        <tr>
                                            <td><?php echo $count++;?></td>
                                            <td><?php echo $frow->firstname; ?></td>
                                            <td><?php echo $frow->school_name; ?></td>
                                            <td><?php echo $frow->school_address; ?></td>
                                            <td><?php echo $frow->board; ?></td>
                                            <td><?php echo $frow->grade; ?></td>
                                            <td><?php echo $frow->plan_name; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin_controller/student_management/deleteStudent/'.$frow->id);?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <?php if ($frow->status != '0' ) : ?>
                                                <td>
                                                    <?php if($frow->approve == 0){ ?>
                                                        <a href="<?php echo site_url('admin_controller/student_management/approve/'.$frow->id);?>" class="btn btn-info btn-xs">Approve</a>
                                                    <?php }else{ ?>
                                                        <a href="" class="btn btn-success btn-xs" disable/>Approved</a>
                                                    <?php } ?> 
                                                </td>
                                            <?php endif; ?>
                                            
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
