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
		<br /><br />
		
		<?php if($check==true): ?>
		
		&nbsp &nbsp You have successfully reported against 
		
		<b><?php echo $roll ?></b>. Your Report - <b>"<?php echo $comment ?>"</b>
		
		<?php else: ?>
		
		&nbsp &nbsp The roll number you entered has not applied for the hostel
		
		<?php endif;?>
		<!--<h1><center>Report Issue</center></h1>
		<form method="post" action="">
		<textarea name="Report issue" cols="50" rows="10">
		Enter your comments here...
		</textarea><br>
		<input type="submit" value="Submit" />
		</form>
		</br> -->
		

		
		
		
	</div>
	</div>
</body>
</html>

