<!-- Header -->
        <header id="header" class="header">
            <div class="header-top bg-blue-111 sm-text-center p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget no-border m-0">
                                <ul class="list-inline xs-text-center text-white mt-5">
                                    <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-theme-colored"></i> 9632411913 | 7349516911</a> </li>
                                    <!-- <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i>www.dhajionline.com</li> -->
                                    <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-envelope-o text-theme-colored"></i> info@dhajionline.com</a> 
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4">
                        </div>

                        <div class="col-md-2">
                            <a class="btn btn-border btn-transparent btn-circled btn-sm"  href="<?php echo base_url('user_controller/login');?>">Log In</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav">
                <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
                    <div class="container">
                        <nav id="menuzord-right" class="menuzord">
                            <a class="menuzord-brand pull-left flip" href="javascript:void(0)">
                                <img src="<?php echo base_url('assets_1/');?>images/logo.jpg" alt="" style="width:180px;height:180px;">
                            </a>
                            <ul class="menuzord-menu">
                                <li class="active"><a href="<?php echo base_url ('welcome/index')?>">Home</a></li>

                                <li><a href="#">Course</a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo base_url ('main_controller/main_dashboard/course')?>">Course</a></li>
                                        <li><a href="<?php echo base_url ('main_controller/main_dashboard/fees')?>">Fees</a></li>
                                    </ul>
                                </li>

                                <li><a href="#">Toppers Corner</a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo base_url ('main_controller/main_dashboard/toppers')?>">Topper's Corner</a></li>
                                        <li><a href="<?php echo base_url ('main_controller/main_dashboard/examination')?>">Examination</a></li>
                                        <li><a href="<?php echo base_url ('main_controller/main_dashboard/strategy')?>">Strategy</a></li>
                                    </ul>
                                </li>  


                                <li><a href="<?php echo base_url ('main_controller/main_dashboard/upload_answer_sheet')?>">Upload Answer Sheet </a>
                                </li> 

                                <li><a href="<?php echo base_url ('main_controller/main_dashboard/gallery')?>">Gallery</a></li>

                                <li><a href="<?php echo base_url ('main_controller/main_dashboard/notification')?>">Notification</a></li>
                                <li><a href="<?php echo base_url ('main_controller/main_dashboard/books')?>">Books</a></li>
                                <li><a href="#">About Us</a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo base_url('main_controller/main_dashboard/about');?>">About</a></li>
                                        <!-- <li><a href="faculty.php">Faculty</a></li> -->
                                        
                                        <li><a href="<?php echo base_url ('main_controller/main_dashboard/infrastructure')?>">Infrastructure</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url ('main_controller/main_dashboard/contact')?>">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>  