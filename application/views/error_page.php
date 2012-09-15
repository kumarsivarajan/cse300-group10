<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile) ?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
	<h1><center>oops something is Wrong !!<center></h1>
		<div id="body">		
			<p> <b><center>Name or Roll Number doesn't exist<center> <b></p>
			<a href="<?php echo site_url('Welcome/name_rollno'); ?>"><p>Go back and Try again !!</p></a>
		</div>
		
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>

	</div>

</div>

</body>
</html>