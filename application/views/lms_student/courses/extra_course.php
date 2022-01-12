<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/index');?>">Courses</a></li>
                    <li class="breadcrumb-item active">Extra Courses</li>
                </ol>
                <div class="media-body">
                    <h1 class="h2">Extra Courses</h1>
                </div>
                <div class="clearfix"></div>
                <div style="display:none;">
                    <?php if(is_array($expired)){ foreach($expired as $row){ 
                        
                    ?>
                        <!-- <?php echo $row['course_name']; ?> --> 
                        Payment Date <?php echo $date1 = date('d-m-Y',strtotime($row['payment_date'])); ?>
                        <br>
                        Expiry Date <?php echo $date2 = date('d-m-Y',strtotime($row['exp_date'])); ?>
                        <br>
                        <?php if(strtotime(date("d-m-Y")) < strtotime($date2)) echo "Active"; else { echo "Expired";} ?>
                    <?php } }else{ ?>
                    cdsg
                    <?php } ?>   
                </div>
                <?php if($this->session->userdata('extraCourseStatus') =='1'){ ?>

                    <?php if(strtotime(date("d-m-Y")) < strtotime($date2)) {  ?>
                        
                        <div class="card-columns">
                            <?php if(!empty($course)){ foreach($course as $row){ 
                                $id = $row['course_id'];
                                $name = $row['course_name'];
                                $price = $row['price'];
                            ?>

                                <div class="card">
                                    <div class="card-header text-center">
                                        <h4 class="card-title mb-0"><a href="<?php echo base_url('student_controller/course/viewExtraCourse/'.$row['course_id']);?>"><?php echo $row['course_name']; ?></a></h4>
                                        
                                    </div>
                                        <a href="<?php echo base_url('student_controller/course/viewExtraCourse/'.$row['course_id']);?>"><img src="<?php echo base_url().'uploads/img/'.$row['course_img'] ?>" class="img-responsive" style="width:100%;height:300px;"></a>
                                        <span class="badge badge-primary ">dhaji</span>
                                    <div class="card-body">
                                        <a class="btn btn-primary" href="<?php echo base_url('student_controller/course/viewExtraCourse/'.$row['course_id']);?>" style="float:right;margin-bottom:10px;">View syllabus</a>
                                    </div>
                                </div>
                            <?php } }else{ ?>
                            <p>Course(s) not found...</p>
                            <?php } ?>
                        </div>
                    <?php } else{ ?>
                        <div class="card-columns">
                            <?php if(!empty($course)){ foreach($course as $row){ 
                                $id = $row['course_id'];
                                $name = $row['course_name'];
                                $price = $row['price'];
                            ?>
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h4 class="card-title mb-0"><a href="#"><?php echo $row['course_name']; ?></a></h4>
                                        
                                    </div>
                                        <a href="#"><img src="<?php echo base_url().'uploads/img/'.$row['course_img'] ?>" class="img-responsive" style="width:100%;height:300px;"></a>
                                        <span class="badge badge-primary ">dhaji</span>
                                    <div class="card-body">
                                        <a class="btn btn-primary" href="<?php echo base_url('razorpay/courseCheckout/'.$row['course_id']);?>" style="float:left;margin-bottom:10px;">Renew Subscription</a>
                                    </div>
                                </div>
                            <?php } }else{ ?>
                            <p>Course(s) not found...</p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } else{ ?>
                    <div class="card-columns">
                        <?php if(!empty($course)){ foreach($course as $row){ 
                            $id = $row['course_id'];
                            $name = $row['course_name'];
                            $price = $row['price'];
                        ?>
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title mb-0"><a href="#"><?php echo $row['course_name']; ?></a></h4>
                                    
                                </div>
                                    <a href="$"><img src="<?php echo base_url().'uploads/img/'.$row['course_img'] ?>" class="img-responsive" style="width:100%;height:300px;"></a>
                                    <span class="badge badge-primary ">dhaji</span>
                                <div class="card-body">
                                    <a class="btn btn-primary" href="<?php echo base_url('razorpay/courseCheckout/'.$row['course_id']);?>" style="float:left;margin-bottom:10px;">Pay Now</a>
                                </div>
                            </div>
                        <?php } }else{ ?>
                        <p>Course(s) not found...</p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
        