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