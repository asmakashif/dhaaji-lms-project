<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Review Activity</li>
                </ol>
            <h1 class="h2">Student Activity</h1>
                <div class="search-form search-form--light mb-3">    
                    <input type="text" class="form-control search" placeholder="Search with Student id/Name">
                    <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                </div>
             
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="h2 mb-0 mr-3 text-primary">116</div>
                                <div class="flex">
                                    <h4 class="card-title">Popular Topics</h4>
                                    <p class="card-subtitle">Best score</p>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle text-black-70" data-toggle="dropdown">Subjects</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="" class="dropdown-item">Subjects</a>
                                        <a href="" class="dropdown-item">Mathematics</a>
                                        <a href="" class="dropdown-item">Physics</a>
                                        <a href="" class="dropdown-item">Chemistry</a>
                                        <a href="" class="dropdown-item">Biology</a>
                                         
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart" style="height: 319px;">
                                    <canvas id="topicIqChart" class="chart-canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">

                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="h2 mb-0 mr-3 text-primary">432</div>
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
                    </div>
                </div>


        </div>
    </div>
        <?php $this->load->view('include1/sidebar');?>

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
        labels: ["Physics", "Chemistry", "Maths", "Biology"],
        datasets: [{
            label: "Experience IQ",
            data: [30, 35, 33, 32],
            pointHoverBorderColor: settings.colors.success[400],
            pointHoverBackgroundColor: settings.colors.white,
            borderJoinStyle: 'bevel',
            lineTension: .1
        }]
    }

    Charts.create(id, type, options, data)
}

// Create Chart
WeekIQChart('#iqChart')
TopicIQChart('#topicIqChart')

})()
</script>