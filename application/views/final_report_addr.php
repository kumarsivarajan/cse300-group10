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
		<br /><br />
		
		
		
		&nbsp &nbsp Your report has been successfully submitted. The administrator will get in touch with you soon.
	
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

