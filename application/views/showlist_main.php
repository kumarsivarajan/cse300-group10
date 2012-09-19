<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	<title>Hostel Allocation - Backend</title>
</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	<div class="admin-contentbar" align = center>
	<!-- This where you write you code-->
	<!-- Test 123  -->
	Gender:
	<select name="Gender">
	<option value="Male">Male</option>
	<option value="Female">Female</option>
	</select>
	<br><br>Program:
	<select name="Program">
	<option value="B.Tech">B.Tech</option>
	<option value="M.Tech">M.Tech</option>
	<option value="PhD">PhD</option>
	</select>
	<br><br><form name="input" action="showlist" method="get">
	<input type="submit" value="Submit" />
	</form>
	
		
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>