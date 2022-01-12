
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/index');?>">Courses</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/curriculum_courses');?>">Curriculum Courses</a></li>
                    <li class="breadcrumb-item active">Chapters</li>
                </ol>
                <?php if($this->session->userdata('plan_name') =='Full Course'){ ?>
                    <h1 class="h2">Syllabus/Chapters</h1>
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
                                            <h4 class="card-title m-0"><a href="<?php echo base_url('student_controller/course/view_chapter/'.$cd->chapters_id);?>"><?php echo $cd->chapters_name; ?></a></a></h4>
                                            <!-- <small class="text-muted">Lessons: 3 of 7</small> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <a href="<?php echo base_url('student_controller/course/view_chapter/'.$cd->chapters_id);?>" class="btn btn-primary btn-sm">Start <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php } else{ ?>
                    <h1 class="h2">Syllabus/Chapters</h1>
                    <div class="card-columns">
                        <?php foreach($chapter_data as $cd){?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="media">
                                        <div class="media-left">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="card-title m-0"><a href="<?php echo base_url('student_controller/course/view_test_chapter/'.$cd->chapters_id);?>"><?php echo $cd->chapters_name; ?></a></a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <!-- <h4 class="card-title">Take Quiz</h4> -->
                                    <a href="<?php echo base_url('student_controller/quiz/take_quiz/'.$cd->chapters_id);?>" class="btn btn-primary btn-sm"><i class="material-icons">play_circle_outline</i>Start Quiz</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>