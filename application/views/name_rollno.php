<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach; ?>
<?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	    <?php endforeach; ?>

	<script type="text/javascript">
	var j = jQuery.noConflict();

		 j(document).ready(function(){
			 j("label").inFieldLabels();
			 });
	</script>
	<script>

		function checkInput()
		{
			if(document.getElementById("name").value=="")
			{
				error1.hidden=false;
				return false;
			}
			
			if(document.getElementById("roll").value=="")
			{
				error1.hidden=true;
				error2.hidden=false;
				return false;
			}
		}
			
	</script>
</head>
<body>
<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	
	<div class="col2" >
	<h1><center>Hostel Application Form</center></h1>
		<?php echo generate_form('Welcome/display_details',$form_elem,$form_attr);?>
		<div hidden="true" id="error1" ><font color="red">* Name field should not be empty</font></div>
			<div hidden="true" id="error2" ><font color="red">* Roll Number field should not be empty</font></div>
		</form>
		
	</div>
</body>
</html>
