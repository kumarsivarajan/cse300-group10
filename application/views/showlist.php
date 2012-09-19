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
	<div class="admin-contentbar" align=center>
	<!-- This where you write you code-->
	<!--Test123-->
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
	<h1><center>Show List</center></h1>
		<style type="text/css">
		
	table.allocation_list {
		border-width: thin;
		border-spacing: 2px;
		border-style: outset;
		border-color: black;
		border-collapse: collapse;
		background-color: rgb(255, 250, 250);
	}
	table.allocation_list th {
		border-width: 1px;
		padding: 1px;
		border-style: solid;
		border-color: gray;
		background-color: white;
		-moz-border-radius: ;
	}
	table.allocation_list td {
		border-width: 1px;
		padding: 1px;
		border-style: solid;
		border-color: gray;
		background-color: white;
		-moz-border-radius: ;
	}
	</style>

	<table class="allocation_list" width="80%" height="80%" align="center">
	<tr style="height:40" align="center">
		<th width="25%" align="center">Roll Number</th>
		<th width="25%" align="center">Name</th>
		<th width="25%" align="center">Locality</th>
		<th width="25%" align="center">Distance</th>
		
		
	</tr>
	<tr style="height:10" align="center">
		<td width="25%" align="center">20XXXXX</td>
		<td width="25%" align="center">ABC</td>
		<td width="25%" align="center">XYZ</td>
		<td width="25%" align="center">40 kms</td>
		
		
	</tr>
	<tr style="height:10" align="center">
		<td width="25%" align="center">20XXXXX</td>
		<td width="25%" align="center">DEF</td>
		<td width="25%" align="center">LMN</td>
		<td width="25%" align="center">20kms</td>
		
		
	</tr>
	<tr style="height:10" align="center">
		<td width="25%" align="center">20XXXXX</td>
		<td width="25%" align="center">GHI</td>
		<td width="25%" align="center">OPQ</td>
		<td width="25%" align="center">500 kms</td>
		
		
	</tr>
	<tr style="height:10" align="center">
		<td width="25%" align="center">20XXXXX</td>
		<td width="25%" align="center">QRS</td>
		<td width="25%" align="center">TUV</td>
		<td width="25%" align="center">160 kms</td>
		
		
	</tr>
	<?php
	for ($i = 1; $i <= 16; $i++)
	{
     	echo "<TR><TD>&nbsp;</TD>","\n";
     	echo "<TD>&nbsp;</TD>","\n";
     	echo "<TD>&nbsp;</TD>","\n";
     	echo "<TD>&nbsp;</TD>","\n";
		echo "<TD>&nbsp;</TD></TR>","\n";
		
  	}
	?>
	</table>
		
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>