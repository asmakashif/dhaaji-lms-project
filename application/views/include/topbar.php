<div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
    <div class="mdk-header__content">
        <!-- Navbar -->
        <nav id="default-navbar" class="navbar navbar-expand navbar-dark bg-primary m-0">
            <div class="container-fluid">
                <!-- Toggle sidebar -->
                <button class="navbar-toggler d-block" data-toggle="sidebar" type="button">
                    <span class="material-icons">menu</span>
                </button>
                <!--Brand-->
                <a href="<?php echo base_url('welcome/index');?>"><img src="<?php echo base_url('assets/images/logo1.png');?>" style="width:70px;height:50px;" class="mr-2"></a>
                <span class="d-none d-xs-md-block" style="padding-top:0;padding-bottom: 0;
                font-size:1.2rem;font-weight:500;display:flex;align-items:center;color:white">Dhaaji VSRC</span>
                &nbsp;
                <div class="flex"></div>
                <!-- Menu -->
                <ul class="nav navbar-nav flex-nowrap d-none d-lg-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>" style="color:white">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('student_controller/student_dashboard/get_help');?>" style="color:white">Get Help</a>
                    </li>
                </ul>
                <!-- Menu -->
                <ul class="nav navbar-nav flex-nowrap">
                    <li class="nav-item d-none d-md-flex">
                        <a href="<?php echo base_url('student_controller/student_dashboard/my_cart');?>" class="nav-link" style="color:white">
                            <?php $cart_count = count($this->cart->contents());?>
                            <i class="material-icons">shopping_cart</i><span class="badge badge-notifications badge-danger" id="comparison-count"><?php echo $cart_count; ?></span>
                        </a>
                    </li>
                    <!-- Notifications dropdown -->
                    <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                        <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-dropdown-disable-document-scroll data-caret="false" style="color:white">
                            <i class="material-icons">notifications</i>
                            <span class="badge badge-notifications badge-danger"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div data-perfect-scrollbar class="position-relative">
                                <div class="dropdown-header"><strong>Notifications</strong></div>
                                <?php foreach($notifications as $value) { ?>
                                    <!--$this->load->library('time');-->
                                    <div class="list-group list-group-flush mb-0">
                                        <a href="<?php echo $value['NotificationRedirect'];?>" class="list-group-item list-group-item-action border-left-3 border-left-danger">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-muted">

                                                    </small>
                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-danger">account_circle</i>
                                                    </span>

                                                </span>
                                                <span class="flex d-flex flex-column">

                                                    <span class="text-black-70"><?php echo $value['NotificationContent'];?></span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            
                        </div>
                    </li>
                    <!-- // END Notifications dropdown -->
                    <!-- User dropdown -->
                    <div id="content-desktop">
                        <li class="nav-item dropdown ml-1 ml-md-3">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="<?php echo base_url('assets/images/avatar.png');?>" alt="Avatar" class="rounded-circle" width="40"></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo base_url('student_controller/account_controller/edit_account');?>">
                                    <i class="material-icons">edit</i> Edit Account
                                </a>
                                <!-- <a class="dropdown-item" href="<?php echo base_url('');?>">
                                <i class="material-icons">person</i> Public Profile
                                </a> -->
                                <a class="dropdown-item" href="<?php echo base_url('welcome/logout');?>">
                                    <i class="material-icons">lock</i> Logout
                                </a>
                            </div>
                        </li>
                    </div>
                    
                    <div id="content-mobile">
                        <li class="nav-item dropdown ml-1 ml-md-3">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="<?php echo base_url('assets/images/avatar.png');?>" alt="Avatar" class="rounded-circle" width="40"></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo base_url('welcome/mobilelogout');?>">
                                    <i class="material-icons">lock</i> Logout
                                </a>
                            </div>
                        </li>
                    </div>
                    
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
<style type="text/css">
@media screen and (max-width : 1920px)
{
    #content-desktop {display: block;}
    #content-mobile {display: none;}
}
@media screen and (max-width : 906px)
{
    #content-desktop {display: none;}
    #content-mobile {display: block;}
}

</style>