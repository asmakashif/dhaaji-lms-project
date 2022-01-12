<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
<div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
<div class="mdk-drawer-layout__content page ">
   <div class="container-fluid page__container">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo base_url('student_controller/student_dashboard/index');?>">Home</a></li>
         <li class="breadcrumb-item"><a href="<?php echo base_url('shopping/index');?>">Courses</a></li>
         <li class="breadcrumb-item active">Continue Course</li>
      </ol>
      <h1 class="h2">Continue Course</h1>
      <div class="row">
         <div class="col-md-10">
            <?php
               if(!empty($cont_course)){ ?>
            <div class="embed-responsive embed-responsive-16by9">
               <video id="videoarea" class="embed-responsive-item" allowfullscreen="" controls="controls" src=""></video>
            </div>
            <div class="card">
               <div class="card-body">
               </div>
               <div id="status" class="incomplete" style="display: none">
                  <span>Play status: </span>
                  <span class="status complete">COMPLETE</span>
                  <span class="status incomplete">INCOMPLETE</span>
                  <br />
                  <span id="played"><?php echo $cont_course[0]->timePlayed;?></span>  
                  <span id="duration"></span>
               </div>
            </div>
            <!-- <div class="card">
               <?php $count=1;
                  foreach($section_data as $row){?>
                   
                       
                       
                       <?php echo $row->section_content; ?>
                   
                   
                <?php
                  }
                  ?>
               </div> -->
            <?php }else{ ?>
            <div class="alert alert-dismissible bg-success text-white border-0 fade show successmsg" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               Start new course to access this section <a style="color: red;" href="<?php echo base_url('shopping/index');?>">Click here</a>
            </div>
            <?php }
               ?>
            <!-- Lessons -->
            <div style="display: none">
               <?php foreach($cont_course as $row){?>
               <ul class="card list-group list-group-fit" id="playlist">
                  <li class="list-group-item" id="<?php echo $row->section_id; ?>" src="<?php echo base_url().'uploads/videos/'. $row->video_path.'#t='.$cont_course[0]->timePlayed;?>" ><?php echo $row->section_id; ?>&nbsp; &nbsp;<?php echo $row->section_name; ?>
               </ul>
               <?php
                  }
                  ?>
            </div>
         </div>
      </div>
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
   var chapters_id="<?php echo $cont_course[0]->chapter_id;?>";
   var section_id="<?php echo $cont_course[0]->section_id;?>";             
   var video = document.getElementById("videoarea");
   var timeStarted =-1;
   var timePlayed= parseInt($('#played').text());
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
</script>
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
       });
   }); 
</script>