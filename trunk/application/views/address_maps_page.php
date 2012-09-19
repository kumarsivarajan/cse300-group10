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
		<h1><center>According to our data you live here !!</center></h1>
		<?php echo $map['html']; ?>
		</script>
		
		<br />
		<button>Proceed</button>
		
		</br>
	
	</div>
	</div>
</body>
</html>
