<html>
<head>

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/> 
	    <?php endforeach;?>
	    <?php echo $map['js']; ?>
</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2" style="padding-left: 20px;padding-bottom: 10px">
		<h1><center>Find your House !!</center></h1>
		<b><center> WE WERE NOT ABLE TO FIND YOUR RESIDANCE, PLEASE POINT IT OUT ON THE MAP </center><b> <br />
		<?php echo $map['html']; ?>
		</script>
		
		<br />
		<button>Proceed</button>
		
		</br>
	
	</div>
	</div>
</body>
</html>
