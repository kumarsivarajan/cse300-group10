<!DOCTYPE html>
<html lang="en">
<head>
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
	 });
	 </script>
</head>
<body>

<div class="login_bar">
		<div id="body">
			<?php echo generate_form('Admin/validate',$form_elem);?>
			</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>