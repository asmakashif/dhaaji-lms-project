<?php 
    // var_dump($students_points);
    $d=array();$pointsarr =array(); 
    // var_dump($courses);
    $CI =& get_instance();
    $CI->load->model('Chart_model','cm',true);
    $alliqchart =[];
    foreach($studs as $s)
    {   $p=array();
        $colr =$CI->chartmodel->randomcolor();
    foreach($crse as $c){
        $pointsrow =$CI->chartmodel->getstudentPoints($s->id,$c->course_id);
        $point=isset($pointsrow->point) ? $pointsrow->point : 0;
        array_push($p,$point);        
    } 
   
       $res =array(
            'label'=> "Name :". $s->firstname." Id: " .$s->id ." Score ", 
            'data'=>$p,
            "fill"=>true,
            "backgroundColor"=>"rgb(".$colr.")",
            "borderColor"=>"rgb(".$colr.")",
            "pointBackgroundColor"=>"rgb(".$colr.")",
            "pointBorderColor"=>"#fff",
            "pointHoverBackgroundColor"=>"#fff",
            "pointHoverBorderColor"=>"rgb(".$colr.")"         
        );
        $alliqchart[]=$res;
    }
    
    
    // weekdata
   
    $weekchart =[];
    foreach($studs as $s)
    {   //echo $s->id."<br>";
         $weekdata=$CI->chartmodel->getTimespentbystudents($s->id);
        //print_r($weekdata);
        $dayarray=array_fill(0,7,0);
        // print_r($dayarray);
        if(isset($weekdata)){
            $time=array(); 
            foreach($weekdata as $w){
               $time[$w->day]=$w->minute;               
            }            
             $newarray=array_replace($dayarray,$time);
            //  print_r($newarray);
             //echo json_encode($newarray);
                //echo  json_encode(array_replace($dayarray,$time));
           $colr =$CI->chartmodel->randomcolor();
           $res =array(
            'label'=> "Name :". $s->firstname." Id: " .$s->id ." Time Spent in Minutes", 
            'data'=>$newarray,
            "fill"=>true,
            // "backgroundColor"=>"rgb(".$colr.")",
            // "borderColor"=>"rgb(".$colr.")",
            "pointBackgroundColor"=>"rgb(".$colr.")",
            "pointBorderColor"=>"#fff",
            "pointHoverBackgroundColor"=>"#fff",
            "pointHoverBorderColor"=>"rgb(".$colr.")"         
            );
         $weekchart[]=$res;
           
        }        
        
    }
    //echo json_encode($seconds);
    //echo json_encode($weekchart);
    
    
?>

</div>



<!-- jQuery -->
<script src="<?php echo base_url('');?>assets/vendor/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url('');?>assets/vendor/popper.min.js"></script>
<script src="<?php echo base_url('');?>assets/vendor/bootstrap.min.js"></script>

<!-- Perfect Scrollbar -->
<script src="<?php echo base_url('');?>assets/vendor/perfect-scrollbar.min.js"></script>

<!-- MDK -->
<script src="<?php echo base_url('');?>assets/vendor/dom-factory.js"></script>
<script src="<?php echo base_url('');?>assets/vendor/material-design-kit.js"></script>

<!-- App JS -->
<script src="<?php echo base_url('');?>assets/js/app.js"></script>

<!-- Highlight.js -->
<script src="<?php echo base_url('');?>assets/js/hljs.js"></script>

<!-- App Settings (safe to remove) -->
<script src="<?php echo base_url('');?>assets/js/app-settings.js"></script>






<!-- Global Settings -->
<script src="<?php echo base_url('');?>assets/js/settings.js"></script>

<!-- Moment.js -->
<script src="<?php echo base_url('');?>assets/vendor/moment.min.js"></script>
<script src="<?php echo base_url('');?>assets/vendor/moment-range.min.js"></script>

<!-- Chart.js -->
<script src="<?php echo base_url('');?>assets/vendor/Chart.min.js"></script>

<!-- UI Charts Page JS -->
<script src="<?php echo base_url('');?>assets/js/chartjs-rounded-bar.js"></script>
<script src="<?php echo base_url('');?>assets/js/chartjs.js"></script>

