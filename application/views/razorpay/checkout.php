<!DOCTYPE html>
<html lang="en" dir="ltr">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
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
            <?php
            $payment_date=date("Y-m-d H:i:s");
            $exp_date   = date('Y-m-d H:i:s', strtotime('+1 years'));
            $productinfo = $data_info->subject;
            $txnid = time();
            $surl = $surl;
            $furl = $furl;       
            $key_id = 'rzp_live_44FYsLTZuEDNHn';
            $currency_code = $currency_code;            
            $total = ($data_info->fees* 100); 
            $amount = $data_info->fees;
            $merchant_order_id = rand(10000000,99999999);
            $card_holder_name = $std_info->firstname.' '.$std_info->lastname;
            $email = $std_info->email;
            $phone = $std_info->contact;
            $name = 'DHAJI';
            $return_url = base_url().'razorpay/callback';
            ?>

            <div class="d-flex align-items-center" >
                <div class="col-sm-12 col-md-10  mx-auto" style="min-width:400px;">
                    <div class="text-center mt-5 mb-1">
                        <img src="<?php echo base_url('assets/images/logo.jpg');?>" alt="Dhaaji" style="width:250px;height:100px;"/>
                    </div>
                    <br>
                    <div class="card-header text-center">
                        <h4 class="card-title">Payment Details</h4>
                        <p class="card-subtitle">You will be charged to take up the course</p>
                    </div>
                    <div class="card">

                        <div class="list-group list-group-fit">
                            <div class="list-group-item">
                                <fieldset role="group" aria-labelledby="label-type" class="m-0 form-group">
                                    <div class="form-row">
                                        <label id="label-cc" for="cc" class="col-md-3 col-form-label form-label">Plan Name</label>
                                        <div class="col-md-9">
                                            <input name="subject" readonly="" type="text" value="<?php echo $data_info->subject; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <label id="label-cc" for="cc" class="col-md-3 col-form-label form-label">Plan Amount</label>
                                        <div class="col-md-9">
                                            <input name="fees" readonly="" type="text" value="<?php echo $data_info->fees; ?>" class="form-control">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
                                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                                <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
                                <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                                <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
                                <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                                <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                                <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                                <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
                                <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
                            </form>

                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="<?php print site_url();?>" name="reset_add_emp" id="re-submit-emp" class="btn btn-warning" style="margin-left:15px;">Back</a>
                                    <input id="submit-pay" type="submit" onclick="razorpaySubmit(this);" value="Pay Now" class="btn btn-primary" style="float:right;margin-right:20px;"/>
                                </div>
                            </div>
                            <br>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>

        var razorpay_options = {
            key: "<?php echo $key_id; ?>",
            amount: "<?php echo $total; ?>",
            name: "<?php echo $name; ?>",
            description: "Order # <?php echo $merchant_order_id; ?>",
            netbanking: true,
            currency: "<?php echo $currency_code; ?>",
            prefill: {
                name:"<?php echo $card_holder_name; ?>",
                email: "<?php echo $email; ?>",
                contact: "<?php echo $phone; ?>"
            },
            notes: {
                soolegal_order_id: "<?php echo $merchant_order_id; ?>",
                plan_name: "<?php echo $productinfo; ?>",
                amount: "<?php echo $amount; ?>",
                stdudent_id:"<?php echo $stdid;?>",
                payment_date:"<?php echo $payment_date;?>",
                exp_date:"<?php echo $exp_date;?>",
            },
            handler: function (transaction) {
                document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
                document.getElementById('razorpay-form').submit();
            },
            "modal": {
                "ondismiss": function(){
                    location.reload()
                }
            }
        };
        var razorpay_submit_btn, razorpay_instance;

        function razorpaySubmit(el){
            if(typeof Razorpay == 'undefined'){
                setTimeout(razorpaySubmit, 200);
                if(!razorpay_submit_btn && el){
                    razorpay_submit_btn = el;
                    el.disabled = true;
                    el.value = 'Please wait...';  
                }
            } else {
                if(!razorpay_instance){
                    razorpay_instance = new Razorpay(razorpay_options);
                    if(razorpay_submit_btn){
                        razorpay_submit_btn.disabled = false;
                        razorpay_submit_btn.value = "Pay Now";
                    }
                }
                razorpay_instance.open();
            }
        }  
    </script>
</body>
</html>