<html>
<head>
<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
	    <?php endforeach; ?>
	<script>
		function checkInput()
		{
			if(document.getElementById("name").value=="")
			{
				error1.hidden=false;
				return false;
			}
			
			if(document.getElementById("roll").value=="")
			{
				error1.hidden=true;
				error2.hidden=false;
				return false;
			}
		}
			
	</script>
</head>
<body>
<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	
	<div class="col2" >
	<h1><center>Hostel Application Form</center></h1>
		<form action="display_details" method="post" style="padding-left: 28px;padding-top: 6px" onsubmit="return checkInput()">
			<p> Your name: <input type="text" name="name" id="name"/></p>
			<p>Your course: 
				<select name="course" size = "1" onclick="">
					<option selected> B. tech</option>
					<option> M. tech</option>
					<option> P.hd</option>
				</select>
			</p>
			<p>Your roll no: <input type="text" name="roll" id="roll"/></p>
			<p>
			
			<p><input type="submit"  /></p>
			
			<div hidden="true" id="error1" ><font color="red">* Name field should not be empty</font></div>
			<div hidden="true" id="error2" ><font color="red">* Roll Number field should not be empty</font></div>
		</form>
	</div>
</body>
</html>
