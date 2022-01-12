
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/index');?>">Courses</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/extra_courses');?>">Extra Courses</a></li>
                    <li class="breadcrumb-item active">Chapters</li>
                </ol>
                <h1 class="h2">Syllabus/Chapters</h1>
                <div>
                    <!-- <h4><?=$course_data->course_name;?></h4> -->
                    <!--<a href="#"><?php echo $course_data->course_name; ?></a>-->
                </div>
                <div class="card-columns">
                    <?php foreach($chapter_data as $cd){?>
                        <div class="card">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-left">
                                        <!-- <a href="student-student-take-course.html">
                                            <img src="<?php echo base_url();?>assets/images/vuejs.png" alt="Card image cap" width="100" class="rounded">
                                        </a> -->
                                    </div>
                                    <div class="media-body">
                                        <h4 class="card-title m-0"><a href="<?php echo base_url('student_controller/course/viewExtraChapter/'.$cd->chapters_id);?>"><?php echo $cd->chapters_name; ?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="<?php echo base_url('student_controller/course/viewExtraChapter/'.$cd->chapters_id);?>" class="btn btn-primary btn-sm">Start <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>