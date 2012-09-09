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
		<h1><center>Congrats !!!</center></h1>
		You have successfully applied for the hostel
		
		
		<button>Proceed</button>
		&nbsp<button>Report</button>
		
		
	</div>
	</div>
</body>
</html>

