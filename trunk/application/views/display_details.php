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
		Course: <b><?php if ($course == 0) {echo "M. Tech";}
						 elseif ($course == 1){echo "B. Tech";}
						 else {echo "Phd";}?></b><br />
		Room Preference: <b><?php if ($room_preference == 0) {echo "Single";}
						 elseif ($course == 1){echo "Double";}
						 else {echo "Triple";} ?></b><br />
		Address: [will be taken from db] <br /><br />
		
		<button>Proceed</button>
		&nbsp<button>Report</button>
		
		
	</div>
	</div>
</body>
</html>

