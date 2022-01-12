<!-- <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script>
    function searchFilter(page_num){
        page_num = page_num?page_num:0;
        var keywords = $('#keywords').val();
        var sortBy = $('#sortBy').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('student_controller/search_course/ajaxPaginationData/'); ?>'+page_num,
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
</script> -->

<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item active">Courses</li>
                </ol>
<?php if($this->session->userdata('plan_name') =='Full Course'){ ?>
                    <h1 class="h2">Courses</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="card-body">
                                        <div class="media-right">
                                            <span style="font-size: 1.5em;">Click to view curriculum courses &nbsp;<a class="btn btn-lg btn-success" href="<?php echo base_url('shopping/curriculum_courses');?>" style="background-color:#a1cf17;border-color:#a1cf17">Curriculum Courses</a></span>
                                            
                                        </div>
                                        <br>
                                        <br>
                                        <div class="media-right">
                                            <span style="font-size: 1.5em;">Click to view extra courses &nbsp;<a class="btn btn-lg btn-success" href="<?php echo base_url('shopping/extra_courses');?>" style="background-color:#a1cf17;border-color:#a1cf17">Extra Courses</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else{ ?>
                    <h1 class="h2">Courses</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="card-body">
                                        <div class="media-right">
                                            <span style="font-size: 1.5em;">Click to view curriculum courses &nbsp;<a class="btn btn-lg btn-success" href="<?php echo base_url('shopping/curriculum_courses');?>" style="background-color:#a1cf17;border-color:#a1cf17">Curriculum Courses</a></span>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
        