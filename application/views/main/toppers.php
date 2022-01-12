<div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url('assets_1/images/new/aboutbg.jpg')?>">
        <div class="container pt-100 pb-50"> -->
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row"> 
                    <div class="col-md-12">
                        <h3 class="title text-white">Topper's Corner</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container pt-20 pb-20">
            <h2 class="text-uppercase mt-0">Topper's <span class="text-theme-colored">Corner</span></h2>
            <div class="section-content">
                <div class="card">
                    <ul id="myTab2" class="nav nav-pills boot-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#first" data-toggle="tab">Topper's Interview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#second" data-toggle="tab">Topper's Copy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#third" data-toggle="tab">Our Result</a>
                        </li>
                    </ul>
                    <div class="tab-content card-body">
                        <div class="tab-pane active" id="first">
                            <div class="col-md-2"></div>
                            <div class="row">
                                <?php  
                                foreach($video as $value){
                                ?>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <iframe width="640" height="360" src="<?php echo $value['video_link'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="tab-pane" id="second">
                            <div class="row">
                                <?php  
                                foreach($anscopy as $value){
                                ?>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="holds-the-iframe">
                                            <object width="800px" height="2100px" data="https://docs.google.com/gview?embedded=true&url=<?=base_url('uploads/files/'.$value['file_name'])?>"></object>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="tab-pane" id="third">
                            <div class="row">
                                <?php  
                                foreach($picture as $value){
                                ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-4">
                                        <img src="<?php echo base_url().'uploads/img/'. $value['toppers_img'];?>" style="height:450px;width:750px;">
                                    </div>
                                    <!--<div class="col-md-4">-->
                                    <!--    <h4>Name: <?php echo $value['t_name'];?></h4>-->
                                    <!--    <h5>Rank : <?php echo $value['t_rank'];?></h5>-->
                                    <!--</div>-->
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <style type="text/css">
        .holds-the-iframe 
        {
            background:url(../../assets/images/loader.gif) center center no-repeat;
        }
    </style>