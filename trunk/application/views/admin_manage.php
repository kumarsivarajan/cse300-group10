<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	
</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	<div class="admin-contentbar">
	
	<!--USING HELPER TO generate a FORM and passing "Admin_view/pass change" as action, with Current, New
		and Confirm New PASSWORD PLUS CHANGE PASSWORD BUTTON as form elements aka $form_elem below-->
	<div >
			<?php echo generate_form('Admin_view/pass_change', $form_elem);?>
			
		</div>
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>