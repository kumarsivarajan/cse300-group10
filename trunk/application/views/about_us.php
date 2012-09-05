<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	<title>Welcome to Hostel Allocation System - <?php echo $ins_name ?></title>
</head>
<body>

<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
	<h1><center>Welcome to Hostel Allocation System - IIIT-D!<center></h1>
		<div><h2>About Us</h2></div>
		<div id="text">
		This site created under the Software Enginnering Project. The project members are - praneet, kunal, mayank, sushant, manik, aditya, anirudh, karan, raghav
		</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>