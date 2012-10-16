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
			 j("#applyForm").validate({
				 	errorPlacement: function(error,element) {
					 					j('#errorPanel').show();
                                        }
                    });
			 });
	</script>
	<script type="text/javascript">
		var j = jQuery.noConflict();

		 j(document).ready(function(){
	
	var el = document.getElementById("pref1");
		el.onchange = updateSelectTarget;
		el.onchange();
		function updateSelectTarget () {
			var id = this.options[this.selectedIndex].value;
			//alert("hello");
			var targets = j("#pref2");
			//alert(targets.length);
			var len = this.length;
			targets.empty();
			for (var i = 0; i < len; i++) {
			//alert(targets.options[i].);
			if (this.options[i].value != id) {
					targets.append("<option value='"+this.options[i].value+"'>"+this.options[i].label+"</option>");
				}
				}
				}
				});
	
	</script>
</head>
<body>
<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	
	<div class="col2" >
	<h1><center>Hostel Application Form</center></h1>
		<?php echo generate_form('Welcome/validate_student',$form_elem,$form_attr);?>
		
		<div class="instr">
		<br />
		<center><b>Instructions</b></center>
		<br />
		
		<div class="instr-note">
		<li>To apply for the hostel, please fill in all the fields marked in red</li>
		<br />
		<li>If you haven't been given your IIIT-D Email, enter your registered e-mail<br />
		    on which a verification link can be sent</li>
		<br />
		<li>Make sure your first room preference is different from the second room preference</li>
		<br />
		<li>In the location field, enter only the area where your house is located<br />
		    (Precise address is not required)</li>
		<br />
	 	</div>
		</div>
		
		
		
		
	</div>
</body>
</html>
