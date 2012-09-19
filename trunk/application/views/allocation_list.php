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
		<h1><center>Allocation List</center></h1>
		<style type="text/css">
		
	table.allocation_list {
		border-width: thin;
		border-spacing: 1px;
		border-style: outset;
		border-color: black;
		border-collapse: collapse;
		background-color: rgb(255, 250, 250);
	}
	table.allocation_list th {
		border-width: 1px;
		padding: 1px;
		border-style: solid;
		border-color: gray;
		background-color: white;
		-moz-border-radius: ;
	}
	table.allocation_list td {
		border-width: 1px;
		padding: 1px;
		border-style: solid;
		border-color: gray;
		background-color: white;
		-moz-border-radius: ;
	}
	</style>
	

	<div class="col3" style="padding-left:164px;padding-bottom:20px"> <?php echo $table?> </div>
		
		

		
		
		
	</div>
	</div>
</body>
</html>