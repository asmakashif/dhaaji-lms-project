

<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard');?>">Home</a></li>
                    <li class="breadcrumb-item active">Historical Question Papers</li>
                </ol>
                <h1 class="h2">Historical Question Papers</h1>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-group">
                                    <form action="<?php echo site_url('admin_controller/examination/submitQP');?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-9 col-md-3">
                                                <select name="grade" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                                    <option value="">Select Grade</option>
                                                    <?php foreach ($grade as $res) { ?>
                                                        <option <?php echo $grade == $res->id ? 'selected="selected"' : '' ?> value="<?php echo $res->class_name;?>"><?php echo $res->class_name;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-9 col-md-3">
                                                <select name="course" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                                    <option value="">Select Subject</option>
                                                    <?php foreach ($course as $res) { ?>
                                                        <option <?php echo $course == $res->course_id ? 'selected="selected"' : '' ?> value="<?php echo $res->course_name;?>"><?php echo $res->course_name;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-9 col-md-4">
                                                <select name="typeofpaper" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                                    <option value="">Type of Paper</option>
                                                    <option value="Previous Question Paper">Previous Question Paper</option>
                                                    <option value="Model Question Paper">Model Question Paper</option>
                                                    <option value="Key Answers">Key Answers</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-9 col-md-4">
                                                <input name="year" type="year" maxlength="4" pattern="[1-9]{1}[0-9]{9}" class="form-control" placeholder="Year">
                                            </div>
                                            <div class="col-sm-9 col-md-4">
                                                <input type="file" name="file" class="form-control" accept=".doc,.docx, .pdf"/>
                                            </div>
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                    <br>
                                    <br>
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Standard</th>
                                                <th>Subject</th>
                                                <th>Type of Paper</th>
                                                <th>Year</th>
                                                <th>Action</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="search">
                                            <?php
                                            foreach($qp as $row){?>
                                                <tr>
                                                    <td><?php echo $row->id;?></td>
                                                    <td><?php echo $row->grade; ?></td>
                                                    <td><?php echo $row->course; ?></td>
                                                    <td><?php echo $row->typeofpaper; ?></td>
                                                    <td><?php echo $row->year; ?></td>
                                                    <td><?php echo $row->file; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin_controller/examination/deleteQP/'.$row->id);?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar');?>

