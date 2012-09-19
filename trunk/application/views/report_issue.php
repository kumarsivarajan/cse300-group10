<html>
<head>

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2" >
	
		<div style="padding-left: 20px;padding-bottom: 10px">
		<h1><center>Report Allocation</center></h1>
		<form method="post" action="">
			<b>Roll No.:</b> <input type="text" name="fname" /><br /><br />
			<b>Reporting Reason</b> (Be brief and to the point):<br />
			<textarea name="Report issue" cols="50" rows="10">				
			</textarea>
			
			<br />
		<input type="submit" value="Submit" />
		</form>
		</br>
		</div>
		

		
		
		
	</div>
	</div>
</body>
</html>

