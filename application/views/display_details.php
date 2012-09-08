<html>
<head>

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2" style="padding-left: 20px;padding-bottom: 10px">
		<h1><center>Database Info Verification</center></h1>
		Name: <b><?php echo $name; ?></b><br />
		Roll No.: <b><?php echo $roll; ?></b><br />
		Course: <b><?php echo $course; ?></b><br />
		Room Preference: <b><?php echo $room_preference; ?></b><br />
		Address: [will be taken from db] <br /><br />
		
		<button>Proceed</button>
		&nbsp<button>Report</button>
		
		
	</div>
	</div>
</body>
</html>

