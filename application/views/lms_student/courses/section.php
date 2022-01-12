
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/index');?>">Courses</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/curriculum_courses');?>">Curriculum Courses</a></li>
                    <li class="breadcrumb-item active">Take Course</li>
                </ol>
                <?php if($this->session->userdata('plan_name') =='Full Course'){ ?>
                    <h1 class="h2">Take Course</h1>
                    <div class="row">
                        <div class="col-md-8">
                            <div id="video" class="embed-responsive embed-responsive-16by9">
                                <video id="videoarea" class="embed-responsive-item" allowfullscreen="" controls controlsList="nodownload" src="" type="video/mp4"></video>
                                <input type="hidden" id="firstTimeLoading" value="0">
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    For viewing the course from the place it was viewed last, please click the Play/Pause button, before you move out of the current course
                                </div>
                                <div id="status" class="incomplete" style="display: none">
                                    <span>Play status: </span>
                                    <span class="status complete">COMPLETE</span>
                                    <span class="status incomplete">INCOMPLETE</span>
                                    <br />
                                    <span id="played">0</span>  
                                    <span id="duration"></span>
                                </div>
                                <div>

                                </div>
                            </div>

                            &nbsp;
                            <!-- Lessons -->
                            <?php $count=1;
                            foreach($section_data as $row){?>
                                <ul class="card list-group list-group-fit" onClick="playlist();" id="playlist">
                                    <li class="list-group-item" id="<?php echo $row->section_id; ?>" src="<?php echo base_url().'uploads/videos/'. $row->video_path;?>" ><?php echo $count++; ?>&nbsp; &nbsp;<?php echo $row->section_name; ?></li>
                                    <small class="text-muted-light"><?php echo date('i:s', strtotime($row->video_time))?> </small>
                                </ul>
                                <?php
                            }
                            ?>
                            <?php foreach($chapter_data as $cd){?>
                                <ul class="card list-group list-group-fit">
                                    <li class="list-group-item"><a href="<?php echo base_url('student_controller/quiz/take_quiz/'.$cd->chapters_id);?>" style="color:yellowgreen;text-decoration:none;">Take Quiz</a></li>
                                </ul>
                                <?php
                            }
                            ?> 
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo base_url().'student_controller/course/download/'.$chapters_id; ?>" class="btn btn-primary btn-block flex-column">
                                        <i class="material-icons">get_app</i> Physical Test Paper
                                    </a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Course Material</h4>
                                </div>
                                <div class="card-body">
                                    <?php foreach($chapter_data as $cd){?>
                                        <a target="_blank" href="<?php echo base_url('student_controller/course/viewPDF/'.$cd->chapters_id);?>" class="btn btn-primary">View Material</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <a href="<?php echo base_url('student_controller/student_dashboard/get_help');?>" class="btn btn-default btn-block">
                                <i class="material-icons btn__icon--left">help</i> Get Help
                            </a>
                        </div>
                    </div>
                <?php } else{ ?>
                    <h1 class="h2">Take Quiz</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Download Test Paper</h4>
                                </div>
                                <div class="card-body">
                                    <a href="<?php echo base_url().'student_controller/course/download/'.$chapters_id; ?>" class="btn btn-primary btn-block flex-column">
                                        <i class="material-icons">get_app</i> Physical Test Paper
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Take Quiz</h4>
                                </div>
                                <div class="card-body">
                                    <?php foreach($chapter_data as $cd){?>
                                        <a href="<?php echo base_url('student_controller/quiz/take_quiz/'.$cd->chapters_id);?>" class="btn btn-primary btn-block flex-column">
                                            <i class="material-icons">play_circle_outline</i>Start
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <a href="<?php echo base_url('student_controller/student_dashboard/get_help');?>" class="btn btn-default btn-block">
                                <i class="material-icons btn__icon--left">help</i> Get Help
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#playlist li").on("click", function() {
                    $("#videoarea").attr({
                        "src": $(this).attr("src"),
                        "autoplay": "autoplay"
                    })
                })
                $("#videoarea").attr({
                    "src": $("#playlist li").eq(0).attr("src")
                })
            })

            $("#playlist li").on("click", function() 
            {
                var section_id=$(this).attr("id");
                var chapters_id="<?php echo $chapters_id?>";
                $('#played').html('0');
                $('#firstTimeLoading').val('1');
                var video = document.getElementById("videoarea");
                var timeStarted = -1;
                var timePlayed = 0;
                var duration = 0;
// If video metadata is laoded get duration
if(video.readyState > 0)
    getDuration.call(video);
//If metadata not loaded, use event to get it
else
{
    video.addEventListener('loadedmetadata', getDuration);
}
// remember time user started the video
function videoStartedPlaying() { 
    timeStarted = new Date().getTime()/1000;
}
function videoStoppedPlaying(event) {
    if(timeStarted>0) {
        var playedFor = new Date().getTime()/1000 - timeStarted;
        timeStarted = -1;
// add the new ammount of seconds played
timePlayed+=playedFor;
}
document.getElementById("played").innerHTML = Math.round(timePlayed)+"";
// Count as complete only if end of video was reached
if(event.type=="ended") {
    document.getElementById("status").className="complete";
    var flag='complete';
    $.post('<?php echo base_url('student_controller/course/WatchingTrackeringVideo');?>', {section_id:section_id,chapters_id:chapters_id,timePlayed:timePlayed,flag:flag}, function(response){ 
        console.log(response);             
    });
}else{
    $.post('<?php echo base_url('student_controller/course/WatchingTrackeringVideo');?>', {section_id:section_id,chapters_id:chapters_id,timePlayed:timePlayed}, function(response){ 
        console.log(response);             
    });
}
}

function getDuration() {
    duration = video.duration;
    document.getElementById("duration").innerHTML=Math.round(duration)+"";
    console.log("Duration: ", duration);
}

video.addEventListener("play", videoStartedPlaying);
video.addEventListener("playing", videoStartedPlaying);

video.addEventListener("ended", videoStoppedPlaying);
video.addEventListener("pause", videoStoppedPlaying);
});
            $(function() 
            { 
                var chapters_id="<?php echo $chapters_id;?>";
                var section_id="<?php echo $section_id;?>";
                var video = document.getElementById("videoarea");
                var timeStarted = -1;
                var timePlayed = 0;
                var duration = 0;
// If video metadata is laoded get duration
if(video.readyState > 0)
    getDuration.call(video);
//If metadata not loaded, use event to get it
else
{
    video.addEventListener('loadedmetadata', getDuration);
}
// remember time user started the video
function videoStartedPlaying() { 
    timeStarted = new Date().getTime()/1000;
}
function videoStoppedPlaying(event) {
    if(timeStarted>0) {
        var playedFor = new Date().getTime()/1000 - timeStarted;
        timeStarted = -1;
// add the new ammount of seconds played
timePlayed+=playedFor;
}
document.getElementById("played").innerHTML = Math.round(timePlayed)+"";
// Count as complete only if end of video was reached
var firstTimeLoading=$('#firstTimeLoading').val();
if(timePlayed>=duration && event.type=="ended") {
    document.getElementById("status").className="complete";
    if(firstTimeLoading== '0'){
        var flag='complete';
        $.post('<?php echo base_url('student_controller/course/WatchingTrackeringVideo');?>', {section_id:section_id,chapters_id:chapters_id,timePlayed:timePlayed,flag:flag}, function(response){ 
            console.log(response);             
        });
    }
}else{
    if(firstTimeLoading == '0'){
        $.post('<?php echo base_url('student_controller/course/WatchingTrackeringVideo');?>', {section_id:section_id,chapters_id:chapters_id,timePlayed:timePlayed}, function(response){ 
            console.log(response);             
        });
    }
}
}

function getDuration() {
    duration = video.duration;
    document.getElementById("duration").innerHTML=Math.round(duration)+"";
    console.log("Duration: ", duration);
}

video.addEventListener("play", videoStartedPlaying);
video.addEventListener("playing", videoStartedPlaying);

video.addEventListener("ended", videoStoppedPlaying);
video.addEventListener("pause", videoStoppedPlaying);

})        
</script>
<script type="text/javascript">
    function playlist() {
        window.location.href = '#video';
    }
