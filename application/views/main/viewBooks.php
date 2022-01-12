
<div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url('assets_1/images/new/aboutbg.jpg')?>">
        <div class="container pt-90 pb-50">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row"> 
                    <div class="col-md-12">
                        <h3 class="title text-white">Books</h3>
                        <ul class="list-inline text-white">
                            <li>Home /</li>
                            <li><span class="text-gray">Book's</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container mt-30 mb-30 p-30">
            <div class="row multi-row-clearfix">
                <div class="col-md-10 col-md-offset-1">
                    <div class="products">
                        <?php foreach($books as $row){ ?>
                            <div class="col-sm-6 col-md-4 col-lg-4 mb-30 column nature">
                            
                                <div class="product pb-0">

                                    <div class="product-thumb"> 
                                        <img alt="" src="<?php echo base_url().'uploads/img/'.$row['book_img'] ?>" class="img-responsive img-fullwidth">
                                        <div class="overlay">
                                            <div class="btn-add-to-cart-wrapper">
                                                <!-- <a class="btn btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="<?php echo base_url('main_controller/main_dashboard/checkout/'.$row['book_id']);?>">Buy Now</a> -->
                                                <a class="btn btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="<?php echo base_url('main_controller/payment/index/'.$row['book_id']);?>">Buy Now</a>
                                            </div>
                                            <div class="btn-product-view-details">
                                                <a class="btn btn-default btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#">View detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-details text-center bg-lighter pt-15 pb-10">
                                        <a href="#"><h5 class="product-title mt-0"><?php echo $row['book_name']; ?></h5> <h6><?php echo $row['standard']; ?> standard</h6></a>

                                        <div class="price"><ins><span class="amount">₹<?php echo $row['book_price']; ?></span></ins></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end main-content -->

</div>

