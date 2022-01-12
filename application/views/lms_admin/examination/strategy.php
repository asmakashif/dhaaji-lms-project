

<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard');?>">Home</a></li>
                    <li class="breadcrumb-item active">Strategy</li>
                </ol>
                <h1 class="h2">Strategy</h1>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#first" data-toggle="tab">Steps to upload video link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#second" data-toggle="tab">Topper's View</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#third" data-toggle="tab">Subject-wise View</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#fourth" data-toggle="tab">Answer Writing</a>
                            </li>
                        </ul>
                        <div class="tab-content card-body">
                            <div class="tab-pane active" id="first">
                                <div class="row">
                                    <b>Step1 :</b> <p>Open youtube video to be uploaded</p><img src="<?php echo base_url('assets/img/img1.png');?>" class="thumbnail" height="50" width="100" /> 
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-8">
                                        <strong>Step2 :</strong><p>Copy only highlighted text from youtube URL <strong>https://www.youtube.com/watch?v=<mark style="background-color:yellow;">kZQ8zBRJZIk</mark></strong></p> 
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="<?php echo base_url('assets/img/img2.png');?>" class="thumbnail1" height="50" width="100" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <strong>Step3 :</strong><p>Then paste this highlighted text from 
                                        youtube URL into video link of admin module <br><strong>https://www.youtube.com/embed/<mark style="background-color:yellow;">kZQ8zBRJZIk</mark></strong></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="<?php echo base_url('assets/img/img3.png');?>" class="thumbnail1" height="50" width="100" />
                                    </div> 
                                </div>
                            </div>

                            <div class="tab-pane" id="second">
                                <form action="<?php echo base_url('admin_controller/examination/submitToppersView');?>" method="post">
                                    <!-- <div class="form-group row">
                                        <label for="file_name" class="col-form-label form-label"><strong>File Name</strong></label>
                                        <div class="col-sm-9 col-md-4">
                                            <div class="input-group input-group-merge">
                                                <input required="" name="file_name" type="text" class="form-control"  placeholder="Enter File Name" id="bname">
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="col-sm-9 col-md-6">
                                            <label for="bname"><b>File Name</b></label></br>
                                            <input required="" name="file_name" type="text" class="form-control"  placeholder="Enter File Name" id="bname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-md-6">
                                            <label for="bname"><b>Video Link</b></label></br>
                                            <input required="" name="videolink" value="https://www.youtube.com/embed/" type="text" class="form-control"  placeholder="Enter Video Link" id="link">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-9">
                                            <input type="submit" class="btn btn-success"/>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="third">
                               <form action="<?php echo base_url('admin_controller/examination/submitSubjectwiseView');?>" method="post">
                                    <div class="form-group">
                                        <div class="col-sm-9 col-md-6">
                                            <label for="bname"><b>File Name</b></label></br>
                                            <input required="" name="file_name" type="text" class="form-control"  placeholder="Enter File Name" id="bname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-md-6">
                                            <label for="bname"><b>Video Link</b></label></br>
                                            <input required="" name="videolink" value="https://www.youtube.com/embed/" type="text" class="form-control"  placeholder="Enter Video Link" id="link">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-9">
                                            <input type="submit" class="btn btn-success"/>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="fourth">
                                <form action="<?php echo base_url('admin_controller/examination/submitAnswerWritting');?>" method="post">
                                    <div class="form-group">
                                        <div class="col-sm-9 col-md-6">
                                            <label for="bname"><b>File Name</b></label></br>
                                            <input required="" name="file_name" type="text" class="form-control"  placeholder="Enter File Name" id="bname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-md-6">
                                            <label for="bname"><b>Video Link</b></label></br>
                                            <input required="" name="videolink" value="https://www.youtube.com/embed/" type="text" class="form-control"  placeholder="Enter Video Link" id="link">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-9">
                                            <input type="submit" class="btn btn-success"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar');?>
        <style type="text/css">
            .thumbnail:hover 
            {
                position:relative;
                top:-25px;
                left:-35px;
                width:600px;
                height:auto;
                display:block;
                z-index:999;
            }
            .thumbnail1:hover 
            {
                position:relative;
                top:-25px;
                left:-35px;
                width:500px;
                height:auto;
                display:block;
                z-index:999;
            }
            .thumbnail2:hover 
            {
                position:relative;
                top:-25px;
                left:-35px;
                width:500px;
                height:auto;
                display:block;
                z-index:999;
            }
        </style>
