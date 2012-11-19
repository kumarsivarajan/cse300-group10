<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="<?php echo base_url(); ?>favicon2.png" type="image/png">
	<meta charset="utf-8">
	<title>Admin - Hostel Allocation System - <?php echo $ins_name ?></title>
		<?php foreach($css as $cssfile):?>
	    	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile) ?>"/>
	    <?php endforeach;?>
	    <?php foreach($scripts as $script):?>
	    	<script type="text/javascript" src="<?php echo base_url("/application/js/".$script) ?>"></script>
	    <?php endforeach;?>
	 <script type="text/javascript">
	 $(document).ready(function(){
	 $("label").inFieldLabels();
	  $("#loginForm").validate({
				 	errorPlacement: function(error,element) {
					 					return true;
                                        }
                    });
	 });
	 </script>
</head>
<body>
<div class="login_bar_wrapper">
<div class="invalid"><?php echo $msg;?></div>
<div class="login_bar">
		<div id="body">
			<?php echo generate_form('Admin/validate',$form_elem,$form_attr);?>
		</div>
		<div class="wlcm-msg">Admin Portal</br>Hostel Allocation</br>
		<img src="<?php echo base_url('/application/images/ins_logo.png');?>" />
		</div>
	<p class="footer"><a href="#">Forgot Password?</a></p>
</div>
</div>
</body>
</html>