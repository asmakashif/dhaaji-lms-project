<!-- <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script>
    function searchFilter(page_num){
        page_num = page_num?page_num:0;
        var keywords = $('#keywords').val();
        var sortBy = $('#sortBy').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('student_controller/search_course/ajaxPaginationData/'); ?>'+page_num,
            data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
            beforeSend: function(){
                $('.loading').show();
            },
            success: function(html){
                $('#dataList').html(html);
                $('.loading').fadeOut("slow");
            }
        });
    }
</script> -->

<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/index');?>">Courses</a></li>
                    <li class="breadcrumb-item active">Curriculum Courses</li>
                </ol>
                <div class="media-body">
                    <h1 class="h2">Curriculum Courses</h1>
                </div>
                <div class="clearfix"></div>
                <div style="display:none;">
                    <?php if(is_array($expired)){ foreach($expired as $row){ 
                        
                    ?>
                        <?php echo $row['id']; ?>
                        Payment Date <?php echo $date1 = date('d-m-Y',strtotime($row['payment_date'])); ?>
                        <br>
                        Expiry Date <?php echo $date2 = date('d-m-Y',strtotime($row['exp_date'])); ?>
                        <br>
                        <?php if(strtotime(date("d-m-Y")) < strtotime($date2)) echo "Active"; else { echo "Expired";} ?>
                    <?php } }else{ ?>
                    cdsg
                    <?php } ?>   
                </div>
                <?php if(strtotime(date("d-m-Y")) < strtotime($date2)) {  ?>
                    <div class="card-columns">
                        
                        <?php if(!empty($course)){ foreach($course as $row){?>
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title mb-0"><a href="<?php echo base_url('student_controller/course/view_course/'.$row['course_id']);?>"><?php echo $row['course_name']; ?></a></h4>
                                    
                                </div>
                                <!-- <a href="student-take-course.html"> -->
                                    <a href="<?php echo base_url('student_controller/course/view_course/'.$row['course_id']);?>"><img src="<?php echo base_url().'uploads/img/'.$row['course_img'] ?>" class="img-responsive" style="width:100%;height:250px;"></a>
                                    <!-- <span class="badge badge-primary ">dhaji</span> -->
                                <!-- </a> -->
                                <div class="card-body">
                                    <!-- <small class="text-muted">ADVANCED</small><br>
                                            Let’s start with a quick tour of Vue’s data binding features. If you are more interested in ...<br> -->
                                    <span class="badge badge-primary ">dhaji</span>
                                    <a class="btn btn-primary" href="<?php echo base_url('student_controller/course/view_course/'.$row['course_id']);?>" style="float:right;margin-bottom:10px;">View syllabus</a>
                                </div>
                            </div>
                        <?php } }else{ ?>
                        <p>Course(s) not found...</p>
                        <?php } ?>
                    </div>
                <?php } else{ ?>
                    <div class="card-columns">
                        <?php if(!empty($course)){ foreach($course as $row){?>
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title mb-0"><a onclick="expired()"><?php echo $row['course_name']; ?></a></h4>
                                    
                                </div>
                                <a onclick="expired()"><img src="<?php echo base_url().'uploads/img/'.$row['course_img'] ?>" class="img-responsive" style="width:100%;height:250px;"></a>
                                
                                <div class="card-body">
                                    <span class="badge badge-primary ">dhaji</span>
                                    <a class="btn btn-primary" href="" style="float:right;margin-bottom:10px;">Renew Subscription</a>
                                </div>
                            </div>
                        <?php } }else{ ?>
                        <p>Course(s) not found...</p>
                        <?php } ?>
                        
                        <?php if(is_array($expired)){ foreach($expired as $row){ ?>
                            <div class="card-body">
                                <!-- <button type="button" class="btn btn-primary" onclick="myfunction();">Renew Subscription<?php echo $row['id']; ?></button> -->
                                <!-- <a class="btn btn-primary" href="<?php echo base_url('user_controller/is_active/'.$row->user_id);?>"  style="float:right;margin-bottom:10px;">Renew Subscription<?php echo $row['id']; ?></a> -->
                            </div>
                        <?php } } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
        <script>
    function myfunction($id, $status){
        //get the input value
        $.ajax({
            //the url to send the data to
            url: "<?php echo base_url('user_controller/is_active');?>",
            //the data to send to
            data: {id : $id, status: 0},
            //type. for eg: GET, POST
            type: "POST",
            //on success
            success: function(data){
                console.log("***********Success***************"); //You can remove here
                console.log(data); //You can remove here
            },
            //on error
            error: function(){
                    console.log("***********Error***************"); //You can remove here
                    console.log(data); //You can remove here
            }
        });
    }
</script>
<script>
    function expired() 
    {
      alert("Your Subscription has expired");
    }
</script>