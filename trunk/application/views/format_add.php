<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="<?php echo base_url(); ?>favicon3.png" type="image/png">
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	<?php foreach($scripts as $script):?>
	    <script type="text/javascript" src="<?php echo base_url("/application/js/".$script)?>"></script>
	    <?php endforeach; ?>
	
	<script type="text/javascript">
	var j = jQuery.noConflict();

		 j(document).ready(function(){
			 j("label").inFieldLabels();
			 j("#applyForm").validate({
				 	errorPlacement: function(error,element) {
					 					j('#errorPanel').show();
                                        }
                    });
			 });
	</script>
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
	    var textarea = document.getElementById('address_box');
	    //alert("clicked");
	    var currentPos = getCaret(textarea);
	    var strLeft = textarea.value.substring(0,currentPos);
	    var strMiddle = ",";
	    var strRight = textarea.value.substring(currentPos,textarea.value.length);
	    textarea.value = strLeft + strMiddle + strRight;
	    	}
</script>
	
	<title>Format Address</title>
</head>
<body>
<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	
	<div class="col2" >
	<h1><center>Address Form</center></h1>
		Click on a position to insert a comma (,) there, do not edit the field, it will be checked and if any changes are detected it'd be reflected in you application.
		<?php echo generate_form('Welcome/check_roll',$form_elem,$form_attr);?>
	</div>
	</div>
</body>
