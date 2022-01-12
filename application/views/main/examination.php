<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url('assets_1/images/new/aboutbg.jpg')?>">
        <div class="container pt-90 pb-50"> 
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row"> 
                    <div class="col-md-12">
                        <h3 class="title text-white">Examination</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
       <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="bg-lightest border-1px p-30 mb-0">
                        <h3 class="text-theme-colored mt-0 pt-5">Download Question Paper</h3>
                        <form action="<?php echo site_url('main_controller/main_dashboard/getRecords');?>" method="post">
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
                                    <div class="form-group">
                                        <select name="course" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                            <option value="">Select Subject</option>
                                            <?php foreach ($course as $res) { ?>
                                                <option <?php echo $course == $res->course_id ? 'selected="selected"' : '' ?> value="<?php echo $res->course_name;?>"><?php echo $res->course_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select name="year" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                            <option value="">Select Year</option>
                                            <?php foreach ($year as $res) { ?>
                                                <option <?php echo $year == $res->id ? 'selected="selected"' : '' ?> value="<?php echo $res->year;?>"><?php echo $res->year;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" data-loading-text="Please wait...">Search</button>
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
                                    <th>File</th>                                                
                                </tr>
                            </thead>
                            <tbody class="list" id="search">
                                <?php foreach($records as $rec): ?>
                                    <tr>
                                        <td><?php echo $rec->id;?></td>
                                        <td><?php echo $rec->grade; ?></td>
                                        <td><?php echo $rec->course; ?></td>
                                        <td><?php echo $rec->typeofpaper; ?></td>
                                        <td><?php echo $rec->year; ?></td>
                                        <td><a href="<?php echo base_url().'main_controller/main_dashboard/download/'.$rec->id; ?>" class="btn btn-primary">Download &nbsp;<i class="fa fa-download"></i></a></td>
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
    </section> 
</div>
<!-- end main-content -->