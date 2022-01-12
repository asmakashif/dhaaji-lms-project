<?php
// echo "<pre>";
// print_r($Question_Data);
// echo "</pre>";
// die();
$this->load->helper('date');
?>
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script>
    function searchFilter(page_num){
        page_num = page_num?page_num:0;
        var keywords = $('#keywords').val();
        var sortBy = $('#sortBy').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('student_controller/comment_controller/ajaxPaginationData/'); ?>'+page_num,
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
</script>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                    <li class="breadcrumb-item active">Search Course</li>
                </ol>
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="h2 flex mr-3 mb-0">Forum</h1>
                            <a href="<?php echo base_url('student_controller/comment_controller/index');?>" class="btn btn-success">Ask a Question</a>
                        </div>
                        <!-- Search -->
                        <div class="flex search-form form-control-rounded search-form--light mb-2">
                            <input type="text" id="keywords" class="form-control" placeholder="Search by title" onkeyup="searchFilter();">
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="card-title">Comments</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="post-list" id="dataList">
                                <?php if(!empty($posts)){ foreach($posts as $value){ 
                                    $comment_id = $value['comment_id'];
                                    $firstname = $value['firstname'];
                                    $comment_title = $value['comment_title'];
                                    $comment_details = $value['comment_details'];
                                    $commented_date = $value['commented_date'];
                                    ?>
                                    <ul class="list-group list-group-fit">
                                        <li class="list-group-item forum-thread">
                                            <div class="pt-3">
                                                <div class="d-flex mb-3">
                                                    <a href="student-profile.html" class="avatar avatar-xs mr-3">
                                                        <img src="<?php echo base_url('');?>assets/images/avatar.png" alt="" width="20" class="rounded-circle">
                                                    </a>
                                                    <div class="flex">
                                                        <a href="<?php echo base_url('student_controller/comment_controller/commentReply/'.$value['comment_id']);?>" class="text-body"><strong><?php echo $value['comment_title']; ?></strong></a>
                                                        <div class="d-flex align-items-center">
                                                            <span class="text-black-50">by&nbsp;<?php echo $value['firstname'];?></span>
                                                            &nbsp;
                                                            &nbsp;
                                                            <!-- <a href="" class="text-black-50"><i class="fa fa-thumbs-up"></i></a>
                                                            &nbsp;
                                                            &nbsp;
                                                            <a href="" class="text-black-50"><i class="fa fa-thumbs-down"></i></a>
                                                            &nbsp;
                                                            &nbsp;
                                                            <a href="" class="text-black-50"><i class="fa fa-comment"></i></a>
                                                            &nbsp;
                                                            &nbsp; -->
                                                            <small class="text-black-50 mr-2">
                                                                <?php
                                                                    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $value['commented_date']);
                                                                    $dd3 = $dt->getTimestamp();
                                                                    echo timespan($dd3, '', 2). ' ago';
                                                                ?>
                                                            </small>
                                                            <a href="<?php echo base_url('student_controller/comment_controller/commentReply/'.$value['comment_id']);?>" class="btn btn-info btn-xs" style="text-decoration: none;"><i class="fa fa-reply"></i></a>
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
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
