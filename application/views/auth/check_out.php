<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Payment Method</title>
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
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="min-width:400px;">
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
                <h4 class="card-title">Payment Method</h4>
                <!-- <p class="card-subtitle">Subscribe to Access high quality courses</p> -->
            </div>
            <div class="card">
                <form action="<?php echo base_url('student_controller/payment_controller/save_card');?>" method="post">
                    <div class="list-group list-group-fit">
                        <div class="list-group-item">
                            <fieldset role="group" aria-labelledby="label-type" class="m-0 form-group">
                                <div class="form-row">
                                    <label for="payment_cc" id="label-type" class="col-md-3 col-form-label form-label">Payment type</label>
                                    <div role="group" aria-labelledby="label-type" class="col-md-9">
                                        <div role="group" class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-outline-secondary active">
                                                <input type="radio" id="payment_cc" name="payment_type" value="cc" checked="" aria-checked="true" /> Debit or credit card
                                            </label>
                                            <label class="btn btn-outline-secondary">
                                                <input type="radio" id="payment_pp" name="payment_type" value="pp" aria-checked="true" /> PayPal
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="list-group-item">
                            <div role="group" aria-labelledby="label-cc" class="m-0 form-group">
                                <div class="form-row">
                                    <label id="label-cc" for="cc" class="col-md-3 col-form-label form-label">Card number</label>
                                    <div class="col-md-9">
                                        <input id="cc" name="card_number" type="text" placeholder="Credit / debit card number" class="form-control">
                                        <input name="plan_id" type="hidden" value="<?php echo $data_info->plan_id; ?>">
                                        <input name="plan_amount" type="hidden" value="<?php echo $data_info->plan_amount; ?>">
                                        <input name="plan_name" type="hidden" value="<?php echo $data_info->plan_name; ?>">
                                        <!-- <input name="std_id" type="hidden" value="<?php echo $std_id; ?>"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div role="group" aria-labelledby="label-cvv" class="m-0 form-group">
                                <div class="form-row">
                                    <label id="label-cvv" for="cvv" class="col-md-3 col-form-label form-label">Security code (CVV)</label>
                                    <div class="col-md-9">
                                        <input id="cvv" name="cvv" type="text" placeholder="CVV" class="form-control" style="width: 100px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div role="group" aria-labelledby="label-expire_month" class="m-0 form-group">
                                <div class="form-row">
                                    <label id="label-expire_month" for="expire_month" class="col-md-3 col-form-label form-label">Expiration date</label>
                                    <div class="col-md-9">
                                        <div class="form-row">
                                            <div class="col-auto">
                                                <select id="expire_month" name="expiry_month" class="form-control custom-select" style="width: 140px;">
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <select id="expire_year" name="expiry_year" class="form-control custom-select" style="width: 100px;">
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id='submit' class="list-group-item">
                            <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen">Submit</button>
                        </div>
                    </div>
                </form>
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