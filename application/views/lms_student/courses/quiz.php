<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item active">Quiz</li>
                </ol>
                <?php if($this->session->userdata('plan_name') =='Full Course'){ ?>
                    <input type="hidden" value="<?=$chapterid?>" id="chapterid">
                    <input type="hidden" value="<?=count($questions)?>" id="totq">
                    <input type="hidden" value="<?=$this->session->userdata("id")?>" id="regno">
                    <div class="card"><!-- card -->
                        <?php $i=1;   $hideQuestion='';                     
                        foreach ($questions as $q) {
                            if($i != 1){
                                $hideQuestion='display:none';
                            }
                        ?> 
                            <div class="card-body question<?=$i?>" style="<?=$hideQuestion?>"><!-- card body -->
                                <h5 class="text-danger">Question No : <?=$i;?></h5>
                                <div class="form-group">
                                    <?=$q->question;?>
                                </div>
                                <div class="form-group ">
                                    <input type="radio"  name="ans<?=$i?>" class="<?=$q->quiz_id;?>" value="a"> 
                                    <label class="control-label" ><?=trim($q->choice1);?> </label>
                                </div> 
                                <div class="form-group">
                                    <input type="radio"  name="ans<?=$i?>" class="<?=$q->quiz_id;?>" value="b"> 
                                    <label class="control-label" ><?=trim($q->choice2);?></label>
                                </div>  
                                <div class="form-group ">
                                    <input type="radio"  name="ans<?=$i?>" class="<?=$q->quiz_id;?>" value="c"> 
                                    <label class="control-label" ><?=trim($q->choice3);?> </label>
                                </div> 
                                <div class="form-group">
                                    <input type="radio"  name="ans<?=$i?>" class="<?=$q->quiz_id;?>" value="d"> 
                                    <label class="control-label" ><?=trim($q->choice4);?></label>
                                </div>  
                            </div> <!-- card body -->
                        <?php 
                        $i++;
                        }
                        ?>
                        <div class="card-footer"><!-- footer -->                        
                            <input type="hidden"  id="currentQuestion"/>                        
                            <input type="hidden"  id="currentQuestionno"/>                        
                            <!-- <button class="btn btn-danger btn-sm" id="prev">Previous</button> -->
                            <button class="btn btn-info btn-sm" id="next">Next</button>
                            <button class="btn btn-success btn-sm pull-right" id="endexam">End Exam</button>
                        </div> <!-- footer -->
                    </div> <!-- card -->
                <?php } else { ?>
                    <input type="hidden" value="<?=$chapterid?>" id="chapterid">
                    <input type="hidden" value="<?=count($questions)?>" id="totq">
                    <input type="hidden" value="<?=$this->session->userdata("id")?>" id="regno">
                    <div class="card"><!-- card -->
                        <?php $i=1;   $hideQuestion='';                     
                        foreach ($questions as $q) {
                            if($i != 1){
                                $hideQuestion='display:none';
                            }
                        ?> 
                            <div class="card-body question<?=$i?>" style="<?=$hideQuestion?>"><!-- card body -->
                                <h5 class="text-danger">Question No : <?=$i;?></h5>
                                <div class="form-group">
                                    <?=$q->question;?>
                                </div>
                                <div class="form-group ">
                                    <input type="radio"  name="ans<?=$i?>" class="<?=$q->quiz_id;?>" value="a"> 
                                    <label class="control-label" ><?=trim($q->choice1);?> </label>
                                </div> 
                                <div class="form-group">
                                    <input type="radio"  name="ans<?=$i?>" class="<?=$q->quiz_id;?>" value="b"> 
                                    <label class="control-label" ><?=trim($q->choice2);?></label>
                                </div>  
                                <div class="form-group ">
                                    <input type="radio"  name="ans<?=$i?>" class="<?=$q->quiz_id;?>" value="c"> 
                                    <label class="control-label" ><?=trim($q->choice3);?> </label>
                                </div> 
                                <div class="form-group">
                                    <input type="radio"  name="ans<?=$i?>" class="<?=$q->quiz_id;?>" value="d"> 
                                    <label class="control-label" ><?=trim($q->choice4);?></label>
                                </div>  
                            </div> <!-- card body -->
                        <?php 
                        $i++;
                        }
                        ?>
                        <div class="card-footer"><!-- footer -->                        
                            <input type="hidden"  id="currentQuestion"/>                        
                            <input type="hidden"  id="currentQuestionno"/>                        
                            <!-- <button class="btn btn-danger btn-sm" id="prev">Previous</button> -->
                            <button class="btn btn-info btn-sm" id="next">Next</button>
                            <button class="btn btn-success btn-sm pull-right" id="endexam">End Exam</button>
                        </div> <!-- footer -->
                    </div> <!-- card -->
                <?php } ?>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
        <!-- <script type="text/javascript">
            function endexam(){
                alert("Hello friends, this is message.");
            }
        </script> -->