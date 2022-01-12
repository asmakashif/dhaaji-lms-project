<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>School Information</title>
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
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto" style="min-width: 300px;">
            <div class="text-center mt-5 mb-1">
                <?php if($this->session->flashdata('flashSuccess')) { ?>
                    <div style="width:70%;margin-top: -4%;z-index: 1;margin-left: 15%;" class="alert alert-dismissible bg-success text-white border-0 fade show successmsg" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $this->session->flashdata("flashSuccess"); ?>
                    </div>
                <?php } ?> 
                <?php if($this->session->flashdata('flashError')) { ?>
                    <div style="width:70%;margin-top: -4%;z-index: 1;margin-left: 15%;" class="alert alert-dismissible bg-danger text-white border-0 fade show errormsg" role="alert">
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
                    <h4 class="card-title">School Information</h4>
                    <p class="card-subtitle">Fill your school information</p>
                </div>
                <div class="card card-body">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <form action="<?php echo base_url('user_controller/save_school_info');?>" method="post"id="reg_form">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">School name</label>
                                        <input name="school_name" class="form-control" pattern="[A-Z][a-zA-Z][0-9][^#&<>\"~;$^%{}?]{1,20}$ required/>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="validationSample02">School Address</label>
                                        <textarea type="text" name="school_address" row="5" col="3" class="form-control"></textarea>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="menu"><b>State</b></label>
                                        <select name="state" id="state" class="form-control" required data-md-selectize style="color:black;" >
                                            <option value="">Select State</option>
                                            <?php 
                                                foreach($state as $row)
                                                {
                                                    echo '<option value="'.$row->state_id.'">'.$row->state.'</option>';
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="menu"><b>City</b></label>
                                        <select name="city" id="city" class="form-control" required data-md-selectize style="color:black;" >
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Board</label>
                                        <select name="board" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                            <option value="">Select Board</option>
                                            <?php foreach ($board as $res) { ?>
                                              <option <?php echo $board == $res->board_id ? 'selected="selected"' : '' ?> value="<?php echo $res->board_name;?>"><?php echo $res->board_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Grade</label>
                                        <select name="grade" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                            <option value="">Select Grade</option>
                                            <?php foreach ($grade as $res) { ?>
                                              <option <?php echo $grade == $res->id ? 'selected="selected"' : '' ?> value="<?php echo $res->class_name;?>"><?php echo $res->class_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Curriculum</label>
                                        <div style="display:none;">
                                            <?php if(is_array($userData)){ ?>
                                                <?php echo $plan_name = $userData['plan_name']; ?>
                                            
                                                <?php if($plan_name=='Full Course') echo "Full Course"; else { echo "None";} ?>
                                            <?php } else{ ?>
                                                cdsg
                                            <?php } ?>   
                                        </div>
                                        <?php if(empty($plan_name) || ($plan_name=='Test Only') || ($plan_name=='Full Course'))  { ?>
                                            <select name="curriculum" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                                <option value="">Select Curriculum</option>
                                                <option value="Full Course">Full Course</option>
                                                <option value="Test only">Test only</option>
                                                <option value="Subject Wise">Subject Wise</option>
                                            </select>
                                        <?php } else{ ?>
                                            <select name="curriculum" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                                <option value="">Select Curriculum</option>
                                                <option value="<?php echo $userData['plan_name']?>"><?php echo $userData['plan_name']?></option>
                                            </select>

                                            
                                        <?php }?>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Medium</label>
                                        <select name="medium" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                            <option value="">Select Medium</option>
                                            <option value="English">English</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" style="background-color:yellowgreen;border-color:yellowgreen">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-1"></div>
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
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#state').change(function(){
            var state_id = $('#state').val();
            if(state_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>user_controller/fetch_city",
                    method:"POST",
                    data:{state_id:state_id},
                    success:function(data)
                    {
                        $('#city').html(data);
                    }
                });
            }
            else
            {
                $('#city').html('<option value="">Select City</option>');
            }
        });

    });
</script>