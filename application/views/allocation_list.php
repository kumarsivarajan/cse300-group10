<html>
<head>

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach;?>
	    <?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	    <?php endforeach; ?>
	    <script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#allocation_list').dataTable();
			} );
		</script>
</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	
	<div class="col2">
		<h1><center>Allocation List</center></h1>
		
	

	<?php echo $table?>
		
		

		
		
		
	</div>
	</div>
</body>
</html>