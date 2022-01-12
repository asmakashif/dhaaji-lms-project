<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Billing Address</title>
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
            <div class="card navbar-shadow">
                <div class="card-header text-center">
                    <h4 class="card-title">Billing Address</h4>
                    <p class="card-subtitle"></p>
                </div>
                <div class="card card-body">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <?php foreach($billing as $row){ ?>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="text" name="name" readonly="" value="<?php echo $row->name; ?>"  /> 
                                            <div id="errFirst"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="name">Book Name</label> 
                                        <div class="input-group input-group-merge">
                                            <input name="book_id" class="form-control" type="text"  value="<?php echo $row->book_id;?>" readonly="">
                                            <input name="amount" class="form-control" type="text" value="<?php echo $row->amount;?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="name">Mobile Number</label>
                                        <div class="input-group input-group-merge">
                                            <input  name="contact" class="form-control"   value="<?php echo $row->contact;?>" readonly=""/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="email">Email address</label>
                                        <div class="input-group input-group-merge">
                                            <input name="email" class="form-control" type="email" readonly=""value="<?php echo $row->email;?>"/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="password">Address</label>
                                        <div class="input-group input-group-merge">
                                            <textarea name="address"  type="text" value="<?php echo $row->address;?>" class="form-control" readonly=""><?php echo $row->address;?>"</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="password">State</label>
                                        <div class="input-group input-group-merge">
                                            <input name="state" type="text" value="<?php echo $row->state;?>" class="form-control" readonly=""/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="name">City</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" value="<?php echo $row->city;?>" type="text" name="city" readonly=""/>
                                            <div id="errLast"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="name">Zip</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" value="<?php echo $row->zip;?>" name="zip" readonly=""/>
                                            <div id="errLast"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen"><a href="" style="text-decoration:none;color:#fff;">Back</a></button> -->
                                <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen"><a href="<?php echo base_url('main_controller/payment/checkout/'.$row->id.'/'.$row->book_id);?>" style="text-decoration:none;color:#fff;">Proceed</a></button>
                            <!-- </form> -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- jQuery -->
    <script src="<?php echo base_url('');?>assets/vendor/jquery.min.js"></script>
    <script src="<?php echo base_url('');?>assets/js/validate.js"></script>
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