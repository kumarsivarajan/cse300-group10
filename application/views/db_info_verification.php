<html>
<head>
<link rel="icon" href="<?php echo base_url(); ?>favicon3.png" type="image/png">
<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
		<h1><center>Database Verification</center></h1>
		Name: <b><?php echo $name; ?></b><br />
		Roll No.: <b><?php echo $roll; ?></b><br />
		Course: <b><?php if ($course == 0) {echo "M. Tech";}
						 elseif ($course == 1){echo "B. Tech";}
						 else {echo "Phd";}?></b><br />
		Room Preference 1: <b><?php if ($room_preference1 == 0) {echo "Single";}
						 elseif ($room_preference1 == 1){echo "Double";}
						 else {echo "Triple";} ?></b><br />
		Room Preference 2: <b><?php if ($room_preference2 == 0) {echo "Single";}
						 elseif ($room_preference2 == 1){echo "Double";}
						 else {echo "Triple";} ?></b><br />
		Address: [Will be taken fron the database]<br /><br />
		
		
		<button>Proceed</button>
		&nbsp<button>Report</button>
		
		
	</div>
	</div>
</body>
</html>

