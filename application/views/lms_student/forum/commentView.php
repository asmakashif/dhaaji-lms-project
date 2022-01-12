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
                        <div class="flex search-form form-control-rounded search-form--light mb-2" style="min-width: 200px;">
                            <form class="post-search-panel">
                                <input type="text" id="keywords" class="form-control" placeholder="Search Comment" onkeyup="searchFilter();">
                            </form>
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
                                                        <a href="fixed-student-profile.html" class="text-body"><strong><?php echo $value['comment_title']; ?></strong></a>
                                                    </div>
                                                    <div class="panel-header" align="right">
                                                        <small>By <?php echo $value['firstname']; ?>  On </small>
                                                        <small class="ml-auto text-muted"><?php echo date('d-m-Y', strtotime($value['commented_date'])); ?> </small>
                                                    </div>
                                                    <a class="text-black-70" href="fixed-student-forum-thread.html"><?php echo $value['comment_details']; ?> </a>
                                                    <div class="panel-footer" align="right">
                                                        <a href="<?php echo base_url('student_controller/comment_controller/commentReply/'.$value['comment_id']);?>" class="btn btn-info btn-xs" id="'.$value[comment_id].'"><i class="fa fa-reply"></i></a>
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
