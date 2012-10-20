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
		<h1><center>Database Info Verification</center></h1>
		
		<div class="db_info-info">
		<i>Name and Roll Number exist in the system</i> <br/><br />
		
		Name: <b><?php echo $firstname; ?></b><br />
		Roll No.: <b><?php echo $roll; ?></b><br />
		<!--Address: <b><?php echo $address ; ?></b><br /><br />-->
		E-mail ID: <b><?php echo $email ;?></b><br /> 
	
		Location: <b><?php echo $location ; ?></b><br />
		Program: <b><?php if ($program == 1) {echo "M. Tech";}
						 elseif ($program == 0){echo "B. Tech";}
						 else {echo "Phd";}?></b><br />
		Gender: <b><?php if($gender==0){echo "Male";}
							else{echo "Female";}
						?></b><br />
		Room Preference1: <b><?php if ($room_preference1 == 0) {echo "Single";}
						 elseif ($room_preference1 == 1){echo "Double";}
						 else {echo "Triple";} ?></b><br />
		Room Preference2: <b><?php if ($room_preference2 == 0) {echo "Single";}
						 elseif ($room_preference2 == 1){echo "Double";}
						 else {echo "Triple";} ?></b><br /><br />
		
		<button onclick="location.href='<?php echo site_url('Welcome/email_user');?>'">Proceed</button>
		&nbsp<button onClick="history.go(-1);return true;">Go back</button><br />
		</div>
		</br>
	</div>
</div>

</body>
</html>	