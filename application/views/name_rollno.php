<html>
<head>
<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach; ?>
</head>
<body>
<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
		<form action="display_details" method="post">
			<p>Your name: <input type="text" name="name" /></p>
			<p>Your course: 
				<select name="course" size = "1">
					<option selected> B. tech</option>
					<option> M. tech</option>
					<option> P.hd</option>
				</select>
			</p>
			<p>Your roll no: <input type="text" name="roll" /></p>
			<p><input type="submit" /></p>
			</form>
	</div>
</body>
</html>
