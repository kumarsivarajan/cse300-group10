<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="<?php echo base_url(); ?>favicon2.png" type="image/png">
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
<?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	 <?php endforeach; ?>

	<title>Hostel Allocation - Backend</title>
	<script type="text/javascript">
	var j = jQuery.noConflict();

		 j(document).ready(function(){
			 j("label").inFieldLabels();
			 j("#modifyForm").validate({
				 	errorPlacement: function(error,element) {
					 					j('#errorPanel').show();
					 					return true;
                                        }
                    });
			 });
	</script>
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
	
</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	<div class="admin-contentbar">
	<h2 >Manage Account</h2>
	<div ><?php echo $msg;?></div>
	<!--USING HELPER TO generate a FORM and passing "Admin/modify" as action, with Current, New
		and Confirm New PASSWORD PLUS CHANGE PASSWORD BUTTON as form elements aka $form_elem-->
	<div >
			<?php echo generate_form('Admin_view/pass_change', $form_elem, $form_attr);?>
		</div>
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>