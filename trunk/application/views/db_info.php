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
		<h1><center>Database Info Verification</center></h1>
		
		<div class="db_info-info">
		<i>Name and Roll Number exist in the system</i> <br/><br />
		
		Name: <b><?php echo $app_info['first_name']; ?></b><br />
		Roll No.: <b><?php echo $app_info['roll_no']; ?></b><br />
		<!--Address: <b><?php echo $address ; ?></b><br /><br />-->
		E-mail ID: <b><?php echo $app_info['email'] ;?></b><br /> 
	
		Location: <b><?php echo $app_info['location'] ; ?></b><br />
		Program: <b><?php echo $app_info['program'] ; ?></b><br />
		Gender: <b><?php  echo $app_info['gender'] ; ?></b><br />
		Room Preference1: <b><?php echo $app_info['pref_1'] ;  ?></b><br />
		Room Preference2: <b><?php echo $app_info['pref_2'] ;  ?></b><br /><br />
		
		<button onclick="location.href='<?php echo site_url('Welcome/email_user');?>'">Proceed</button>
		&nbsp<button onClick="history.go(-1);return true;">Go back</button><br />
		</div>
		</br>
	</div>
</div>

</body>
</html>	