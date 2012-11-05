<html>
<head>

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/> 
	    <?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	    <?php endforeach; ?>
	
	    <?php endforeach;?>
	    <?php echo $map['js']; ?>
	    <script type="text/javascript">
	    var j = jQuery.noConflict();
	    j(window).load(function ()
	    	{
		    	var i = setInterval(function ()
		    	{
			    	if (j('table.adp-directions').length)
			    	{
				    	clearInterval(i);
				    	j("table.adp-directions").remove(); 

            }
            }, 100);
            });

	    </script>

</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
		<h1><center>You location and distance from IIIT-D !!!</center></h1>
		<?php echo $map['html']; ?>
		</script>
		
		<br />
		<div id="directionsDiv"></div>
		<br />
		<br />
		<strong> &nbsp &nbsp Applicant's Name: </strong><?php echo $fname." ".$lname;?><br>
		
		<strong> &nbsp &nbsp ERP Address: </strong><?php echo $address;?><br>
		
		
		<center><p><b><big>If you have some issue with the shown address please click Report otherwise submit</big></b></p></center>
		<center>
		
		<button onclick="location.href='<?php echo site_url('Welcome/submit');?>'">Proceed</button>
		<button onclick="location.href='<?php echo site_url('Welcome/report_address');?>'">Report</button>
		<br />
		<br />
		
		</br>
	
	</div>
	</div>
</body>
</html>
