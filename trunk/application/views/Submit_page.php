<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="<?php echo base_url(); ?>favicon2.png" type="image/png">
	<meta charset="utf-8">
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile) ?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
	<h1><center>Application Submitted<center></h1>
		<div id="body">		
			<strong> &nbsp &nbsp Distance: </strong><?php echo $dist;?><br>
	
			<p> <b><center>Keep on checking for allocation updates<center> <b></p>
			
		</div>
		
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>

	</div>

</div>

</body>
</html>