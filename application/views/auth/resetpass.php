<!DOCTYPE html>
<html lang="en" dir="ltr">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">
    <!-- Perfect Scrollbar -->
    <link type="text/css" href="<?php echo base_url('assets/vendor/perfect-scrollbar.css');?>" rel="stylesheet">
    <!-- Material Design Icons -->
    <link type="text/css" href="<?php echo base_url('assets/css/material-icons.css');?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('assets/css/material-icons.rtl.css');?>" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link type="text/css" href="<?php echo base_url('assets/css/fontawesome.css');?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('assets/css/fontawesome.rtl.css');?>" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="<?php echo base_url('assets/css/app.css');?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('assets/css/app.rtl.css');?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.jpg');?>" />
</head>

<body class="login">
    <div class="d-flex align-items-center" style="min-height: 100vh">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
            <div class="text-center mt-5 mb-1">
                <?php if($this->session->flashdata('flashSuccess')) { ?>
                    <div style="width:90%;margin-top: -4%;z-index: 1;margin-left: 35%;" class="alert alert-dismissible bg-success text-white border-0 fade show successmsg" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $this->session->flashdata("flashSuccess"); ?>
                    </div>
                <?php } ?> 
                <?php if($this->session->flashdata('flashError')) { ?>
                    <div style="width:70%;margin-top: -4%;z-index: 1;margin-left:15%;" class="alert alert-dismissible bg-danger text-white border-0 fade show errormsg" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $this->session->flashdata("flashError"); ?>
                    </div>
                <?php } ?>
                <img src="<?php echo base_url('assets/images/logo.jpg');?>" alt="LearnPlus" style="width:250px;height:100px;"/>
            </div>
            &nbsp;
            <div id="content-desktop">
                <div class="card navbar-shadow">
                    <div class="card-header text-center">
                        <h4 class="card-title">Reset Your Password</h4>
                        <p class="card-subtitle"></p>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('user_controller/updatepass');?>" method="post">
                            <div class="form-group">
                                <label class="form-label" for="password">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input name="password"  type="password" id="txtPassword" title="Password must contain: Minimum 8 characters atleast 1 Alphabet and 1 Number" class="form-control" placeholder="Enter Password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" />
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fa fa-key"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="password">Confirm New Password</label>
                                <div class="input-group input-group-merge">
                                    <input name="cpassword" type="password" id="txtConfirmPassword" class="form-control" placeholder="Confirm Password" />
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fa fa-key"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <input name="submit" type="submit" class="btn btn-success" value="Update password">
                            </div>
                            <div style="text-align:center;">
                                <div style=" margin-right:50px; display: inline;"><a href="<?php echo site_url('welcome/index');?>" class="NrmLnk">Go Back</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendor/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('');?>assets/js/validate.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendor/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap.min.js');?>"></script>
    <!-- Perfect Scrollbar -->
    <script src="<?php echo base_url('assets/vendor/perfect-scrollbar.min.js');?>"></script>
    <!-- MDK -->
    <script src="<?php echo base_url('assets/vendor/dom-factory.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/material-design-kit.js');?>"></script>
    <!-- App JS -->
    <script src="<?php echo base_url('assets/js/app.js');?>"></script>
    <!-- Highlight.js -->
    <script src="<?php echo base_url('assets/js/hljs.js');?>"></script>
    <!-- App Settings (safe to remove) -->
    <script src="<?php echo base_url('assets/js/app-settings.js');?>"></script>
</body>
</html>
<!--//Satarts fluesh message  -->
<?php if($this->session->flashdata('flashSuccess')) { ?>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".successmsg").fadeTo(1000, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000);
    </script>
<?php } ?>  
<?php if($this->session->flashdata('flashError')) { ?>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".errormsg").fadeTo(900, 0).slideUp(800, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
<?php } ?> 
