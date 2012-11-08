<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	<title>Formatting user address</title>
</head>
<body>

<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
	<h1>
	<center>
	Hostel Allocation System - IIIT-D
	<br>
	</center>
	</h1>
	</div>
		<div><h2>Please format your address according to the instructions given below</h2></div>
<div id="text">
You have modified the address incorrectly. Please format it according to the given instructions only.<br>
<br>
		<button onclick="location.href='<?php echo site_url('Welcome/format_address');?>'">Go back</button>
</div>
