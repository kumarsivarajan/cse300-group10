<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="<?php echo base_url(); ?>/favicon2.png" type="image/png">
	<meta charset="utf-8">
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile) ?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
	<h1><center>Hostel Allocation Policy<center></h1>
		<div id="body">		
		
	<div id="text">
		
	<ul>
	<li>PhD scholars are allocated single rooms.</li>
	<li>20% of remaining seats for boys and girls (separately) will be allocated to MTech students.</li>
	<li>Remaining 80% of seats for boys and girls (separately) will be allocated to BTech students.</br>
	This ratio may be slightly altered if there are too many out of Delhi students.</li>
	<li>Seats are allocated to BTech and MTech students based on their farness from IIIT-D Okhla campus (students with home addresses that are far are given priority).</li>
	<li>Exceptions could be made for students with special needs on a case-by-case basis.</li>
	</br>
	
	Hostel related communications shall be done via only  hosteliiitd@gmail.com .E-mails sent to any other email id will not be entertained.
		
		
		</div>
		</div>
		
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>

	</div>

</div>

</body>
</html>