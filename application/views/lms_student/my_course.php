
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/index');?>">Courses</a></li>
                    <li class="breadcrumb-item active">My Courses</li>
                </ol>
                <div class="media mb-headings align-items-center">
                    <div class="media-body">
                        <h1 class="h2">My Courses</h1>
                    </div>
                    <div class="media-right">
                        <div class="btn-group btn-group-sm">
                            <a href="#" class="btn btn-white active"><i class="material-icons">list</i></a>
                            <a href="#" class="btn btn-white"><i class="material-icons">dashboard</i></a>
                        </div>
                    </div>
                </div>
             <!--    <div class="card-columns">
                    <div class="card">
                        <div class="card-header">
                            <div class="media">
                                <div class="media-left">
                                    <a href="student-student-take-course.html">
                                        <img src="<?php echo base_url();?>assets/images/vuejs.png" alt="Card image cap" width="100" class="rounded">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="card-title m-0"><a href="<?php echo base_url('student_controller/student_dashboard/take_course');?>">Learn VueJs the easy way!</a></h4>
                                    <small class="text-muted">Lessons: 3 of 7</small>
                                </div>
                            </div>
                        </div>
                        <div class="progress rounded-0">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="student-take-course.html" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                        </div>
                    </div>
                </div> -->
                <div class="card-columns">
                    <?php foreach($section_data as $cd){?>
                        <div class="card">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="card-title m-0"><a href="<?php echo base_url('student_controller/student_dashboard/courseContinuation/'.$cd->chapters_id);?>"><?php echo $cd->chapters_name; ?></a></h4>
                                        <!-- <small class="text-muted">Lessons: 3 of 7</small> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="progress rounded-0">
                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> -->
                            <div class="card-footer bg-white">
                                <a href="<?php echo base_url('student_controller/student_dashboard/courseContinuation/'.$cd->chapters_id);?>" class="btn btn-primary btn-sm">Start <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                <!-- <input type="button" id="start" onclick="myfunction()" value="Start"> -->
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <!-- Pagination -->
                <!-- <ul class="pagination justify-content-center pagination-sm">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                            <span>Prev</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#" aria-label="1">
                            <span>1</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="1">
                            <span>2</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span>Next</span>
                            <span aria-hidden="true" class="material-icons">chevron_right</span>
                        </a>
                    </li>
                </ul> -->
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
      