<!-- Chart.js Samples -->
<script>
    (function() {
        'use strict';

        Charts.init()

        var earnings = []

// Create a date range for the last 7 days
var start = moment().subtract(6, 'days').format('YYYY-MM-DD') // 7 days ago
var end = moment().format('YYYY-MM-DD') // today
var range = moment.range(start, end)

// Create the earnings graph data
// Iterate the date range and assign a random ($) earnings value for each day
range.by('days', function(moment) {
    earnings.push({
        y: Math.floor(Math.random() * 200) + 15,
        x: moment.toDate()
        
    })
})


var WeekIQChart = function(id, type = 'line', options = {}) {
    options = Chart.helpers.merge({
        elements: {
            point: {
                pointStyle: 'circle',
                radius: 4,
                hoverRadius: 5,
                backgroundColor: settings.colors.white,
                borderColor: settings.colors.primary[500],
                borderWidth: 2
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    display: false
                }
            }],
            xAxes: [{
                gridLines: {
                    display: false
                },
                type: 'time',
                distribution: 'series',
                time: {
                    unit: 'day',
                    stepSize: 1,
                    autoSkip: false,
                    displayFormats: {
                        day: 'dd'
                    }
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(a, e) {
                    var t = e.datasets[a.datasetIndex].label || "",
                    o = a.yLabel,
                    r = "";
                    return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">' + o + " points</span>"
                }
            }
        }
    }, options)

    var data = {
        datasets: [{
            label: "Experience IQ",
            data: earnings,
            pointHoverBorderColor: settings.colors.success[400],
            pointHoverBackgroundColor: settings.colors.white
        }]
    }

    Charts.create(id, type, options, data)
}

var TopicIQChart = function(id, type = 'radar', options = {}) {
    options = Chart.helpers.merge({
        elements: {
            point: {
                pointStyle: 'circle',
                radius: 4,
                hoverRadius: 5,
                backgroundColor: settings.colors.white,
                borderColor: settings.colors.primary[500],
                borderWidth: 2
            }
        },
        events:[],
        scale: {
            ticks: {
                display: false,
                beginAtZero: true,
                maxTicksLimit: 4
            },
            gridLines: {
                color: settings.colors.gray[300]
            },
            angleLines: {
                color: settings.colors.gray[300]
            },
            pointLabels: {
                fontSize: 14
            }
        },
        tooltips: {
            callbacks: {
                label: function(a, e) {
                    var t = e.datasets[a.datasetIndex].label || "",
                    o = a.yLabel,
                    r = "";
                    return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">' + o + " points</span>"
                }
            }
        }
    }, options)

    var data = {
        labels: <?php echo $courses;?>,
        datasets: <?php echo json_encode($alliqchart);?>
    }

    Charts.create(id, type, options, data)
}

// Create Chart
WeekIQChart('#iqChart1')
TopicIQChart('#topicIqChart')

})()
</script>
<script>
new Chart(document.getElementById("iqChart"),
            {
                "type":"line",
                "responsive":true,
                "data":
                {
                "labels":["Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday"],
                "datasets": <?php echo json_encode($weekchart); ?>,
                    },
                    "options":
                    {
                       events:[],
                        "elements":
                            {
                                point: {
                            pointStyle: 'circle',
                            radius: 4,
                            hoverRadius: 5,
                            backgroundColor: settings.colors.white,
                            borderColor: settings.colors.primary[500],
                            borderWidth: 2
                        }
                                // "line":
                                // {
                                //     "tension":0,
                                //     "borderWidth":3
                                // }
                            }
                    }
            });
            //console.log('<?php echo json_encode($weekchart); ?>');
</script>
<script>
$('.classid').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseurl ="<?php echo base_url('');?>";   
    $.ajax({
        type:"POST",
        url: baseurl+"admin_controller/Admin_dashboard/getScorebyclassid",
        data: {classid:id},
        success: function (response) {
            console.log(response);
            var rep =JSON.parse(response);
            new Chart(document.getElementById("classScoreChart"),
            {
                "type":"radar",
                "responsive":true,
                "data":
                {
                "labels":<?php echo $courses;?>,
                "datasets": rep ,
                    },
                    "options":
                    {
                        events:[],
                        "elements":
                            {
                                point: {
                            pointStyle: 'circle',
                            radius: 4,
                            hoverRadius: 5,
                            backgroundColor: settings.colors.white,
                            borderColor: settings.colors.primary[500],
                            borderWidth: 2
                        }
                                // "line":
                                // {
                                //     "tension":0,
                                //     "borderWidth":3
                                // }
                            }
                    }
            });
            
        }
    });
});
</script>

</body>

</html>