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

            <?php
            $payment_date=date("Y-m-d H:i:s");
            $productinfo = $data_info->book_name;
            $book_id = $data_info->book_id;
            $txnid = time();
            $surl = $surl;
            $furl = $furl;        
            $key_id = 'rzp_live_pcjUmJ5btXOdC9';
            $currency_code = $currency_code;            
            $total = ($data_info->book_price* 100); 
            $amount = $data_info->book_price;
            $merchant_order_id = rand(10000000,99999999);
            $name = 'DHAJI';
            $card_holder_name = '';
            // $firstname = $firstname;
            // $contact = $contact;
            // $email = $email;
            // $city = $city;
            // $state = $state;
            // $zip = $zip;
            // $address = $address;
            $return_url = base_url().'razorpay/bookscallback';
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
                            
                            <!-- <form method="post" action="<?php echo $return_url; ?>"> -->
                            <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
                                <div class="col-50">
                                    <div class="row">
                                        <div class="col-50">
                                            <label for="fname"><i class="fa fa-user"></i>First Name</label>
                                            <input type="text" id="firstname" name="firstname" placeholder="Enter Firstname">
                                        </div>
                                        <div class="col-50">
                                            <label for="fname"><i class="fa fa-user"></i>Contact</label>
                                            <input type="text" id="contact" name="contact" placeholder="Enter Mobile Number">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-50">
                                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                            <input type="text" id="email" name="email" placeholder="john@example.com">
                                        </div>
                                        <div class="col-50">
                                            <label for="city"><i class="fa fa-institution"></i> City</label>
                                            <input type="text" id="city" name="city" placeholder="New York">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-50">
                                            <label for="state">State</label>
                                            <input type="text" id="state" name="state" placeholder="NY">
                                        </div>
                                        <div class="col-50">
                                            <label for="zip">Zip</label>
                                            <input type="text" id="zip" name="zip" placeholder="10001">
                                        </div>
                                    </div>
                                    <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                    <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                                    <input name="book_id" readonly="" type="hidden" value="<?php echo $data_info->book_id; ?>" class="form-control">
                                </div>
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
                name:"<?php echo $firstname; ?>",
                email: "<?php echo $email; ?>",
                contact: "<?php echo $phone; ?>"
            },
            notes: {
                soolegal_order_id: "<?php echo $merchant_order_id; ?>",
                book_name: "<?php echo $productinfo; ?>",
                book_id: "<?php echo $book_id; ?>",
                amount: "<?php echo $amount; ?>",
                firstname: "<?php echo $firstname; ?>",
                contact: "<?php echo $contact; ?>",
                email: "<?php echo $email; ?>",
                city: "<?php echo $city; ?>",
                state: "<?php echo $state; ?>",
                zip: "<?php echo $zip; ?>",
                address: "<?php echo $address; ?>",
                payment_date:"<?php echo $payment_date;?>",
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
<style>
    .col-50 {
        -ms-flex: 50%; /* IE10 */
        flex: 50%;
    }
    .col-50 {
        padding: 0 16px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }
        .col-25 {
            margin-bottom: 20px;
        }
    }
</style>