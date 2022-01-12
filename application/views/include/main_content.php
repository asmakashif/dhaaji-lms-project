<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?PHP ECHO BASE_URL('student_controller/student_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <h1 class="h2">Dashboard</h1>
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
                <?php if($this->session->userdata('plan_name') =='Full Course'){ ?>
                    <div id="content-desktop">
                        <div class="row">
                            <div class="col-lg-7">
                                <?php if(strtotime(date("d-m-Y")) < strtotime($date2)) {  ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <h4 class="card-title">Courses</h4>
                                                    <p class="card-subtitle">Your recent courses</p>
                                                </div>
                                                <div class="media-right">
                                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('student_controller/course/my_course');?>">My courses</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php foreach($section_data as $cd){?>
                                            <ul class="list-group list-group-fit mb-0" style="z-index: initial;">

                                                <li class="list-group-item" style="z-index: initial;">
                                                    <div class="d-flex align-items-center">
                                                        <a href="<?php echo base_url('student_controller/course/view_chapter/'.$cd->chapters_id);?>" class="avatar avatar-4by3 avatar-sm mr-3">
                                                            <img src="<?php echo base_url('');?>assets/images/gulp.png" alt="course" class="avatar-img rounded">
                                                        </a>
                                                        <div class="flex">
                                                            <!-- <a href="<?php echo base_url('student_controller/course/view_chapter/'.$cd->chapters_id);?>"><strong><?php echo $cd->chapters_name; ?></strong></a> -->
                                                            <a href="<?php echo base_url('student_controller/student_dashboard/courseContinuation/'.$cd->chapters_id);?>"><strong><?php echo $cd->chapters_name; ?></strong></a>
                                                            <!-- <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="50"aria-valuemin="0" aria-valuemax="50" style="width:50%">
                                                                    <span class="sr-only">70% Complete</span>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                <?php } else{ ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <h4 class="card-title">Courses</h4>
                                                    <p class="card-subtitle">Your recent courses</p>
                                                </div>
                                                <div class="media-right">
                                                    <a class="btn btn-sm btn-primary" onclick="expired()">My courses</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php foreach($section_data as $cd){?>
                                            <ul class="list-group list-group-fit mb-0" style="z-index: initial;">
                                                <li class="list-group-item" style="z-index: initial;">
                                                    <div class="d-flex align-items-center">
                                                        <a href="" class="avatar avatar-4by3 avatar-sm mr-3">
                                                            <img src="<?php echo base_url('');?>assets/images/gulp.png" alt="course" class="avatar-img rounded">
                                                        </a>
                                                        <div class="flex">
                                                            <a href=""><strong><?php echo $cd->chapters_name; ?></strong></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Quizzes</h4>
                                                <p class="card-subtitle">Your Performance</p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php foreach($quizData as $qd){?>
                                        <ul class="list-group list-group-fit mb-0">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <small class="text-black-50 text-uppercase mr-2">Chapter</small>
                                                    <div class="media-body">
                                                        <a class="text-body" href="<?php echo base_url('student_controller/quiz/take_quiz/'.$qd->chapters_id);?>"><strong><?php echo $qd->chapters_name; ?></strong></a>

                                                        
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-5">

                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Forum Activity</h4>
                                                <p class="card-subtitle">Latest forum topics &amp; replies</p>
                                            </div>
                                            <div class="media-right">
                                                <a class="btn btn-sm btn-primary" href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>"> <i class="material-icons">keyboard_arrow_right</i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(!empty($posts)){ foreach($posts as $value){ 
                                        $comment_id = $value['comment_id'];
                                        $firstname = $value['firstname'];
                                        $comment_title = $value['comment_title'];
                                        $comment_details = $value['comment_details'];
                                        $commented_date = $value['commented_date'];
                                        ?>
                                        <ul class="list-group list-group-fit">


                                            <li class="list-group-item forum-thread">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <div class="forum-icon-wrapper">
                                                            <a href="fixed-student-forum-thread.html" class="forum-thread-icon">
                                                                <i class="material-icons">description</i>
                                                            </a>
                                                            <a href="fixed-student-profile.html" class="forum-thread-user">
                                                                <img src="<?php echo base_url('');?>assets/images/avatar.png" alt="" width="20" class="rounded-circle">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="panel-header" align="left">
                                                            <?php echo $value['comment_title'];?>
                                                        </div>
                                                        <div class="panel-header" align="right">
                                                            <small>By <?php echo $value['firstname'];?> On </small>
                                                            <small class="ml-auto text-muted"><?php echo date('d-m-Y', strtotime($value['commented_date']))?></small>
                                                        </div>

                                                        <a class="text-black-70" href="fixed-student-forum-thread.html"><?php echo $value['comment_details'];?></a>

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } }else{ ?>
                                        <p>Comment(s) not found...</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="content-mobile">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Courses</h4>
                                                <p class="card-subtitle">Your recent courses</p>
                                            </div>
                                            <div class="media-right">
                                                <a class="btn btn-sm btn-primary" href="<?php echo base_url('student_controller/course/my_course');?>">My courses</a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php foreach($section_data as $cd){?>
                                        <ul class="list-group list-group-fit mb-0" style="z-index: initial;">

                                            <li class="list-group-item" style="z-index: initial;">
                                                <div class="d-flex align-items-center">
                                                    <a href="<?php echo base_url('student_controller/course/view_chapter/'.$cd->chapters_id);?>" class="avatar avatar-4by3 avatar-sm mr-3">
                                                        <img src="<?php echo base_url('');?>assets/images/gulp.png" alt="course" class="avatar-img rounded">
                                                    </a>
                                                    <div class="flex">
                                                        <a href="<?php echo base_url('student_controller/student_dashboard/courseContinuation/'.$cd->chapters_id);?>"><strong><?php echo $cd->chapters_name; ?></strong></a>
                                                        <div class="d-flex align-items-center">

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Quizzes</h4>
                                                <p class="card-subtitle">Your Performance</p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php foreach($quizData as $qd){?>
                                        <ul class="list-group list-group-fit mb-0">
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <small class="text-black-50 text-uppercase mr-2">Chapter</small>
                                                    <div class="media-body">
                                                        <a class="text-body" href="<?php echo base_url('student_controller/quiz/take_quiz/'.$qd->chapters_id);?>"><strong><?php echo $qd->chapters_name; ?></strong></a>

                                                        <br>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-5">

                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Forum Activity</h4>
                                                <p class="card-subtitle">Latest forum topics &amp; replies</p>
                                            </div>
                                            <div class="media-right">
                                                <a class="btn btn-sm btn-primary" href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>"> <i class="material-icons">keyboard_arrow_right</i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(!empty($posts)){ foreach($posts as $value){ 
                                        $comment_id = $value['comment_id'];
                                        $firstname = $value['firstname'];
                                        $comment_title = $value['comment_title'];
                                        $comment_details = $value['comment_details'];
                                        $commented_date = $value['commented_date'];
                                        ?>
                                        <ul class="list-group list-group-fit">


                                            <li class="list-group-item forum-thread">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <div class="forum-icon-wrapper">
                                                            <a href="fixed-student-forum-thread.html" class="forum-thread-icon">
                                                                <i class="material-icons">description</i>
                                                            </a>
                                                            <a href="fixed-student-profile.html" class="forum-thread-user">
                                                                <img src="<?php echo base_url('');?>assets/images/avatar.png" alt="" width="20" class="rounded-circle">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="panel-header" align="left">
                                                            <?php echo $value['comment_title'];?>
                                                        </div>
                                                        <div class="panel-header" align="right">
                                                            <small>By <?php echo $value['firstname'];?> On </small>
                                                            <small class="ml-auto text-muted"><?php echo date('d-m-Y', strtotime($value['commented_date']))?></small>
                                                        </div>

                                                        <a class="text-black-70" href="fixed-student-forum-thread.html"><?php echo $value['comment_details'];?></a>

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } }else{ ?>
                                        <p>Comment(s) not found...</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else{ ?>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="card-title">Quizzes</h4>
                                        <p class="card-subtitle">Your Performance</p>
                                    </div>
                                </div>
                            </div>


                            <?php foreach($quizData as $qd){?>
                                <ul class="list-group list-group-fit mb-0">
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <small class="text-black-50 text-uppercase mr-2">Chapter</small>
                                                <a class="text-body" href="<?php echo base_url('student_controller/quiz/take_quiz/'.$qd->chapters_id);?>"><strong><?php echo $qd->chapters_name; ?></strong></a>

                                                <!-- <br>
                                                <div class="d-flex align-items-center">
                                                    <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                    <a href="<?php echo base_url('student_controller/course/view_course/'.$qd->course_id);?>"><?php echo $qd->course_name; ?></a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-5">

                        <div class="card">
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="card-title">Forum Activity</h4>
                                        <p class="card-subtitle">Latest forum topics &amp; replies</p>
                                    </div>
                                    <div class="media-right">
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>"> <i class="material-icons">keyboard_arrow_right</i></a>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($posts)){ foreach($posts as $value){ 
                                $comment_id = $value['comment_id'];
                                $firstname = $value['firstname'];
                                $comment_title = $value['comment_title'];
                                $comment_details = $value['comment_details'];
                                $commented_date = $value['commented_date'];
                                ?>
                                <ul class="list-group list-group-fit">


                                    <li class="list-group-item forum-thread">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <div class="forum-icon-wrapper">
                                                    <a href="fixed-student-forum-thread.html" class="forum-thread-icon">
                                                        <i class="material-icons">description</i>
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="forum-thread-user">
                                                        <img src="<?php echo base_url('');?>assets/images/avatar.png" alt="" width="20" class="rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="panel-header" align="left">
                                                    <?php echo $value['comment_title'];?>
                                                </div>
                                                <div class="panel-header" align="right">
                                                    <small>By <?php echo $value['firstname'];?> On </small>
                                                    <small class="ml-auto text-muted"><?php echo date('d-m-Y', strtotime($value['commented_date']))?></small>
                                                </div>

                                                <a class="text-black-70" href="fixed-student-forum-thread.html"><?php echo $value['comment_details'];?></a>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <?php } }else{ ?>
                                <p>Comment(s) not found...</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php $this->load->view('include/sidebar')?>
    <style>
        div#bar1{background:#d1e0e0; }
        div#bar1 > div{ position:relative; width:1px; height:15px; background:#000; }
    </style>
    <script>
        var bar1 = document.getElementById("bar1");
        // var price = document.getElementById("played").innerHTML = Math.round(timePlayed)+"";
        // var sale = document.getElementById("val").innerHTML = "Sum Value = " + sumVal;
        var price = 600;
        var sale = 300;
        var percent = (sale / price) * 100;
        var newleft = Math.round((bar1.offsetWidth * percent) / 100);
        bar1.children[0].style.left = newleft+"px";
        // document.write(sale+" is "+percent+"% of "+price);
        var pointsperc = val(percent);
    </script>
    <style type="text/css">
        @media screen and (max-width : 1920px)
        {
            #content-desktop {display: block;}
            #content-mobile {display: none;}
        }
        @media screen and (max-width : 906px)
        {
            #content-desktop {display: none;}
            #content-mobile {display: block;}
        }

    </style>
    <script>
        function expired() 
        {
          alert("Your Subscription has expired");
        }
    </script>