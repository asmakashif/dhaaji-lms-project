<!DOCTYPE html>
<html lang="en" dir="ltr">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dhaji Vedic Science Research Center</title>
    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">
    <!-- Perfect Scrollbar -->
    <link type="text/css" href="<?php echo base_url('');?>assets/vendor/perfect-scrollbar.css" rel="stylesheet">
    <!-- Material Design Icons -->
    <link type="text/css" href="<?php echo base_url('');?>assets/css/material-icons.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('');?>assets/css/material-icons.rtl.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link type="text/css" href="<?php echo base_url('');?>assets/css/fontawesome.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('');?>assets/css/fontawesome.rtl.css" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="<?php echo base_url('');?>assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('');?>assets/css/app.rtl.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.jpg');?>" />
</head>
<body class=" layout-fluid">
    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <!-- Header -->
        <div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
            <div class="mdk-header__content">
                <!-- Navbar -->
                <nav id="default-navbar" class="navbar navbar-expand navbar-dark bg-primary m-0">
                    <div class="container-fluid">
                        <!-- Toggle sidebar -->
                        <button class="navbar-toggler d-block" data-toggle="sidebar" type="button">
                            <span class="material-icons">menu</span>
                        </button>

                        <!-- Brand -->
                        <a href="<?php echo base_url('welcome/index');?>"><img src="<?php echo base_url('assets/images/logo1.png');?>" style="width:70px;height:50px;" class="mr-2"></a>
                        <span class="d-none d-xs-md-block" style="padding-top:0;padding-bottom: 0;
                        font-size:1.2rem;font-weight:500;display:flex;align-items:center;color:white">Dhaaji VSRC</span>
                        <div class="flex"></div>
                        <!-- Menu -->
                        <ul class="nav navbar-nav flex-nowrap d-none d-lg-flex">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('admin_controller/ResponseController/students_response');?>" style="color:white">Forum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('admin_controller/admin_dashboard/help_center');?>" style="color:white" >Help Center</a>
                            </li>
                        </ul>
                        <!-- Menu -->
                        <ul class="nav navbar-nav flex-nowrap">
                            <!-- Notifications dropdown -->
                            <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                                <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-dropdown-disable-document-scroll data-caret="false" style="color:white">
                                    <i class="material-icons">notifications</i>
                                    <span class="badge badge-notifications badge-danger"></span>
                                </button>
                            </li>
                            <!-- // END Notifications dropdown -->
                            <!-- User dropdown -->
                            <li class="nav-item dropdown ml-1 ml-md-3">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="<?php echo base_url('assets/images/avatar.png');?>" alt="Avatar" class="rounded-circle" width="40"></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo base_url('welcome/logout');?>">
                                        <i class="material-icons">lock</i> Logout
                                    </a>
                                </div>
                            </li>
                            <!-- // END User dropdown -->
                        </ul>
                        <!-- // END Menu -->
                    </div>
                </nav>
                <!-- // END Navbar -->
                <?php if($this->session->flashdata('flashSuccess')) { ?>
                    <div style="width: 30%;margin-top: -4%;z-index: 1;margin-left: 35%;" class="alert alert-dismissible bg-success text-white border-0 fade show successmsg" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $this->session->flashdata("flashSuccess"); ?>
                    </div>
                <?php } ?> 
                <?php if($this->session->flashdata('flashError')) { ?>
                    <div style="width: 30%;margin-top: -4%;z-index: 1;margin-left: 35%;" class="alert alert-dismissible bg-danger text-white border-0 fade show errormsg" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $this->session->flashdata("flashError"); ?>
                    </div>
                <?php } ?>   
            </div>
        </div>
        <!-- // END Header -->
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
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">
            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">
                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                            <li class="breadcrumb-item active">Review Activity</li>
                        </ol>
                        <h1 class="h2">Student Activity</h1>
                        <p class="card-subtitle"><a href="<?php echo base_url('admin_controller/admin_dashboard/student_information');?>" style="text-decoration:none;">Click to find student id</a></p>
                        <div class="search-form search-form--light mb-3">    
                            <input type="text" id="sid" class="form-control search" placeholder="Search with Student id" onKeyup="search()">
                            <button class="btn" type="button" role="button" ><i class="material-icons">search</i></button>
                        </div>
                        <?php //echo $courses ;?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <!-- <div class="h2 mb-0 mr-3 text-primary">116</div> -->
                                        <div class="flex">
                                            <h4 class="card-title">Popular Topics</h4>
                                            <p class="card-subtitle">Best score</p>
                                        </div>
                                        <!-- <div class="dropdown">
                                            <a href="#" class="dropdown-toggle text-black-70" data-toggle="dropdown">Subjects</a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item">Subjects</a>
                                                <a href="" class="dropdown-item">Mathematics</a>
                                                <a href="" class="dropdown-item">Physics</a>
                                                <a href="" class="dropdown-item">Chemistry</a>
                                                <a href="" class="dropdown-item">Biology</a>

                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="chart" style="height: 319px;">
                                            <canvas id="topicIqChart" class="chart-canvas"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <!-- <div class="h2 mb-0 mr-3 text-primary">432</div> -->
                                        <div class="flex">
                                            <h4 class="card-title">Time Spent Learning</h4>
                                            <p class="card-subtitle">4 days streak this week</p>
                                        </div>
                                        <i class="material-icons text-muted ml-2">trending_up</i>
                                    </div>
                                    <div class="card-body ">
                                        <div class="chart" >
                                            <canvas id="iqChart" class="chart-canvas"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mdk-drawer js-mdk-drawer" id="default-drawer"> 
            <div class="mdk-drawer__content ">
                <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
                    <div class="sidebar-p-y">
                        <div class="sidebar-heading">ADMIN</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/index')?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i> Admin
                                </a>
                            </li>
                        </ul>

                        <!-- Site Administration -->
                        <div class="sidebar-heading">Site Administration</div>
                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" data-toggle="collapse" href="#board_menu">
                                    Course Setup
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="board_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/setup_board')?>">
                                            <span class="sidebar-menu-text">Board</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/setup_class');?>">
                                            <span class="sidebar-menu-text">Class  </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/setup_course');?>">
                                            <span class="sidebar-menu-text"> Course </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/setup_chapters');?>">
                                            <span class="sidebar-menu-text"> Chapters</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/setup_sections');?>">
                                            <span class="sidebar-menu-text">Sections</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--Book Stores Management-->
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button " data-toggle="collapse" href="#book_management">Books Store
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="book_management">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/books');?>">
                                            <span class="sidebar-menu-text"> Books</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/current_orders');?>">
                                            <span class="sidebar-menu-text">Current Order's</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#site-administration">Fees
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse show" id="site-administration">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/set_up_fees')?>">
                                            <span class="sidebar-menu-text">Setup Fees</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/collect_fees')?>">
                                            <span class="sidebar-menu-text">Collect Fees</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/issue_refund')?>">
                                            <span class="sidebar-menu-text">Issue Refunds</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>

                        <div class="sidebar-heading">Evaluation</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/files/index')?>">
                                    Review Answer Papers
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/ResponseController/students_response')?>">
                                    Response
                                </a>
                            </li>
                        </ul>

                        <div class="sidebar-heading">Student Administration</div>
                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#student">Student Management 
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="student">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/student_management/add_approve');?>">
                                            <span class="sidebar-menu-text">Add/Approve </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/student_management/activate_deactivate');?>">
                                            <span class="sidebar-menu-text">Activate/De-active </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#fees">Finance
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="fees">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/payment_history/index');?>">
                                            <span class="sidebar-menu-text">Payment History</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button " href="<?php echo base_url('admin_controller/admin_dashboard/review_activity');?>">
                                    Review Activity
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button " href="<?php echo base_url('admin_controller/admin_dashboard/student_information');?>">
                                    Student Information
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button " href="<?php echo base_url('admin_controller/admin_dashboard/message_board');?>">
                                    Message Board
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-heading">Examination</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/examination/view_quiz')?>">
                                   MCQ
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/examination/index')?>">
                                   Historical/Mock Test Paper
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-heading">Topper's Corner</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/upload_videos')?>">
                                    Upload Videos
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/answer_copy')?>">
                                    Upload Answer Copy
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/toppers_picture')?>">
                                   Upload Topper's Picture
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            </div>
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

    <!-- Global Settings -->
    <script src="<?php echo base_url('');?>assets/js/settings.js"></script>

    <!-- Moment.js -->
    <script src="<?php echo base_url('');?>assets/vendor/moment.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/moment-range.min.js"></script>

    <!-- Chart.js -->
    <script src="<?php echo base_url('');?>assets/vendor/Chart.min.js"></script>

    <!-- UI Charts Page JS -->
    <script src="<?php echo base_url('');?>assets/js/chartjs-rounded-bar.js"></script>
    <script src="<?php echo base_url('');?>assets/js/chartjs.js"></script>
    <!-- Chart.js Samples -->
    <script>
   
    </script>
   
    <script>
     IQchartdata('','');
    Weekchartdata('','');
    function search(){
        var sid =$("#sid").val();
        var baseurl ="<?php echo base_url('');?>";        
        $.ajax({
            type: "POST",
            url: baseurl+"admin_controller/Admin_dashboard/getPoints",
            data: {sid:sid},
            success: function (response) {
                           //console.log(response);                             
                 var rep= JSON.parse(response);
                console.log(rep);
                var s=rep.pd;
                var wk = rep.wd;
                 IQchartdata(sid,s);
                 Weekchartdata(sid,wk);
            },error:function(x){
                console.log(x);
            }
        });
    }
   
    function IQchartdata(sid,s){
        // console.log(values);
        Chart.defaults.global.responsive=true;
        new Chart(document.getElementById("topicIqChart"),
            {
                "type":"radar",
                "responsive":true,
                "data":
                {
                "labels":<?php echo $courses;?>,
                "datasets":[
                    {
                    "label":"Student ID "+ sid + " Score ",
                    "data":s,
                    "fill":true,
                    "backgroundColor":"rgba(255, 99, 132, 0.2)",
                    "borderColor":"rgb(255, 99, 132)",
                    "pointBackgroundColor":"rgb(255, 99, 132)",
                    "pointBorderColor":"#fff",
                    "pointHoverBackgroundColor":"#fff",
                    "pointHoverBorderColor":"rgb(255, 99, 132)"
                    }
                    ]
                },
                    "options":
                    {
                        "elements":
                            {
                                "line":
                                {
                                    "tension":0,
                                    "borderWidth":5
                                }
                            }
                    }
            });

    }


    function Weekchartdata(sid,s){
        // console.log(values);
        
        new Chart(document.getElementById("iqChart"),
            {
                "type":"line",
                "responsive":true,
                "data":
                {
                    "labels":["Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday"],
                "datasets":[
                    {
                    "label":"Student ID "+ sid+" Time Spent in Minutes",
                    "data":s,
                    "fill":true,
                    "backgroundColor":"rgba(255, 99, 132, 0.2)",
                    "borderColor":"rgb(255, 99, 132)",
                    "pointBackgroundColor":"rgb(255, 99, 132)",
                    "pointBorderColor":"#fff",
                    "pointHoverBackgroundColor":"#fff",
                    "pointHoverBorderColor":"rgb(255, 99, 132)"
                    }
                    ]
                },
                    "options":
                    {
                        "elements":
                            {
                                "line":
                                {
                                    "tension":0,
                                    "borderWidth":3
                                }
                            }
                    }
            });
    }
    </script>
</body>
</html>
