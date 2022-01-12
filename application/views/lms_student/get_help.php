
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item active">Help Center</li>
                </ol>
                <div class="media mb-headings align-items-center">
                    <div class="media-body">
                        <h1 class="h2">Help center</h1>
                    </div>
                </div>
                <div class="card-columns">
                    <?php foreach($get_ques as $row){?>
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="flex">
                                    <h4 class="card-title"><?php echo $row->title_body?></h4>
                                </div>
                                <i class="material-icons text-muted">info_outline</i>
                            </div>
                            <ul class="list-group list-group-fit">
                                <li class="list-group-item" style="text-align: justify;text-justify: inter-word;">
                                    <!-- <a href="" class="text-body"><i class="material-icons float-right text-muted">trending_flat</i>  --><span><?php echo $row->title_content?></span>
                                </li>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php $this->load->view('include/sidebar')?>