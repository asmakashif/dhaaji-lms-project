<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/');?>">Home</a></li>
                    <li class="breadcrumb-item active">Quiz</li>
                </ol>
                <h1 class="h2">Quiz</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Quiz Sheet</h4>
                    </div>
                    <div class="card-body">
                        <div class="panel-heading">
                            <a href="<?php echo base_url('admin_controller/examination/addQuiz');?>" style="text-decoration:none;"><button type="button" class="btn btn-primary">Add</button></a>
                            <!-- <a class="js-open-modal" data-modal-id="popup3"><button type="button" class="btn btn-danger">Remove</button></a> -->
                        </div>
                        &nbsp;
                        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th >Quiz Title</th>
                                        <th style="width: 100px;">Quiz_Question</th>
                                        <th style="width: 50px;">Choice 1</th>
                                        <th style="width: 50px;">Choice 2</th>
                                        <th style="width: 50px;">Choice 3</th>
                                        <th style="width: 50px;">Choice 4</th>
                                        <th style="width: 50px;">Correct Answer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="search">
                                    <?php
                                    foreach($quiz as $q){?>
                                        <tr>
                                            <td><?php echo $q->quiz_id;?></td>
                                            <td><?php echo $q->chapters_name; ?></td>
                                            <!-- <td lang="latex"><?php echo $q->question; ?></td> -->
                                            <td lang="MathJax" style="word-wrap: break-word"><?php echo $q->question; ?></td>
                                            <td lang="MathJax"><?php echo $q->choice1; ?></td>
                                            <td lang="MathJax"><?php echo $q->choice2; ?></td>
                                            <td lang="MathJax"><?php echo $q->choice3; ?></td>
                                            <td lang="MathJax"><?php echo $q->choice4; ?></td>
                                            <td><?php echo $q->answer; ?></td>
                                            <!-- <td>
                                                <a href="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                            </td> -->
                                            <td>
                                                <a href="<?php echo base_url('admin_controller/examination/deleteQuiz/'.$q->quiz_id);?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar')?>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
        <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
        <script type="text/javascript"
  async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
        <!-- <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script> -->
        <!-- <script>
MathJax = {
  tex: {
    inlineMath: [['$', '$'], ['\\(', '\\)']]
  }
};
</script>
<script id="MathJax-script" async
  src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
</script> -->