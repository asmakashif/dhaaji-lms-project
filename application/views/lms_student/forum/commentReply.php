<?php
// echo "<pre>";
// print_r($Question_Data);
// echo "</pre>";
// die();
$this->load->helper('date');
?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>">Forum</a></li>
                    <li class="breadcrumb-item active">Reply</li>
                </ol>

                <h1 class="h2">Reply</h1>
                <form action="<?php echo base_url('student_controller/comment_controller/saveCommentReply');?>" method="post">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group m-0" role="group" aria-labelledby="label-question">
                                <div class="form-row align-items-center">
                                    <!-- <label id="label-question" for="question" class="col-md-3 col-form-label form-label">Name</label> -->
                                    <div class="col-md-9">
                                        <input name="username" id="email" type="hidden" placeholder="Enter Name" readonly="" value="<?php echo $userData['firstname']?>" class="form-control">
                                        <input name="comment_id" type="hidden" value="<?php echo $data_info->comment_id; ?>">
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group m-0" role="group" aria-labelledby="label-question">
                                <div class="form-row align-items-center">
                                    <label id="label-question" for="question" class="col-md-3 col-form-label form-label">Comment Title</label>
                                    <div class="col-md-9">
                                        <input name="comment_title" id="email" type="text"readonly="" value="<?php echo $data_info->comment_title; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group m-0" role="group" aria-labelledby="label-question">
                                <div class="form-row align-items-center">
                                    <label id="label-question" for="question" class="col-md-3 col-form-label form-label">Comment</label>
                                    <div class="col-md-9">
                                        <!-- <input name="answer" id="answer" placeholder="Type your reply to <?php echo $data_info->firstname;?>...." type="text" class="form-control"> -->
                                        <textarea name="answer" id="answer" placeholder="Type your reply to <?php echo $data_info->firstname;?>...." rows="4" class="form-control" required/></textarea> 
                                    </div>
                                </div>
                            </div>
                            <div id='submit' class="list-group-item">
                                <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen">Submit</button>
                                <button type="cancel" value="cancel" class="btn btn-warning"><a href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>" style="text-decoration:none;color:white;">Cancel</a></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <h4 class="card-title">Question Asked</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="flex">
                                <br><p style="font-size:1.5em;"><?php echo $data_info->comment_title; ?></p><hr>
                                <p><?php echo $data_info->comment_details; ?></p><hr>
                                <div class="info">
                                    <div class="post-info">
                                        <span style="font-size:1.3em;">Posted By : <img src="<?php echo base_url('');?>assets/images/avatar.png" alt="" width="20" class="rounded-circle"><span class="text-black-50">&nbsp;<?php echo $data_info->firstname;?></span></span>
                                        <span style="float:right;font-size:1.2em;">
                                            <?php
                                                $dt = DateTime::createFromFormat('Y-m-d H:i:s', $data_info->commented_date);
                                                $dd3 = $dt->getTimestamp();
                                                echo timespan($dd3, '', 2). ' ago';
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <h4 class="card-title">Replied Answer</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php foreach ($reply_data as $rd) { ?>
                            <div class="d-flex mb-3">
                                <div class="flex">
                                    <div class="img" style="font-size:1.5em;"><img src="<?php echo base_url('');?>assets/images/avatar.png" alt="" width="40" class="rounded-circle">&nbsp;<?php echo $rd->username;?></div>
                                    <span style="margin-left:40px;">
                                        <?php
                                            $dt = DateTime::createFromFormat('Y-m-d H:i:s', $rd->comment_reply_date);
                                            $dd3 = $dt->getTimestamp();
                                            echo timespan($dd3, '', 2). ' ago';
                                        ?>
                                    </span>
                                    <p style="margin-left:40px;margin-top:20px;"><?php echo $rd->answer;?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>