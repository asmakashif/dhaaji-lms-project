<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Message Board</li>
                </ol>
                <h1 class="h2">Message Board</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Message Board</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="<?php echo base_url('admin_controller/master/submitNotice');?>" method="post" id="reg_form">
                            <div class="form-group row">
                                <label for="message" class="col-sm-3 col-form-label form-label">Enter Message</label>
                                <div class="col-sm-9">
                                    <textarea name="message"></textarea>
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group row mb-0">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar');?>
        <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
        <script>  
            CKEDITOR.replace('message');  
            CKEDITOR.replace('editor2');  
  
            function getData() {  
                //Get data written in first Editor   
                var editor_data = CKEDITOR.instances['message'].getData();  
                //Set data in Second Editor which is written in first Editor  
                CKEDITOR.instances['editor2'].setData(editor_data);  
            }  
        </script>  