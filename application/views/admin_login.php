<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin - Hostel Allocation System - <?php echo $ins_name ?></title>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile) ?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="login_bar">
		<div id="body">
			<?php echo form_open('Admin/validate','');?>
			<?php
				foreach($form_elem as $elem) 
					echo form_input_formatted($elem);?>
			<?php echo form_close();?>
			</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>