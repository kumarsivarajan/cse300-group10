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
		<p>This project is created with the intention to help institutes in the process of hostel allocation to students using distance as the primary measurement.
		The team aims at building a highly scalable and generic software which will allow custom data entry and custom allotment parameters.
		The project members are - praneet, kunal, mayank, sushant, manik, aditya, anirudh, karan, raghav</p>
		</div>
		<div id="text"><h3>About The System</h3>
		<div>
		<p>       When ready this software will facilitate: </p>
		<ul>
		<li>Registration form : Students can apply remotely through www.</li>
		<li>Allocation : Software will try to allocate students based on distance</li>
		<li>Administration : An authorised administrator can approve or disapprove the allotment.</li>
		<li>Status : A status report visible on the front-end.</li>
		<li>Anonymous Reporting : Anybody can report false data entered by some student anonymously .</li>
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>