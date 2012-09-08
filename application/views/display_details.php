<html>
<head>

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach;?>
</head>
<body>
<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
		Hi <?php echo $name; ?>.<br />
		You are roll no. <?php echo $roll; ?>.<br />
		your course is <?php echo $course; ?>.<br />
		Your Prefer <?php echo $room_preference; ?>.<br />
	</div>
	</div>
</body>
</html>

