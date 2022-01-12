<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Course Subscription</title>
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
    <div class="d-flex align-items-center" >
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto" style="min-width:400px;">
            <div class="text-center mt-5 mb-1">
                <?php if($this->session->flashdata('flashSuccess')) { ?>
                    <div style="width:70%;margin-top: -4%;z-index: 1;margin-left:15%;" class="alert alert-dismissible bg-success text-white border-0 fade show successmsg" role="alert">
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
                <img src="<?php echo base_url('assets/images/logo.jpg');?>" alt="Dhaaji" style="width:250px;height:100px;"/>
            </div>
            <div class="card-header text-center">
                <h4 class="card-title">Subscription</h4>
                <p class="card-subtitle">Subscribe to Access high quality courses</p>
            </div>
            <!-- <form action="<?php echo base_url('subscription/savePlanId');?>" method="post"> -->
                <div class="row card-group-row mb-40pt">
                    <?php foreach($subscribe as $row){ ?>
                        <div class="col-lg-6 col-sm-6 card-group-row__col">
                            <div class="card card-group-row__card text-center o-hidden card--raised navbar-shadow">
                                <div class="card-body d-flex flex-column">
                                    <div class="flex-grow-1 mb-16pt">
                                        <span class="w-64 h-64 icon-holder icon-holder--outline-secondary rounded-circle d-inline-flex mb-16pt">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <h4 class="mb-8pt">Student</h4>
                                        <span class="h4 m-0 font-weight-normal"><?php echo $row->subject; ?></span>
                                       
                                    </div>
                                    <p class="d-flex justify-content-center align-items-center m-0">
                                        <span class="h4 m-0 font-weight-normal">₹</span>
                                        <span class="h1 m-0 font-weight-normal"><?php echo $row->fees; ?></span>
                                        <span class="h4 m-0 font-weight-normal">/ Year</span>
                                    </p>
                                </div>
                                <div class="card-footer">
                                   <!-- <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen"><a href="<?php echo base_url('student_controller/payment_controller/check_out/'.$row->plan_id);?>" style="text-decoration:none;color:#fff;">Subscribe</a></button> --> 

                                     <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen"><a href="<?php echo base_url('razorpay/checkout/'.$row->fee_id.'/'.$std_id);?>" style="text-decoration:none;color:#fff;">Subscribe</a></button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>   
                </div>
            <!-- </form> -->
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?php echo base_url('');?>assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url('');?>assets/vendor/popper.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="<?php echo base_url('');?>assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- MDK -->
    <script src="<?php echo base_url('');?>assets/vendor/dom-factory.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/material-design-kit.js"></script>

    <!-- App JS -->
    <script src="<?php echo base_url('');?>assets/js/app.js"></script>

    <!-- Highlight.js -->
    <script src="<?php echo base_url('');?>assets/js/hljs.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="<?php echo base_url('');?>assets/js/app-settings.js"></script>
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
<style>
    * {
        box-sizing: border-box;
    }

    .columns {
        float: left;
        width: 33.3%;
        padding: 8px;
    }

    .price {
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        -webkit-transition: 0.3s;
        transition: 0.3s;
    }

    .price:hover {
        box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
    }

    .price .header {
        background-color: #111;
        color: white;
        font-size: 25px;
    }

    .price li {
        border-bottom: 1px solid #eee;
        padding: 20px;
        text-align: center;
    }

    .price .grey {
        background-color: #eee;
        font-size: 20px;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
    }

    @media only screen and (max-width: 600px) {
        .columns {
            width: 100%;
        }
    }
</style>