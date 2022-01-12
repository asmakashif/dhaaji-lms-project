<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Payment Success</title>
    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">
 

    <!-- App CSS -->
    <link type="text/css" href="<?php echo base_url('assets/css/app.css');?>" rel="stylesheet">
 
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.jpg');?>" />
</head>

<body class="login">
    <div class="d-flex align-items-center" >
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="min-width:400px;">
            <div class="text-center mt-5 mb-1">
                <img src="<?php echo base_url('assets/images/logo.jpg');?>" alt="Dhaaji" style="width:250px;height:100px;"/>
            </div>
            <br>
            <br>
            <div class="alert alert-success">
                <strong>Your Test is uploaded Successfully!</strong>
                <br/>
                <br>
            </div>
        </div>
    </div>
</body>
</html>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'http://localhost/dhaji_lms/';
}, 3000);
</script>