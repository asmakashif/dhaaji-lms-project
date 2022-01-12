
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Setup Books</li>
                </ol>

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-8">

                                <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                                    <a class="js-open-modal" data-modal-id="popup2"><button type="button" class="btn btn-primary">Add</button></a>
                                    <a class="js-open-modal" data-modal-id="popup1"><button type="button" class="btn btn-info">Edit</button></a>
                                    <a class="js-open-modal" data-modal-id="popup3"><button type="button" class="btn btn-danger">Remove</button></a>
                                    <br>
                                    <br>

                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Book Name</th>
                                                <th >Select</th>                                                  
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="search">
                                            <?php foreach ($books as $key => $bk) { ?>
                                                <tr>
                                                    <td>
                                                        <span class="js-lists-values-employee-name"><?php echo $bk->book_name;?></span>
                                                    </td>

                                                    <td> 
                                                        <div class="form-group">
                                                            <div class="custom-controls-stacked">
                                                                <div class="custom-control custom-radio">
                                                                    <input value="<?php echo $bk->book_name;?>" name="book_select" id="<?php echo $bk->book_id?>" name="radio-stacked" type="radio" class="custom-control-input">
                                                                    <label for="<?php echo $bk->book_id?>" class="custom-control-label"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>  
                                <br>
                                <button type="button" class="btn btn-primary" onclick="windows:location.href='https://trailroom.in/dhaji_lms/admin_controller/admin_dashboard/current_orders'">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar')?>
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

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
        <script>
            $(function(){
                var appendthis = ("<div class='modal-overlay js-modal-close'></div>");
                $('a[data-modal-id]').click(function(e) {
                    $("body").append(appendthis);
                    $(".modal-overlay").fadeTo(500);
//$(".js-modalbox").fadeIn(500);
var modalBox = $(this).attr('data-modal-id');
if(modalBox == 'popup1'){
    $(".modal-overlay").remove();
    if($("input:radio[name='book_select']").is(":checked")){
        var book_name = $("input[name='book_select']:checked").val();
        var book_id = $('input[type=radio][name=book_select]:checked').attr('id');
        $('#book_name').val(book_name);
        $('#b_id').val(book_id);
        $(".hideShow").show();
        $(".Errors").hide();
    }else{
        $(".Errors").show();
        $(".hideShow").hide();
    }

    $('#'+modalBox).fadeIn($(this).data());
    $('.modal-box2').hide();
    $('.modal-box3').hide();
}
if(modalBox == 'popup3'){
    if($("input:radio[name='book_select']").is(":checked")){
        var book_id = $('input[type=radio][name=book_select]:checked').attr('id');
        $('#b_id_delete').val(book_id);
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
            <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <a href="#" class="js-modal-close close">×</a>
                <h3>Add New Board</h3>
            </header>
            <div class="modal-body">
                <form action="<?php echo base_url('admin_controller/master/bookAdd');?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="bname"><b>Standard</b></label></br>
                        <input name="standard" type="text" class="form-control"  placeholder="Enter Standard" id="bname">
                    </div>
                    <div class="form-group">
                        <label for="bname"><b>Book Name</b></label></br>
                        <input required="" name="book" type="text" class="form-control"  placeholder="Enter Book Name" id="bname">
                    </div>
                    <div class="form-group">
                        <label for="bname"><b>Book Price</b></label></br>
                        <input required="" name="book_price" type="text" class="form-control"  placeholder="Enter Book Price" id="bname">
                    </div>
                    <div class="form-group">
                        <label for="bname"><b>Book Image</b></label></br>
                        <input type="file" name="book_img" class="form-control" accept=".jpg,.jpeg, .png"/>
                    </div>
                </div>
                <footer> 
                    <button type="Submit" class="btn btn-primary">Submit</button>
                </form>
                <a href="#" class="btn btn-small js-modal-close one">Close</a> </footer>
            </div>
            <div id="popup1" class="modal-box modal-box1">
                <header> <a href="#" class="js-modal-close close">×</a>
                    <h3>Update Board</h3>
                </header>
                <div class="modal-body hideShow" style="display: none">
                    <form action="<?php echo base_url('admin_controller/master/updateBook');?>" method="post">
                        <!-- <div class="form-group">
                            <label for="bname"><b>Standard</b></label></br>
                            <input name="standard" type="text" class="form-control"  placeholder="Enter Standard" id="bname">
                        </div> -->
                        <div class="form-group">
                            <label for="bname"><b>Book Name</b></label></br>
                            <input required="" id="book_name" name="book" type="text" class="form-control"  placeholder="Enter Book Name">
                            <input type="hidden" name="b_id" id="b_id">
                        </div>
                    </div>
                    <div class="Errors" style="display: none">
                        <center>
                            <h3>
                                <font color="red">Please select the first to update Books.</font>
                            </h3>
                        </center>

                    </div>
                    <footer> 
                        <button style="display: none" type="Submit" class="btn btn-primary hideShow">Submit</button>
                    </form>
                    <a href="#" class="btn btn-small js-modal-close two">Close</a> </footer>
                </div>
                <div id="popup3" class="modal-box modal-box3">
                    <header> <a href="#" class="js-modal-close close">×</a>
                        <h3>Delete Board</h3>
                    </header>
                    <div class="modal-body hideShow" style="display: none">
                        <form action="<?php echo base_url('admin_controller/master/deleteBook');?>" method="post">
                            <div class="form-group">
                                <center> <h3>Are you soure you want to delete.?<h3></center>
                                    <input type="hidden" name="b_id" id="b_id_delete">
                                </div>
                            </div>
                            <div class="Errors" style="display: none">
                                <center>
                                    <h3>
                                        <font color="red">Please select the board type first then delete board.</font>
                                    </h3>
                                </center>

                            </div>
                            <footer> 
                                <center>
                                    <button style="display: none" type="Submit" class="btn btn-danger hideShow">Delete</button>
                                </form>
                                <a href="#" class="btn btn-small js-modal-close three">Close</a> </center></footer>
                            </div>
