<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="<?php echo base_url(); ?>/favicon2.png" type="image/png">
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	<?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	<?php endforeach; ?>
	
		<script>
				function display_confirm(url)
			{
				var opt=confirm("DO you really want to delete the record ?");
				//alert(url);
				if(opt==true&&url!='')
				{
					window.location.href=url
				}
				else
				{
				
				}
			}
		</script>
		
	    <script type="text/javascript" charset="utf-8">
		
			$(document).ready(function() {
				$('#admin_list').dataTable();
			} );
			
		
		</script>
		
		
	<title>False Submission Report</title>
</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	
	<div class="admin-contentbar">
	<h2>Reports</h2>
	<?php echo $table?>
		
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>