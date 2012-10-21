<!DOCTYPE html>
<html lang="en">
<head>
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
	<h1><center>Hostel Allocation System - IIIT-D<center></h1>
		<div><h2>Instructions</h2></div>
<div id="text">
Instructions for formatting to be written here<br>

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
	}
</script>
</div>