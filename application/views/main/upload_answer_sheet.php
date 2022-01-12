<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from html.kodesolution.live/h/martialarts/v2.0/demo/form-job-apply-style3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Oct 2019 13:28:34 GMT -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>

    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>

    <meta name="description" content="Dhaaji vedic science research center" />
    <meta name="keywords" content="online class , school sudents and neet, iit, ias, ips coaching center" />
    <meta name="author" content="" />

    <!-- Page Title -->
    <title>Dhaaji Vedic Science Research Center</title>

    <!-- Favicon and Touch Icons -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.jpg');?>" />
    <link href="<?php echo base_url('assets_1/');?>images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="<?php echo base_url('assets_1/');?>images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="<?php echo base_url('assets_1/');?>images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="<?php echo base_url('assets_1/');?>images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="<?php echo base_url('assets_1/');?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets_1/');?>css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets_1/');?>css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets_1/');?>css/css-plugin-collections.css" rel="stylesheet"/>
    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="<?php echo base_url('assets_1/');?>css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="<?php echo base_url('assets_1/');?>css/style-main.css" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="<?php echo base_url('assets_1/');?>css/preloader.css" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="<?php echo base_url('assets_1/');?>css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="<?php echo base_url('assets_1/');?>css/responsive.css" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <!-- CSS | Theme Color -->
    <link href="<?php echo base_url('assets_1/');?>css/colors/theme-skin-yellow.css" rel="stylesheet" type="text/css">

    <!-- external javascripts -->
    <script src="<?php echo base_url('assets_1/');?>js/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url('assets_1/');?>js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url('assets_1/');?>js/bootstrap.min.js"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="<?php echo base_url('assets_1/');?>js/jquery-plugin-collection.js"></script>
</head>
<body class="">
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        <div id="preloader">
            <div id="spinner">
                <img src="<?php echo base_url('assets_1/');?>images/preloader.gif" alt="">
            </div>

        </div> 

        <!-- Start main-content -->
        <div class="main-content">
            <!-- Section: home -->
            <section id="home" class="divider bg-lighter">
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-md-push-3">
                                    <div class="text-center mb-60"><a href="#" class=""><img alt="" src="<?php echo base_url('assets_1/');?>images/logo-wide-white.png"></a></div>
                                    <div class="bg-lightest border-1px p-30 mb-0">
                                        <h3 class="text-theme-colored mt-0 pt-5"> Upload Your Mock test Sheet</h3>
                                        <form action="<?php echo site_url('main_controller/UploadTest/submitTestPapers');?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Name <small>*</small></label>
                                                        <input readonly="" name="firstname" class="form-control" value="<?php echo $userData['firstname']?>" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email <small>*</small></label>
                                                        <input readonly=""  name="email" class="form-control" value="<?php echo $userData['email']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Class <small>*</small></label>
                                                        <select name="grade" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                                            <option value="">Select Grade</option>
                                                            <?php foreach ($grade as $res) { ?>
                                                                <option <?php echo $grade == $res->id ? 'selected="selected"' : '' ?> value="<?php echo $res->class_name;?>"><?php echo $res->class_name;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Subject <small>*</small></label>
                                                        <select name="subject" class="form-control required">
                                                            <option value="Science">Science</option>
                                                            <option value="Environmental Science">Environmental Science</option>
                                                            <option value="Social Science">Social Science</option>
                                                            <option value="Physics">Physics</option>
                                                            <option value="Chemistry">Chemistry</option>
                                                            <option value="Botany">Botany</option>
                                                            <option value="Mathematics">Mathematics</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Answer Sheet Upload</label>
                                                        <input type="file" name="download_file" class="form-control" accept=".doc,.docx,.pdf"/>
                                                        <small>Maximum upload file size: 12 MB</small>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                                                <button type="button" class="btn btn-warning btn-sm mt-20 pt-10 pb-10" onclick="windows:location.href='http://localhost/dhaji_lms/'">Cancel</button>
                                                <button type="submit" class="btn btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Upload Now</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
        </div>  
        <!-- end main-content -->

        <!-- Footer -->
        <footer id="footer" class="footer bg-black-222">
            <div class="container p-20">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="font-11 text-black-777 m-0">Copyright &copy;<?php echo date("Y");?>. All Rights Reserved by <a href="https://ntranz.com/">Tranz Networkz</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>

    <script src="<?php echo base_url('assets_1/');?>js/custom.js"></script>

</body>


</html>