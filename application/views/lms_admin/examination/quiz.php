
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/examination/view_quiz');?>">Quiz</a></li>
                    <li class="breadcrumb-item active">Add Quiz</li>
                </ol>
                <h1 class="h2">Upload Quiz Questions</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><strong style="color: red;">NOTE:</strong></h4><p>Use the following format to add equation, add dollar sign at start and at end of the equation</p>ex: $$ {your equation} $$
                    </div>
                    <div class="card-body">
                        <form class="form" action="<?php echo base_url('admin_controller/examination/submitMcqs');?>" method="post" id="reg_form">
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Title</label>
                                <div class="col-sm-9 col-md-5">
                                    <select name="chapter_id" id="val_select" class="form-control" required data-md-selectize style="color:black;" >
                                        <option value="">Select Quiz Title</option>
                                        <?php foreach ($quiz_title as $res) { ?>
                                            <option <?php echo $quiz_title == $res->chapters_id ? 'selected="selected"' : '' ?> value="<?php echo $res->chapters_id;?>"><?php echo $res->chapters_id.'-'.$res->chapters_name;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="message" class="col-sm-3 col-form-label form-label">Enter Message</label>
                                <div class="col-sm-9">
                                    <textarea name="message"></textarea>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Quiz Question:</label>
                                <div class="col-sm-12 col-md-8">
                                    <textarea name="question"></textarea>
                                    <!-- <input id="question" name="question" type="text" class="form-control" placeholder="Quiz Question"> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Choice 1</label>
                                <div class="col-sm-12 col-md-8">
                                    <textarea name="choice1"></textarea>
                                    <!-- <input id="quiz_title" name="choice1" type="text" class="form-control" placeholder="Choice 1"> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Choice 2</label>
                                <div class="col-sm-12 col-md-8">
                                    <textarea name="choice2"></textarea>
                                    <!-- <input id="quiz_title" name="choice2" type="text" class="form-control" placeholder="Choice 2"> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Choice 3</label>
                                <div class="col-sm-12 col-md-8">
                                    <textarea name="choice3"></textarea>
                                    <!-- <input id="quiz_title" name="choice3" type="text" class="form-control" placeholder="Choice 3"> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Choice 4</label>
                                <div class="col-sm-12 col-md-8">
                                    <textarea name="choice4"></textarea>
                                    <!-- <input id="quiz_title" name="choice4" type="text" class="form-control" placeholder="Choice 4"> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quiz_title" class="col-sm-3 col-form-label form-label">Quiz Answer</label>
                                <div class="col-sm-9 col-md-5">
                                    <input id="quiz_title" name="answer" type="text" class="form-control" placeholder="Quiz Answer">
                                    
                                    <p><small>Answers should be added as a,b,c,d</small></p>
                                </div>
                            </div>
                            &nbsp;
                            <div class="form-group row mb-0">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-success btn-lg">Save</button>
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
            CKEDITOR.replace('question');
            CKEDITOR.replace('choice1');
            CKEDITOR.replace('choice2');
            CKEDITOR.replace('choice3');
            CKEDITOR.replace('choice4');  
            CKEDITOR.replace('editor2');  
  
            function getData() {  
                //Get data written in first Editor   
                var editor_data = CKEDITOR.instances['question'].getData();
                var editor_data = CKEDITOR.instances['choice1'].getData();
                var editor_data = CKEDITOR.instances['choice2'].getData();
                var editor_data = CKEDITOR.instances['choice3'].getData();
                var editor_data = CKEDITOR.instances['choice4'].getData();  
                //Set data in Second Editor which is written in first Editor  
                CKEDITOR.instances['editor2'].setData(editor_data);  
            }  
        </script>
        <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
        <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
        <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
        <script>
MathJax = {
  tex: {
    inlineMath: [['$', '$'], ['\\(', '\\)']]
  }
};
</script>
<script id="MathJax-script" async
  src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
</script> -->