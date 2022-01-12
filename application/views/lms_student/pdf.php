<!DOCTYPE HTML>
<HTML>
<TITLE>Course Material</TITLE>
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 

<BODY>
	<?php
	if(!empty($pdfdown)){ ?>
		<object style="width:100%;height:100vh;" data="https://docs.google.com/gview?embedded=true&url=<?=base_url('uploads/files/'.$pdfdown->course_material)?>#toolbar=0"></object>
	<?php }
	?>
</BODY>
</HTML>
<script>
Tools.Tool.prototype.contextMenu = function(e) {
    e.preventDefault();
};
ReaderControl.prototype.setContextMenu = function() {};
</script>