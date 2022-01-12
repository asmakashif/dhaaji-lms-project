<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url('assets_1/images/new/aboutbg.jpg')?>">
        <div class="container pt-100 pb-50"> 
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row"> 
                    <div class="col-md-12">
                        <h3 class="title text-white">Gallery</h3>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- Gallery Grid 3 -->
    <section id="gallery">
        <div class="container-fluid pb-0">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title text-uppercase">Our <span class="text-black font-weight-300">gallery</span></h2> 
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Portfolio Gallery Grid -->
                        <div class="gallery-isotope grid-3 gutter-small clearfix" data-lightbox="gallery">
                            <?php  foreach($img as $value){ ?>
                                <!-- Portfolio Item Start -->
                                <div class="gallery-item p12">
                                    <div class="thumb">
                                        <img src="<?php echo base_url().'uploads/gallery/'. $value['gallery_img'];?>" alt="project" style="position: relative; width:447.656px;height: 377.656px;">
                                    </div>
                                </div> 
                                <!-- Portfolio Item End -->
                            <?php } ?>
                        </div> 
                        <!-- End Portfolio Gallery Grid -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
                                

