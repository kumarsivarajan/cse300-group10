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
		<i>Name and Roll Number exist in the system</i> <br/><br />
		Name: <b><?php echo $firstname; ?></b><br />
		Roll No.: <b><?php echo $roll; ?></b><br />
		<!--Address: <b><?php echo $address ; ?></b><br /><br />-->
		
	
		Location: <b><?php echo $location ; ?></b><br />
		Program: <b><?php if ($program == 1) {echo "M. Tech";}
						 elseif ($program == 0){echo "B. Tech";}
						 else {echo "Phd";}?></b><br />
		Gender: <b><?php if($gender==0){echo "Male";}
							else{echo "Female";}
						?></b><br />
		Room Preference: <b><?php if ($room_preference == 0) {echo "Single";}
						 elseif ($program == 1){echo "Double";}
						 else {echo "Triple";} ?></b><br /><br />
		
		<button onclick="location.href='<?php echo site_url('Email_user');?>'">Proceed</button>
		&nbsp<button onClick="history.go(-1);return true;">Go back</button><br />
		</br>
	</div>
</div>

</body>
</html>	