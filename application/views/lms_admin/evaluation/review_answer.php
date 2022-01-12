<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard');?>">Home</a></li>
                    <li class="breadcrumb-item active">Assessments</li>
                </ol>
                <h1 class="h2">Review Answer Papers</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Test Sheet</h4>
                    </div>
                    <br>
                    <div class="container">
                        <form action="<?php echo site_url('admin_controller/files/index');?>" method="post">
                            <div class="row">  
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select name="grade" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                            <option value="">Select Grade</option>
                                            <?php foreach ($grade as $res) { ?>
                                                <option <?php echo $grade == $res->id ? 'selected="selected"' : '' ?> value="<?php echo $res->class_name;?>"><?php echo $res->class_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary" data-loading-text="Please wait...">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 18px;">id</th>
                                        <th style="width: 100px;">Student Name</th>
                                        <th style="width: 100px;">Class</th>
                                        <th style="width: 50px;">Subject</th>
                                        <th style="width: 50px;">File Uploaded</th>
                                        <th style="width: 70px;">Download File</th>
                                        <!-- <th style="width: 50px;">Upload File</th> -->                                               
                                    </tr>
                                </thead>
                                <tbody class="list" id="search">
                                    <?php $count=1;
                                    foreach($records as $frow): ?>
                                        <tr>
                                            <td><?php echo $count++;?></td>
                                            <td><?php echo $frow->firstname; ?></td>
                                            <td><?php echo $frow->class; ?></td>
                                            <td><?php echo $frow->subject; ?></td>
                                            <!-- <td><?php echo $frow->upload_file; ?></td> -->
                                            <td><a href="<?php echo base_url().'admin_controller/files/download/'.$frow->id; ?>" class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;<?php echo $frow->download_file; ?></a></td>
                                            <td>
                                                <a href="<?php echo base_url('admin_controller/files/edit_test_sheet/'.$frow->id);?>" class="btn btn-info btn-xs"><i class="fa fa-upload"></i>&nbsp;<?php echo $frow->upload_file; ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            <div>
                                <?php
                                if(empty($records)){ ?>
                                    <center>Data not founds.</center> 
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar')?>
        