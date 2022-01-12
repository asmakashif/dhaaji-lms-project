<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Activate/Deactivate</li>
                </ol>
                <h1 class="h2">Activate/Deactivate</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Student Activate/Deactivate</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 18px;">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
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
                                    if(!empty($student)){ foreach($student as $frow){ ?>
                                        <tr>
                                            
                                            <td><?php echo $count++;?></td>
                                            <td><?php echo $frow->firstname; ?></td>
                                            <td><?php echo $frow->email; ?></td>
                                            <td><?php echo $frow->school_name; ?></td>
                                            <td><?php echo $frow->school_address; ?></td>
                                            <td><?php echo $frow->board; ?></td>
                                            <td><?php echo $frow->grade; ?></td>
                                            <td><?php echo $frow->curriculum; ?></td>
                                            <td>
                                                <?php if($frow->active ==1){ ?>
                                                    <a href="<?php echo site_url('admin_controller/student_management/is_active/'.$frow->id);?>" class="btn btn-success btn-xs">Activate</a>
                                                <?php }else{ ?>
                                                    <a href="<?php echo site_url('admin_controller/student_management/in_active/'.$frow->id);?>" class="btn btn-warning btn-xs">Deactivate</a>
                                                <?php } ?> 
                                            </td>
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
        