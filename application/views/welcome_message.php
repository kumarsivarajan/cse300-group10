<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Hostel Allocation System - <?php echo $ins_name ?></title>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile) ?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
	<h1><center>Welcome to Hostel Allocation System - <?php echo $ins_name ?>!<center></h1>
		<div id="body">		
			<!-- <?php if(isset($cust_msg)):?>
		
			<p> <?php echo $cust_msg ?>
			<?php endif?> -->
			<p>Todays is <?php echo $date?></p>
		</div>
		
		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>