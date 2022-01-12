<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>">Forum</a></li>
                    <li class="breadcrumb-item active">Ask Question</li>
                </ol>

                <h1 class="h2">Ask Question</h1>
                <form action="<?php echo base_url('student_controller/comment_controller/add_comment');?>" method="post">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group m-0" role="group" aria-labelledby="label-question">
                                <div class="form-row align-items-center">
                                    <label id="label-question" for="question" class="col-md-3 col-form-label form-label">Enter Name</label>
                                    <div class="col-md-9">
                                        <input name="firstname" id="email" type="text" placeholder="Enter Name" value="<?php echo $userData['firstname']?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group m-0" role="group" aria-labelledby="label-question">
                                <div class="form-row align-items-center">
                                    <label id="label-question" for="question" class="col-md-3 col-form-label form-label">Question title</label>
                                    <div class="col-md-9">
                                        <input name="comment_title" id="comment_title" type="text" placeholder="Your question ..."  class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group m-0" role="group" aria-labelledby="label-question">
                                <div class="form-row align-items-center">
                                    <label id="label-question" for="question" class="col-md-3 col-form-label form-label">Question details</label>
                                    <div class="col-md-9">
                                        <textarea name="comment_details" id="comment_details" placeholder="Describe your question in detail ..." rows="4" class="form-control" required/></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group m-0" role="group" aria-labelledby="label-question">
                                <div class="form-row align-items-center">
                                    <div class="col-md-9">
                                        <?php  $timezone = new DateTimeZone("Asia/Kolkata" );
                                        $date = new DateTime();
                                        $date->setTimezone($timezone );
                                        $dtobj = $date->format('Y-m-d'); 
                                        ?>
                                        <input readonly="" class="form-control" value="<?php echo $dtobj ?>" type="hidden" name="commented_date" style="color:black;">
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group m-0" role="group" aria-labelledby="label-question">
                                <div class="form-row align-items-center">
                                    <div class="col-md-9">
                                        <input type="hidden" name="comment_id" id="comment_id" value="0" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <button type="submit" value="post" class="btn btn-success">Post Question</button>
                                <button type="cancel" value="cancel" class="btn btn-warning"><a href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>" style="text-decoration:none;color:white;">Cancel</a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>