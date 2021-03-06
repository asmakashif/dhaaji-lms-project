

<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard');?>">Home</a></li>
                    <li class="breadcrumb-item active">Course</li>
                </ol>
                <h1 class="h2">Setup Subject</h1>


                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-8">

                                <div class="btn-group">
                                    <form action="<?php echo base_url('admin_controller/master/getListBoardClassSubject');?>" method="post">
                                        <select id="board_idselect" name="board_idselect" class="form-control" required data-md-selectsize>
                                            <option value="">Board</option>
                                            <?php foreach ($board as $key => $boards) {?>
                                                <option value="<?php echo $boards->board_id?>"><?php echo $boards->board_name;?></option>
                                            <?php } ?> 
                                        </select>
                                    </div>
                                    <div class="btn-group">
                                        <select required=""  onchange="this.form.submit()" onchange="this.form.submit()" name="class" id="class_id_select" class="form-control" required data-md-selectsize>
                                            <option value="">Standard</option>
                                        </select>
                                    </form>
                                </div>
                                <a class="js-open-modal" data-modal-id="popup2"><button type="button" class="btn btn-primary">Add</button></a>
                                <a class="js-open-modal" data-modal-id="popup1"><button type="button" class="btn btn-info">Edit</button></a>
                                <a class="js-open-modal" data-modal-id="popup3"><button type="button" class="btn btn-danger">Remove</button></a>

                                <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                    <br>
                                    <br>
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Board</th>
                                                <th>Standard</th>
                                                <th>Select</th>                                                  
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="search">
                                            <?php 
                                            if(!empty($subjects)){
                                                foreach ($subjects as $key => $subj) { ?>
                                                    <tr>
                                                        <td>
                                                            <span class="js-lists-values-employee-name"><?php echo $subj->course_name ?></span>
                                                        </td>
                                                        <td>
                                                            <span class="js-lists-values-employee-name"><?php echo $subj->board_name;?></span>
                                                        </td>
                                                        <td>
                                                            <span class="js-lists-values-employee-name"><?php echo $subj->class_name;?></span>
                                                        </td>
                                                        <td> 
                                                            <div class="form-group">
                                                                <div class="custom-controls-stacked">
                                                                    <div class="custom-control custom-radio">
                                                                        <input value="<?php echo $subj->course_name;?>" name="subject_select" id="<?php echo $subj->course_id?>" type="radio" class="custom-control-input">
                                                                        <label for="<?php echo $subj->course_id?>" class="custom-control-label"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php  }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    <div>
                                        <?php
                                        if(empty($subjects)){ ?>
                                            <center>Data not founds.</center> 
                                        <?php }
                                        ?>

                                    </div>
                                </div>  
                                <br>
                                <button type="button" class="btn btn-primary" onclick="windows:location.href='https://trailroom.in/dhaji_lms/admin_controller/admin_dashboard/setup_class'">Prev</button>
                                <button type="button" class="btn btn-primary" onclick="windows:location.href='https://trailroom.in/dhaji_lms/admin_controller/admin_dashboard/setup_chapters'">Next</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>



        <?php $this->load->view('include1/sidebar');?>

        <style>
            h2 {
                margin: 1.75em 0 0;
                font-size: 5vw;
            }

            h3 { font-size: 1.3em; }

            .v-center {
                height: 100vh;
                width: 100%;
                display: table;
                position: relative;
                text-align: center;
            }

            .v-center > div {
                display: table-cell;
                vertical-align: middle;
                position: relative;
                top: -10%;
            }

            .modal-box {
                display: none;
                position: absolute;
                z-index: 1000;
                width: 50%;
                margin-left: 5%;
                background: white;
                border-bottom: 1px solid #aaa;
                border-radius: 4px;
                box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
                border: 1px solid rgba(0, 0, 0, 0.1);
                background-clip: padding-box;
            }

            .modal-box header,
            .modal-box .modal-header {
                padding: 1.25em 1.5em;
                border-bottom: 1px solid #ddd;
            }

            .modal-box header h3,
            .modal-box header h4,
            .modal-box .modal-header h3,
            .modal-box .modal-header h4 { margin: 0; }

            .modal-box .modal-body { padding: 2em 1.5em; }

            .modal-box footer,
            .modal-box .modal-footer {
                padding: 1em;
                border-top: 1px solid #ddd;
                background: rgba(0, 0, 0, 0.02);
                text-align: right;
            }

            .modal-overlay {
                opacity: 0;
                filter: alpha(opacity=0);
                top: 0;
                left: 0;
                z-index: 900;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.3) !important;
            }

            a.close {
                line-height: 1;
                font-size: 1.5em;
                position: absolute;
                top: 5%;
                right: 2%;
                text-decoration: none;
                color: #bbb;
            }

            a.close:hover {
                color: #222;
                -webkit-transition: color 1s ease;
                -moz-transition: color 1s ease;
                transition: color 1s ease;
            }
        </style>

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
        <script>
            $(function(){
                var appendthis = ("<div class='modal-overlay js-modal-close'></div>");
                $('a[data-modal-id]').click(function(e) {
                    $("body").append(appendthis);
                    $(".modal-overlay").fadeTo(500, 0.7);
//$(".js-modalbox").fadeIn(500);
var modalBox = $(this).attr('data-modal-id');
if(modalBox == 'popup1'){
    if($("input:radio[name='subject_select']").is(":checked")){
        var subject_name = $("input[name='subject_select']:checked").val();
        var s_id = $('input[type=radio][name=subject_select]:checked').attr('id');
        $('#subjects').val(subject_name);
        $('#s_id').val(s_id);
        $(".hideShow").show();
        $(".Errors").hide();
    }else{
        $(".Errors").show();
        $(".hideShow").hide();
    }
    $.post('<?php echo base_url("admin_controller/master/subjectByIdGetDetails")?>',{s_id:s_id},function(data){
        var obj = JSON.parse(data);
        $('#board_id_edits').append('<option value="'+obj.board_id+'" selected="selected">'+obj.board_name+'</option>');
        $('#class_id_edits').append('<option value="'+obj.id+'" selected="selected">'+obj.class_name+'</option>');
    });

    $('#'+modalBox).fadeIn($(this).data());
    $('.modal-box2').hide();
    $('.modal-box3').hide();
}
if(modalBox == 'popup3'){
    if($("input:radio[name='subject_select']").is(":checked")){
        var subject_id = $('input[type=radio][name=subject_select]:checked').attr('id');
        $('#s_id_delete').val(subject_id);
        $(".hideShow").show();
        $(".Errors").hide();
    }else{
        $(".Errors").show();
        $(".hideShow").hide();
    }
    $('#'+modalBox).fadeIn($(this).data());
    $('.modal-box1').hide();
    $('.modal-box2').hide();
}
if(modalBox == 'popup2'){
    $('#'+modalBox).fadeIn($(this).data());
    $('.modal-box1').hide();
    $('.modal-box3').hide();
}

});  


                $(".js-modal-close, .modal-overlay").click(function() {
                    $(".modal-box, .modal-overlay").fadeOut(500, function() {
                        $(".modal-overlay").remove();
                    });

                });
                $(window).resize(function() {
                    $(".modal-box").css({
                        top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
                        left: ($(window).width() - $(".modal-box").outerWidth()) / 2
                    });
                });

                $(window).resize();

            });
        </script>
        <div id="popup2" class="modal-box modal-box2">
            <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <a href="#" class="js-modal-close close">??</a>
                <h3>Add New Subject</h3>
            </header>
            <div class="modal-body">
                <form action="<?php echo base_url('admin_controller/master/subjectAdd');?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <select id="board_id" name="board_id" required="" class="form-control">
                            <option value="">Select Board</option>
                            <?php
                            foreach ($board as $key => $boards) {?>
                                <option value="<?php echo $boards->board_id?>"><?php echo $boards->board_name ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="c_id" id="class_id" required="" class="form-control">

                        </select>
                    </div>

                    <div class="form-group">
                        <input required="" name="subjectName" type="text" class="form-control"  placeholder="Enter Subject Name" id="bname">
                    </div>

                    <div class="form-group">
                        <lable>Upload Image</lable>
                        <input type="file" name="course_img" placeholder="Upload Image" class="form-control" accept=".png,.jpg, .jpeg"/>
                    </div>

                </div>
                <footer> 
                    <button type="Submit" class="btn btn-primary">Submit</button>
                </form>
                <a href="#" class="btn btn-small js-modal-close one">Close</a> </footer>
            </div>
            <div id="popup1" class="modal-box modal-box1">
                <header> <a href="#" class="js-modal-close close">??</a>
                    <h3>Update Subject</h3>
                </header>
                <div class="modal-body hideShow" style="display: none">
                    <form action="<?php echo base_url('admin_controller/master/updateSubject');?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <select id="board_id_edits" name="board_id" required="" class="form-control">

                                <?php
                                foreach ($board as $key => $boards) {?>
                                    <option value="<?php echo $boards->board_id?>"><?php echo $boards->board_name ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="c_id" id="class_id_edits" required="" class="form-control">

                            </select>
                        </div>

                        <div class="form-group">
                            <input required="" name="subjectName" type="text" class="form-control"  placeholder="Enter Subject Name" id="subjects">
                            <input type="hidden" name="s_id" id="s_id">
                        </div>
                        <div class="form-group">
                            <lable>Upload Image</lable>
                            <input type="file" name="course_img" placeholder="Upload Image" class="form-control" accept=".png,.jpg, .jpeg"/>
                        </div>

                    </div>
                    <div class="Errors" style="display: none">
                        <center>
                            <h3>
                                <font color="red">Please select the Class type first then update .</font>
                            </h3>
                        </center>

                    </div>
                    <footer> 
                        <button style="display: none" type="Submit" class="btn btn-primary hideShow">Update</button>
                    </form>
                    <a href="#" class="btn btn-small js-modal-close two">Close</a> </footer>
                </div>
                <div id="popup3" class="modal-box modal-box3">
                    <header> <a href="#" class="js-modal-close close">??</a>
                        <h3>Delete Subject</h3>
                    </header>
                    <div class="modal-body hideShow" style="display: none">
                        <form action="<?php echo base_url('admin_controller/master/deleteSubject');?>" method="post">
                            <div class="form-group">
                                <center> <h3>Are you soure you want to delete Subject.?If you proceed to delete then you have to delete chapters/sections and then delete the course<h3></center>
                                    <input type="hidden" name="s_id_delete" id="s_id_delete">
                                </div>
                            </div>
                            <div class="Errors" style="display: none">
                                <center>
                                    <h3>
                                        <font color="red">Please select the Subject.</font>
                                    </h3>
                                </center>
                            </div>
                            <footer> 
                                <center>
                                    <button style="display: none" type="Submit" class="btn btn-danger hideShow">Delete</button>
                                </form>
                                <a href="#" class="btn btn-small js-modal-close three">Close</a> </center></footer>
                            </div>
                            <script type="text/javascript">
                                $("#board_id").change(function () {
                                    var boardid = this.value;
                                    $.post('<?php echo  base_url('admin_controller/master/getListBoardIdBy');?>',{boardid:boardid},function(data){
                                        console.log(data);
                                        var classObj=$.parseJSON(data);
                                        var output='';
                                        output+='<option value="">Select Class</option>';
                                        var len=classObj.length;
                                        for (var i=0,j=len; i < j; i++) {
                                            output+='<option value="'+classObj[i].id+'">'+classObj[i].class_name+'</option>';
                                        };
                                        $('#class_id').html(output);
                                    });
                                });

                                $("#board_idselect").change(function () {
                                    var boardid = this.value;
                                    $.post('<?php echo  base_url('admin_controller/master/getListBoardIdBy');?>',{boardid:boardid},function(data){
                                        console.log(data);
                                        var classObj=$.parseJSON(data);
                                        var output='';
                                        output+='<option value="">Standard</option>';
                                        var len=classObj.length;
                                        for (var i=0,j=len; i < j; i++) {
                                            output+='<option value="'+classObj[i].id+'">'+classObj[i].class_name+'</option>';
                                        };
                                        $('#class_id_select').html(output);
                                    });
                                });

                            </script>
