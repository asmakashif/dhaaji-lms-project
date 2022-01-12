<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">My Certificate</li>
                </ol>
                <h1 class="h2">Course Completion Certificate</h1>
                <div class="card">
                    <div class="card-body">
                        <div id="pdfdiv">
                            <table id="dt_tableExport" width="100%" style="border-style:double;border-width:10px;border-color:black">
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
                                        <td align="center"> <br/>
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
                                            <i>On</i></span><br>16-01-20
                                        </td>
                                    </tr>
                                <tbody>
                            </table>
                        </div>
                        <br>
                        <button class="btn btn-success"><a href="<?php echo base_url('student_controller/certificate/');?>" style="text-decoration:none;color:#fff;">Back</a></button>
                        <button class="btn btn-success" id="pdfview" style="position:absolute;right: 10px;">Download PDF</button>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar');?>
        <!-- <script type="text/javascript" src="<?php echo base_url('assets/js1/jspdf.min.js');?>"></script> -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js1/jquery-git.js');?>"></script>
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
        <script type='text/javascript'>//<![CDATA[
            $(window).on('load', function() {
                var doc = new jsPDF('p', 'pt', 'a4');

                var top_left_margin = 35;
                var specialElementHandlers = {
                    '#editor': function (element, renderer) {
                        return true;
                    }
                };

                $('#pdfview').click(function () {
                    doc.fromHTML($('#pdfdiv').html(), 15, 15, {
                        'width':500,
                        
                        'elementHandlers': specialElementHandlers
                    });
                    // pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
                    doc.save('course_certificate.pdf');
                });
            });//]]> 
        </script>

        <style type="text/css">
            #pdfview
            {
                text-align: center;
            }
        </style>