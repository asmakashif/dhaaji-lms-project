<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Payment History</li>
                </ol>
                <h1 class="h2">Payment History</h1>
                <p class="card-subtitle"><a href="<?php echo base_url('admin_controller/admin_dashboard/student_information');?>" style="text-decoration:none;">Click to find student id</a></p>
                &nbsp;
                <div class="search-form search-form-light mb-3">
                    <div id="show_form">
                        <?php
                        echo form_open('admin_controller/payment_history/select_by_id');
                        $data = array(
                            'name' => 'id',
                            'placeholder' => 'Please Enter User ID'
                        );
                        // echo "<i class='fa fa-search'>";
                        // echo "</i>";
                        echo form_input($data);

                        echo "<div class='error_msg'>";
                        if (isset($id_error_message)) {
                            echo $id_error_message;
                        }
                        echo "</div>";
                        echo form_close();
                        ?>
                    </div>
                </div>
                <div class="message">
                    <?php
                    if (isset($result_display)) 
                    {
                        if ($result_display == 'No record found !') 
                        {
                            echo $result_display;
                        } 
                        else 
                        {
                            echo "<div class='card'>";
                            echo "<table class='result_table'>";
                            echo'<tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Grade</th>
                                <tr/>';
                            foreach ($result_display as $value) 
                            {
                                echo '<tr>' . '<td class="e_id">' . $value->id . '</td>' . '<td>' .$value->firstname . '</td>' . '<td class="j_date">' . $value->grade . '</td>' . '<tr/>';
                            }
                            echo '</table>';
                            echo '</div>';
                        }
                    } 
                    ?>
                </div>
                <div class="message">
                    <?php
                    if (isset($result_display)) 
                    {
                        if ($result_display == 'No record found !') 
                        {
                            echo $result_display;
                        } 
                        else 
                        {
                            echo "<div class='card'>";
                            echo "<table class='result_table'>";
                            echo'<tr>
                            <th>#</th>
                            <th>Plan Name</th>
                            <th>Payment Date</th>
                            <th>Plan Amount</th>
                            <tr/>';
                            foreach ($result_display as $value) 
                            {
                                echo '<tr>' . '<td>' . $value->id . '</td>' . '<td>' . $value->plan_name . '</td>' . '<td>' .date('d-m-Y', strtotime($value->payment_date)) . '</td>' . '<td>' . $value->plan_amount . '</td>' . '<tr/>';
                            }
                            echo '</table>';
                            echo '</div>';
                        }
                    } 
                    ?>
                </div>

            </div>
        </div>
        <?php $this->load->view('include1/sidebar');?>


        <style type="text/css">

            #show_form
            {
                width:900px;
                float: left;
                font-family:raleway;
            }
            input[type=text],[type=date]
            {
                width:100%;
                padding: 10px;
                margin-top: 8px;
                border: 1px solid #f2f2f2;
                padding-left:10px;
                font-size: 16px;
                font-family:raleway;
            }

            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            .error_msg
            {
                color:red;
                font-size: 16px;
                padding-left:10px;
            }
        </style>

