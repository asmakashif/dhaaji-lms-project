<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_controller/admin_dashboard/')?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <h1 class="h2">Dashboard</h1>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <!-- <div class="h2 mb-0 mr-3 text-primary">116</div> -->
                                <div class="flex">
                                    <h4 class="card-title">Popular Topics</h4>
                                    <p class="card-subtitle" style="color:#2196f3">Select Class to view student performance</p>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle text-black-70" data-toggle="dropdown">Class</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <?php
                                        foreach($class as $c){
                                            echo '<a href="#" class="dropdown-item classid" id='.$c->id.'>'.$c->class_name.'</a>';
                                        }
                                    ?>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart" style="height: 319px;">
                                    <canvas id="classScoreChart" class="chart-canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">

                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <!-- <div class="h2 mb-0 mr-3 text-primary">432</div> -->
                                <div class="flex">
                                    <h4 class="card-title">Time Spent Learning</h4>
                                    <p class="card-subtitle">4 days streak this week</p>
                                </div>
                                <i class="material-icons text-muted ml-2">trending_up</i>
                            </div>
                            <div class="card-body">
                                <div class="chart" style="height: 154px;">
                                    <canvas id="iqChart" class="chart-canvas"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="card-title">Forum Activity</h4>
                                        <p class="card-subtitle">Latest forum topics &amp; replies</p>
                                    </div>
                                    <div class="media-right">
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin_controller/ResponseController/students_response');?>"> <i class="material-icons">keyboard_arrow_right</i></a>
                                    </div>
                                </div>
                            </div>
                            <?php foreach($fetchComment as $value){ ?>
                                <ul class="list-group list-group-fit">
                                    <li class="list-group-item forum-thread">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <div class="forum-icon-wrapper">
                                                    <a href="fixed-student-forum-thread.html" class="forum-thread-icon">
                                                        <i class="material-icons">description</i>
                                                    </a>
                                                    <a href="fixed-student-profile.html" class="forum-thread-user">
                                                        <img src="<?php echo base_url('');?>assets/images/avatar.png" alt="" width="20" class="rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="panel-header" align="left">
                                                    <?php echo $value['comment_title']; ?></strong></a>
                                                </div>
                                                <div class="panel-header" align="right">
                                                    <small>By <?php echo $value['firstname'];?>On </small>
                                                    <small class="ml-auto text-muted"><?php echo date('d-m-Y', strtotime($value['commented_date']))?></small>
                                                </div>
                                                <a class="text-black-70" href="fixed-student-forum-thread.html"><?php echo $value['comment_details']; ?></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar');?>
        <script>
     IQchartdata('','');
    Weekchartdata('','');
    function search(){
        var sid =$("#sid").val();
        var baseurl ="<?php echo base_url('');?>";        
        $.ajax({
            type: "POST",
            url: baseurl+"admin_controller/Admin_dashboard/getPoints",
            data: {sid:sid},
            success: function (response) {
                           //console.log(response);                             
                 var rep= JSON.parse(response);
                console.log(rep);
                var s=rep.pd;
                var wk = rep.wd;
                 IQchartdata(sid,s);
                 Weekchartdata(sid,wk);
            },error:function(x){
                console.log(x);
            }
        });
    }
   
    function IQchartdata(sid,s){
        // console.log(values);
        Chart.defaults.global.responsive=true;
        new Chart(document.getElementById("topicIqChart"),
            {
                "type":"radar",
                "responsive":true,
                "data":
                {
                "labels":<?php echo $courses;?>,
                "datasets":[
                    {
                    "label":"Student ID "+ sid + " Score ",
                    "data":s,
                    "fill":true,
                    "backgroundColor":"rgba(255, 99, 132, 0.2)",
                    "borderColor":"rgb(255, 99, 132)",
                    "pointBackgroundColor":"rgb(255, 99, 132)",
                    "pointBorderColor":"#fff",
                    "pointHoverBackgroundColor":"#fff",
                    "pointHoverBorderColor":"rgb(255, 99, 132)"
                    }
                    ]
                },
                    "options":
                    {
                        "elements":
                            {
                                "line":
                                {
                                    "tension":0,
                                    "borderWidth":3
                                }
                            }
                    }
            });

    }


    function Weekchartdata(sid,s){
        // console.log(values);
        
        new Chart(document.getElementById("iqChart"),
            {
                "type":"line",
                "responsive":true,
                "data":
                {
                    "labels":["Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday"],
                "datasets":[
                    {
                    "label":"Student ID "+ sid+" Time Spent in Minutes",
                    "data":s,
                    "fill":true,
                    "backgroundColor":"rgba(255, 99, 132, 0.2)",
                    "borderColor":"rgb(255, 99, 132)",
                    "pointBackgroundColor":"rgb(255, 99, 132)",
                    "pointBorderColor":"#fff",
                    "pointHoverBackgroundColor":"#fff",
                    "pointHoverBorderColor":"rgb(255, 99, 132)"
                    }
                    ]
                },
                    "options":
                    {
                        "elements":
                            {
                                "line":
                                {
                                    "tension":0,
                                    "borderWidth":3
                                }
                            }
                    }
            });
    }
    </script>