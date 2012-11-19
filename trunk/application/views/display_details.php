<html>
<head>
<link rel="icon" href="<?php echo base_url(); ?>favicon2.png" type="image/png">
<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
		<h1><center>Application Form Verification</center></h1>
		Name: <b><?php echo $name; ?></b><br />
		Roll No.: <b><?php echo $roll; ?></b><br />
		Location: <b><?php echo $location ; ?></b><br />
		Program: <b><?php if ($program == 1) {echo "M. Tech";}
						 elseif ($program == 0){echo "B. Tech";}
						 else {echo "Phd";}?></b><br />
		Gender: <b><?php if($gender==0){echo "Male";}
							else{echo "Female";}
						?></b><br />
		Room Preference 1: <b><?php if ($room_preference1 == 0) {echo "Single";}
						 elseif ($room_preference1 == 1){echo "Double";}
						 else {echo "Triple";} ?></b><br /><br />
		Room Preference 2: <b><?php if ($room_preference2 == 0) {echo "Single";}
						 elseif ($room_preference2 == 1){echo "Double";}
						 else {echo "Triple";} ?></b><br /><br />
		
		<button onclick="location.href='<?php echo site_url('Email_user');?>'">Proceed</button>
		&nbsp<button onClick="history.go(-1);return true;">Go back</button>
		</br>
		

		
		
		
	</div>
	</div>
</body>
</html>

