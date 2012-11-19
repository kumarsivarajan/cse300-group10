<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="<?php echo base_url(); ?>favicon2.png" type="image/png">
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	
<?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	 <?php endforeach; ?>
 <script>
    $(function() {
        $( "#deadline" ).datepicker({ dateFormat: "dd-mm-yy" });
    });
    </script>
	<title>Hostel Allocation - Backend</title>

</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	<div class="admin-contentbar">
	<h2>Manage Applications</h2>
	<div ><?php echo $msg;?></div>
	<!-- This where you write you code-->
	<!-- Test 123  -->
	<div class="centeredBox">
	<?php echo generate_form_nostyle('Admin_view/managehostelConfig',$form_elem,$form_attr);?>
	</div>
		
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>