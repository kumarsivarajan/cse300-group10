<html>
<head>

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach;?>
</head>
<body>

<div class="container">

	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
		<h1><center>Allocation List</center></h1>
		<style type="text/css">
		
	table.allocation_list {
		border-width: thin;
		border-spacing: 1px;
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
	<?php echo $student_table;?>
	<table class="allocation_list" width="80%" height="80%" align="center">
	<tr style="height:40" align="center">
		<th width="25%" align="center">Roll Number</th>
		<th width="25%" align="center">Name</th>
		<th width="25%" align="center">Locality</th>
		<th width="25%" align="center">Distance</th>
		<th width="25%" align="center">Status</th>
		
	</tr>
	<tr style="height:10" align="center">
		<td width="25%" align="center">20xxxxxx</td>
		<td width="25%" align="center">xyz</td>
		<td width="25%" align="center">abc</td>
		<td width="25%" align="center">Z kms</td>
		<td width="25%" align="center">Given</td>
		
	</tr>
	<?php
	foreach ($student_array as $student)
	{
     	echo "<TR><TD>&nbsp;".$student->first_name."</TD>","\n";
     	echo "<TD>&nbsp;</TD>","\n";
     	echo "<TD>&nbsp;</TD>","\n";
     	echo "<TD>&nbsp;</TD>","\n";
		echo "<TD>&nbsp;</TD>","\n";
		echo "<TD>&nbsp;</TD></TR>","\n";
		
  	}
	?>
	</table>
		
		
		
		
		
		
	</div>
	</div>
</body>
</html>

