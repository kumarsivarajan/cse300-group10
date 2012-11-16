
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	<?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	    <?php endforeach; ?>
	
	<script type="text/javascript">
	var j = jQuery.noConflict();

		 j(document).ready(function(){
			 j("label").inFieldLabels();
			 j("#applyForm").validate({
				 	errorPlacement: function(error,element) {
					 					j('#errorPanel').show();
                                        }
                    });
			 });
	</script>
	
	
	<title>User feedback form</title>
</head>
<body>
<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	
	<div class="col2" >
	<h1><center>Frequently Asked Questions</center></h1>
	<?php echo generate_form('Welcome/check_roll',$form_elem,$form_attr);?>
	<div class="instr">
		<br />
		<center><b>Some frequently asked questions</b></center>
		<br />
		
		<div class="instr-note">
			<b>Q. What if I'm not eligible for hostel on distance basis but have Special Reasons for needing a room?</b>
			<br>
			<br>
			A. In that case, you apply through this portal and contact Mr. Vivek Tiwari personally to figure out what can be done. 
			
			
			<br />
	 	</div>
		</div>
	</div>
	</div>
</body>