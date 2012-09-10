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
		<h1><center>Application Form Verification</center></h1>
		Name: <b><?php echo $name; ?></b><br />
		Roll No.: <b><?php echo $roll; ?></b><br />
		Course: <b><?php if ($course == 0) {echo "M. Tech";}
						 elseif ($course == 1){echo "B. Tech";}
						 else {echo "Phd";}?></b><br />
		Room Preference: <b><?php if ($room_preference == 0) {echo "Single";}
						 elseif ($course == 1){echo "Double";}
						 else {echo "Triple";} ?></b><br /><br />
		
		<button>Proceed</button>
		&nbsp<button onclick="parent.location='<?php echo site_url('Welcome/name_rollno'); ?>'">Go back</button>
		</br>
		

		
		
		
	</div>
	</div>
</body>
</html>

