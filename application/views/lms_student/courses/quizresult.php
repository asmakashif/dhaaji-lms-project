<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item active">Quiz</li>
                </ol>
                <div class="card">   
                <div class="card-header"><h3 class="badge badge-danger text-center">Result</h3></div>
                    <div class="card-body"> 
                        <?php
                            $correct_marks=0;
                            foreach ($correct as $k) {
                                $correct_marks = $correct_marks + $k->weightage_marks;
                            }
                        ?>
                           <table class="table table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>Course Name</th>
                                <th>Chapter Name</th>
                                <th>Total No of questions</th>
                                <th>Correct</th>
                                <th>Wrong</th>
                                <th>Score</th>                              
                            </thead>
                            <tbody class="text-center">
                                <tr><td><span class="badge badge-primary"><?=$userdet->firstname?> <?=$userdet->lastname?></span></td>
                                <td><span class="badge badge-info"><?=$course->course_name?></span></td>
                                <td><span class="badge badge-info"><?=$course->chapters_name?></span></td>
                                <td><span class="badge badge-info">10</span></td>
                                <td><span class="badge badge-success"><?=count($correct)?></span></td>
                                <td><span class="badge badge-danger"><?=$wrong?></span></td>
                                <td><span class="badge badge-primary"><?=$correct_marks?></span></td></tr>
                            </tbody>
                           </table>
                     </div>   
                    
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
        