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
		<?php echo generate_form('Welcome/add_report_to_db',$form_elem,$form_attr);?>
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

