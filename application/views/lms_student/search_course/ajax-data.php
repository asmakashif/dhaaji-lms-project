<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script>
    function searchFilter(page_num){
        page_num = page_num?page_num:0;
        var keywords = $('#keywords').val();
        var sortBy = $('#sortBy').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('student_controller/search_course/ajaxPaginationData/'); ?>'+page_num,
            data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
            beforeSend: function(){
                $('.loading').show();
            },
            success: function(html){
                $('#dataList').html(html);
                $('.loading').fadeOut("slow");
            }
        });
    }
</script>
<div class="post-list" id="dataList">
    <div class="card-deck">
        <?php if(!empty($posts)){ foreach($posts as $row){ 
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            ?>
            <div class="col-md-4">
                <img class="card-img-top" src="<?php echo base_url().'uploads/'. $row['img'];?>" style="height:150px;width:250px;">
                <div class="caption">
                    <h6><a href="#"><?php echo $row['name']; ?></a></h6>
                    <p><?php echo $row['description']; ?></p>
                    <div id='rs'><b>Price</b>:<big>
                        ₹ <?php echo $price; ?></big>
                    </div>
                    <?php
                    echo form_open('shopping/add');
                    echo form_hidden('id', $id);
                    echo form_hidden('name', $name);
                    echo form_hidden('description', $description);
                    echo form_hidden('price', $price);
                    ?> 
                </div>
                <br />
                <div id='add_button'>
                    <?php
                    $btn = array(
                        'class' => 'fg-button teal',
                        'value' => 'Add to Cart',
                        'name' => 'action'
                    );
                    echo form_submit($btn);
                    echo form_close();
                    ?>
                </div>
            </div>
        <?php } }else{ ?>
            <p>Course(s) not found...</p>
        <?php } ?>
    </div>
</div>
<!-- Render pagination links -->
<!-- <?php echo $this->ajax_pagination->create_links(); ?> -->
<style type="text/css">
    div#add_button {
        /*margin-top: 18px;*/
        margin-left: 20px;
        margin-bottom:20px;
    }
    span#go_back {
        margin-left: 245px;
    }

    .fg-button{
        position: relative;
        top: 0;
        border-radius: 4;
        font-size: 18px;
        padding: 8px 28px;
        text-decoration: none;
        border: 0px solid;
        cursor: pointer;
        border-bottom-width: 3px;
        outline: none;
        -webkit-transition: 0.3s background;
        -moz-transition: 0.3s background;
        transition: 0.3s background;
    }
    .fg-button:active{
        top: 2px;
    }
    .fg-button.teal{
        color: #fff;
        border-color: #04A5A1;
        background-color:#08BBB7;
    }
    .fg-button.teal:hover{
        background: #0ACFCB;
    }
    .fg-button.teal:active{
        background: #09cbc7;
        top: 2px;
        border-bottom-width: 1px;
    }
</style>