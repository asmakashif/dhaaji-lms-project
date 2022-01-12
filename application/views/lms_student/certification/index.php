<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">My Certificate</li>
                </ol>
                <h1 class="h2">My Certificates</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Course Completion Certificate</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 18px;">#</th>
                                                <th style="width: 160px;">Subject</th>
                                                <th style="width: 160px;">View Certificate</th>
                                            </tr>
                                        </thead>
                                        <?php $count=1;
                                        foreach($student_info as $row)
                                        {
                                            echo '
                                                <tr>
                                                    <td>'.$count++.'</td>
                                                    <td>'.$row->course_name.'</td>
                                                    <td><a href="'.base_url().'student_controller/certificate/view_certificate/'.$row->course_id.'">View&nbsp; <i class="fa fa-eye"></i></a></td>
                                                    
                                                </tr>
                                            ';
                                        }
                                        ?> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar');?>
