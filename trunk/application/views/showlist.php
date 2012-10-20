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
	    <script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#admin_list').dataTable();
			} );
		</script>
	<title>Hostel Allocation - Backend</title>
</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	<div class="admin-contentbar">
	<h2>Manage Applications</h2>
	<!-- This where you write you code-->
	<!--Test123-->
	Gender:
	<select name="Gender">
	<option value="Male">Male</option>
	<option value="Female">Female</option>
	<option value="All">All</option>
	</select>
	Program:
	<select name="Program">
	<option value="B.Tech">B.Tech</option>
	<option value="M.Tech">M.Tech</option>
	<option value="PhD">PhD</option>
	<option value="All">All</option>
	</select>
	Room Preference:
	<select name="Room Preference">
	<option value="Single">Single</option>
	<option value="Double">Double</option>
	<option value="Triple">Triple</option>
	</select>
	<form name="input" action="showlist" method="get">
	<input type="submit" value="Submit" />
	</form>
	<h1><center>Show List</center></h1>
	<?php echo $table?>
		
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>