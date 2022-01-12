
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Help Center</li>
                </ol>
                <h1 class="h2">Help Center</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('admin_controller/master/submitQuestions');?>" method="post" id="reg_form">
                            <!--<div class="form-group row">-->
                            <!--    <label for="title" class="col-sm-3 col-form-label form-label">Title</label>-->
                            <!--    <div class="col-sm-9 col-md-5">-->
                            <!--        <input id="title" name="title" type="text" class="form-control" placeholder="Enter Title">-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Title</label>
                                <div class="col-sm-9 col-md-5">
                                    <input id="title_body" name="title_body" type="text" class="form-control" placeholder="Enter Tilte">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Title Content</label>
                                <div class="col-sm-9 col-md-5">
                                    <textarea name="title_content" rows="5" cols="45"></textarea>
                                </div>
                            </div>
                    
                            <div class="form-group row mb-0">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>      
        <?php $this->load->view('include1/sidebar');?>
