<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">My Certificate</li>
                </ol>
                <?php if(!empty($true)){ if($true == 1){ ?>
                
                    <h1 class="h2">Course Completion Certificate</h1>
                    <div class="card">
                        <div class="card-body">
                            <div id="pdfdiv">
                                <table width="100%" style="border-style:double;border-width:10px;border-color:black;">
                                    <tbody>
                                        <tr>
                                            <td align="center"> <br/>
                                                <div style="font-size:30pt">
                                                    <img src="<?php echo base_url('assets/images/logo.jpg');?>" alt="Dhaaji" style="width:250px;height:100px;"/><br/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <div style="font-size:30pt">
                                                    This is to certify that
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center"> 
                                                <div style="font-size:30pt">
                                                    <?php echo $userData['firstname']?>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td align="center">
                                                has completed the course<br/>
                                                <div style="font-size:30pt">
                                                    <?php echo $fetchdatabyid[0]->course_name;?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <i>On</i></span><br><?php echo date('d-m-Y', strtotime($fetchdatabyid[0]->completed_date))?>
                                            </td>
                                        </tr>
                                        &nbsp;
                                    <tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <p>
                                <button class="btn btn-success"><a href="<?php echo base_url('student_controller/certificate/');?>" style="text-decoration:none;color:#fff;">Back</a></button>
                                <input type="button" class="btn btn-success" value="Save PDF" id="btPrint" onclick="createPDF()" style="float:right;" />
                            </p>
                        </div>
                    </div>
                <?php } } else{ ?>
                <?php foreach($course_data as $row){?>
                    <div class="btn btn-success">
                        Complete Course to get the certificate &nbsp;&nbsp;<a style="color: red;" href="<?php echo base_url('student_controller/course/view_course/'.$row->course_id);?>">Click here</a>
                        </div>
                    <?php } ?>
                <?php }

                 ?>
            </div>
        </div>
        <?php $this->load->view('include/sidebar');?>
        <script>
            function createPDF() 
            {
                var sTable = document.getElementById('pdfdiv').innerHTML;

                var style = "<style>";
                style = style + "table {width: 100%;font: 17px Calibri;}";
                style = style + "table, th, td {border-collapse: collapse;";
                style = style + "padding: 2px 3px;text-align: center;}";
                style = style + "</style>";

                // CREATE A WINDOW OBJECT.
                var win = window.open('', '', 'height=700,width=700');

                win.document.write('<html><head>');
                win.document.write('<title>Course Completion Certificate</title>');   // <title> FOR PDF HEADER.
                win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
                win.document.write('</head>');
                win.document.write('<body>');
                win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
                win.document.write('</body></html>');

                win.document.close();   // CLOSE THE CURRENT WINDOW.

                win.print();    // PRINT THE CONTENTS.
            }
        </script>