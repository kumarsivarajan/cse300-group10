<html>
<head>
<link rel="icon" href="<?php echo base_url(); ?>favicon2.png" type="image/png">
<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach;?>
		
<?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	    <?php endforeach; ?>
		
		<script type="text/javascript">
	var j = jQuery.noConflict();

		 j(document).ready(function(){
			 j("label").inFieldLabels();
			 j("#reportForm").validate({
				 	errorPlacement: function(error,element) {
					 					j('#errorPanel').show();
                                        }
                    });
			 });
	</script>
</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
		<h1><center> Report a Student !!!</center></h1>
		<?php echo generate_form('Welcome/add_report_to_db',$form_elem,$form_attr);?> 
		
		<!--<form action="http://localhost/cse300-group10/index.php/Welcome/add_report_to_db" method="post" accept-charset="utf-8" id="applyForm"><p><label for=roll_report>Roll No. to report</label><input type="text" name="roll_report" value="" id="roll_report" label="Roll No. to report" class="required"  /></p><textarea name="" cols="40" rows="10" id="report_box" name="report_box"></textarea><input type="submit" name="" value="Submit report"  /></form>	
		
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