</script>
<style type="text/css">
    #playlist li
    {
        color:yellowgreen;
        cursor:pointer;
    }
    #playlist li:hover
    {
        color:yellowgreen;
    }
</style>

<style type="text/css">
    #status span.status {
        display: none;
        font-weight: bold;
    }
    span.status.complete {
        color: green;
    }
    span.status.incomplete {
        color: red;
    }
    #status.complete span.status.complete {
        display: inline;
    }
    #status.incomplete span.status.incomplete {
        display: inline;
    }
</style>
<script type="text/javascript">
    $(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
            e.stopPropagation();
        });
    }); 
</script> 
<script type="text/javascript">
    document.onmousedown = disableRightclick;
    var message = "Right click not allowed !!";
    function disableRightclick(evt)
    {
        if(evt.button == 2)
        {
            alert(message);
            return false;    
        }
    }

    function disableContextMenu()
    {
        window.frames["fraDisabled"].document.oncontextmenu = function(){alert("No way!"); return false;};
    }  

</script>
<script src="<?php echo base_url('assets/js/');?>pdfobject.min.js"></script>
<script>
    document.querySelector(".embed-link").addEventListener("click", function (e){

        e.preventDefault();

        this.setAttribute("class", "hidden");

        var options = {
            height: "400px",
            pdfOpenParams: {
                pagemode: "thumbs",
                navpanes: 0,
                toolbar: 0,
                statusbar: 0,
                view: "FitV"
            }
        };

        var myPDF = PDFObject.embed("<?=base_url('uploads/material/'.$pdfdown->course_material)?>", "#pdf", options);

        var el = document.querySelector("#results");
        el.setAttribute("class", (myPDF) ? "success" : "fail");
        el.innerHTML = (myPDF) ? "PDFObject successfully added an &lt;embed> element to the page!" : "Uh-oh, the embed didn't work.";

    });
</script>

<script>     
    if(navigator.userAgent.indexOf("Edge")!=-1) {

        var txt ="Edge Browser detected . To get better experience open the website in chrome";
        $(this).css("textAlign", "center");

        var IE=document.createElement('div');
        IE.setAttribute("style", "width:100%;height:100%;zindex:9999;text-align:center; background:rgba(240,240,240,.7); position: fixed; top:0px; left:0px;");

        var label = document.createElement('label');
        label.innerHTML = txt;
        IE.appendChild(label);
        document.body.appendChild(IE);      
    }
</script>
