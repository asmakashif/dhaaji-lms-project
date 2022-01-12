<?php
$this->load->helper('date');
?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard');?>">Home</a></li>
                    <li class="breadcrumb-item active">Student Response</li>
                </ol>
                <h1 class="h2">Student Response</h1>
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <h4 class="card-title">Recent Comment</h4>
                            </div>
                        </div>
                    </div>
                    <div class="post-list" id="dataList">
                        <?php  
                        foreach($fetchComment as $value){ 
                            ?>
                            <h4 style="margin-left:20px;"><?php echo $value['comment_title']; ?></h4>
                            <div class="card card-body">
                                <div class="d-flex">
                                    <a href="" class="avatar">
                                        <img src="<?php echo base_url('');?>assets/images/avatar.png" alt="" width="20" class="rounded-circle">
                                    </a>
                                    <div class="flex">
                                        <p class="d-flex align-items-center mb-2">
                                            <a href="" class="text-body mr-2"><strong><?php echo $value['firstname'];?></strong></a>
                                            <small class="text-muted">2 min ago</small>
                                        </p>
                                        <p><?php echo $value['comment_details']; ?></p>
                                        <div class="d-flex align-items-center">
                                            <a href="" class="text-black-50 d-flex align-items-center text-decoration-0 ml-3"><i class="material-icons mr-1" style="font-size: inherit;">thumb_up</i> 130</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer" align="right">
                                    <a href="<?php echo base_url('admin_controller/ResponseController/commentReply/'.$value['comment_id']);?>" class="btn btn-info btn-xs" id="'.$value[comment_id].'"><i class="fa fa-reply"></i></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div> 


                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <h4 class="card-title">Previous Comments</h4>
                            </div>
                        </div>
                    </div>
                    <div class="post-list" id="dataList">
                        <?php if(!empty($posts)){ foreach($posts as $value){ 
                            $comment_id = $value->comment_id;
                            $firstname = $value->firstname;
                            $comment_title = $value->comment_title;
                            $comment_details = $value->comment_details;
                            $commented_date = $value->commented_date;
                        ?>
                        <ul class="list-group list-group-fit">
                            <li class="list-group-item forum-thread">
                                <div class="pt-3">
                                    <div class="d-flex mb-3">
                                        <a href="student-profile.html" class="avatar avatar-xs mr-3">
                                            <img src="<?php echo base_url('');?>assets/images/avatar.png" alt="" width="20" class="rounded-circle">
                                        </a>
                                        <div class="flex">
                                            <a href="<?php echo base_url('admin_controller/ResponseController/commentReply/'.$value->comment_id);?>" class="text-body"><strong><?php echo $value->comment_title; ?></strong></a>
                                            <div class="d-flex align-items-center">
                                                <span class="text-black-50">by&nbsp;<?php echo $value->firstname;?></span>
                                                &nbsp;
                                                &nbsp;
                                                <small class="text-black-50 mr-2">
                                                    <?php
                                                        $dt = DateTime::createFromFormat('Y-m-d H:i:s', $value->commented_date);
                                                        $dd3 = $dt->getTimestamp();
                                                        echo timespan($dd3, '', 2). ' ago';
                                                    ?>
                                                </small>
                                                <a href="<?php echo base_url('admin_controller/ResponseController/commentReply/'.$value->comment_id);?>" class="btn btn-info btn-xs" style="text-decoration: none;"><i class="fa fa-reply"></i></a>
                                            </div>
                                        </div>
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
        <?php $this->load->view('include1/sidebar');?>
