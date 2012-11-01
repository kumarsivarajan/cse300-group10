<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile)?>"/>
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
	<script type="text/javascript">
		var j = jQuery.noConflict();
		var pref_f="",pref_m="";
		<?php foreach($f_pref as $pref):
		?>
		pref_f+="<option value=\"<?php echo $pref['preference_id']; ?>\"><?php echo $pref['preference_name']; ?></option>";
		<?php endforeach ?>
		<?php foreach($m_pref as $pref):
		?>
		pref_m+="<option value=\"<?php echo $pref['preference_id']; ?>\"><?php echo $pref['preference_name']; ?></option>";
		<?php endforeach ?>
		
		 j(document).ready(function(){
	//alert(pref_f);
	var el = document.getElementById("pref1");
		el.onchange = updateSelectTarget;
		el.onchange();
		function updateSelectTarget () {
			var id = this.options[this.selectedIndex].value;
			//alert("hello");
			var targets = j("#pref2");
			//alert(targets.length);
			var len = this.length;
			//alert(id);
			targets.empty();
			for (var i = 0; i < len; i++) {
			if (this.options[i].value != id) {
			
								targets.append("<option value='"+this.options[i].value+"'>"+this.options[i].text+"</option>");
						}
				}
				}
	var genup = document.getElementById("gender");
		genup.onchange = updategenPref;
		genup.onchange();
		function updategenPref () {
		
			var id = this.options[this.selectedIndex].text;
			var targets = j("#pref1");
			//alert(id);
			if(id=="Male")
			{
			//alert("into male");
				targets.empty();
				targets.append(pref_m);
				el.onchange();
				//targets.innerHTML=pref_m;
			
			}
			else if(id=="Female")
			{
				targets.empty();
				
				targets.append(pref_f);
				el.onchange();
				
			}
			
			
				}
				
	
				});
	
	</script>
</head>
<body>
<div class="container">
	<div class="col1"> <?php echo $content_navigation?> </div>
	
	<div class="col2" >
	<h1><center>Hostel Application Form</center></h1>
		<?php echo generate_form('Welcome/validate_student',$form_elem,$form_attr);?>
		
		<div class="instr">
		<br />
		<center><b>Instructions</b></center>
		<br />
		
		<div class="instr-note">
			<li>First Name : Ex:For "Jay Prakash Sharma" it is "Jay"</li>
			<br />
			<li>Last Name : "Sharma"</li>
			<br />
			<li>Roll No. is the full roll number mentioned on ID card (MT201201,20120001,PHD1201)</li>
			<br />
			<li>E-Mail is your IIITD E-Mail, otherwise your registered E-Mail</li>
			<br />
			
			<li>In the location field, enter only the area and city where your house is located (Ex: Rajendra Nagar, New Delhi)</li>
			<br />
	 	</div>
		</div>
		
		
		
		
		
		
	</div>
	
	
</body>
</html>
