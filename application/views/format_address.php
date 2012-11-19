<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="<?php echo base_url(); ?>favicon3.png" type="image/png">
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	<title>Formatting user address</title>
</head>
<body>

<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	<div class="col2">
	<h1>
	<center>
	Hostel Allocation System - IIIT-D
	<br>
	<center>
	</h1>
		<div><h2>Please format your address according to the instructions given below</h2></div>
<div id="text">
Instructions for formatting to be written here<br>
<textarea readonly="readonly" onclick="InsertText();" id="txtArea" ><?php echo $address ?></textarea>
<button onclick = "location.href='<?php 
									if (exec1())
									{
										//insert the URL of the site where it is to be directed
										echo site_url('');	
									}
									else
									{
										//send to ERROR page
										echo site_url('Welcome/format_address_incorrect');
									} 
									?>'" > Proceed </button>
		
<script>							
function getCaret(el) {
	  if (el.selectionStart) {
	    return el.selectionStart;
	  } else if (document.selection) {
	    el.focus();

	    var r = document.selection.createRange();
	    if (r == null) {
	      return 0;
	    }

	    var re = el.createTextRange(),
	        rc = re.duplicate();
	    re.moveToBookmark(r.getBookmark());
	    rc.setEndPoint('EndToStart', re);

	    return rc.text.length;
	  }  
	  return 0;
	}

	function InsertText() {
	    var textarea = document.getElementById('txtArea');
	    //alert("clicked");
	    var currentPos = getCaret(textarea);
	    var strLeft = textarea.value.substring(0,currentPos);
	    var strMiddle = ",";
	    var strRight = textarea.value.substring(currentPos,textarea.value.length);
	    textarea.value = strLeft + strMiddle + strRight;

	function exec1(var1)
	{
		var textarea = document.getElementById('txtArea');
		var n = textarea.split();
		var db_address = <?php echo $address?>;
		var n1 = db_address.split(",");
		var flag = 0;
		if (n1.length != n.length)
		{
			return false;
		}
		else
		{
			for (var i=0;i<db_address.length;i++)
			{
				if (n1[i] != n[i])
				{
					flag = 1;
					break;
				}
				else
				{
					continue;
				}
			}
			if (flag == 1)
			{
				return false;
			}
			else
			{
				return true;
			}
			
		}
	}
</script>
</div>