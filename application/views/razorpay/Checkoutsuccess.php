<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/index');?>">Courses</a></li>
                    <li class="breadcrumb-item active">Payment Success</li>
                </ol>
                <div class="media-body">
                    <h1 class="h2">Payment Success</h1>
                </div>
                <div class="d-flex align-items-center" >
                    <div class="alert alert-success">
                        <strong>Your Payment is Successful!</strong> <br/>
                        Thank you for the payment. Your payment has been successfully received. The profile is pending activation from Admin. Once your profile has been approved, you should be able to login and take your courses. An email will be sent to you on successful activation of your account.
                        <br/>
                        <br>
                        <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen">
                        <a href="<?php echo base_url('');?>" style="text-decoration:none;color:#fff;">Back</a></button>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>