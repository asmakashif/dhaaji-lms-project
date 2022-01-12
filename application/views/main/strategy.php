<div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url('assets_1/images/new/aboutbg.jpg')?>">
        <div class="container pt-100 pb-50"> -->
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row"> 
                    <div class="col-md-12">
                        <h3 class="title text-white">Strategy</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container pt-20 pb-20">
            <h2 class="text-uppercase mt-0">Strategy<span class="text-theme-colored"></span></h2>
            <div class="section-content">
                <div class="card">
                    <ul id="myTab2" class="nav nav-pills boot-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#first" data-toggle="tab">Topper's View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#second" data-toggle="tab">Subject-wise View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#third" data-toggle="tab">Answer Writting</a>
                        </li>
                    </ul>
                    <div class="tab-content card-body">
                        <div class="tab-pane active" id="first">
                            <div class="col-md-2"></div>
                            <div class="row">
                                <?php  
                                foreach($toppersview as $value){
                                ?>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <iframe width="640" height="360" src="<?php echo $value['videolink'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="tab-pane" id="second">
                            <div class="row">
                                <?php  
                                foreach($sub as $value){
                                ?>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <iframe width="640" height="360" src="<?php echo $value['videolink'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="tab-pane" id="third">
                            <div class="row">
                                <?php  
                                foreach($ans as $value){
                                ?>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <iframe width="640" height="360" src="<?php echo $value['videolink'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
</div>
