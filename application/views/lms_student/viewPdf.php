<html>
<head>
<title>Disable Context Menu</title>
<script type="text/jscript">
  function disableContextMenu()
  {
    window.frames["fraDisabled"].document.oncontextmenu = function(){alert("No way!"); return false;};   
    // Or use this
    // document.getElementById("fraDisabled").contentWindow.document.oncontextmenu = function(){alert("No way!"); return false;};;    
  }  
</script>
</head>
<body bgcolor="#FFFFFF" onload="disableContextMenu();" oncontextmenu="return false">
	<?php
	if(!empty($pdfdown)){ ?>
		<iframe id="fraDisabled" width="100%" height="580" src="<?php echo base_url('uploads/material/'.$pdfdown->course_material);?>#toolbar=0&navpanes=0&scrollbar=0"></iframe>
	<?php }
	?>
<div style="width:100%;height:580px;background-color:transparent;position:absolute;top:0px;">
</body>
</html>