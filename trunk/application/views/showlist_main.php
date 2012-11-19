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

	<title>Hostel Allocation - Backend</title>
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
				//targets.innerHTML=pref_m;
			
			}
			else if(id=="Female")
			{
				targets.empty();
				
				targets.append(pref_f);
				
			}
			
			
				}
				
	
				});
	
	</script>
</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	<div class="admin-contentbar">
	<h2>Manage Applications</h2>
	<div ><?php echo $msg;?></div>
	<!-- This where you write you code-->
	<!-- Test 123  -->
	<div>
	<?php echo generate_form('Admin_view/showlist',$form_elem,$form_attr);?>
	</div>
		
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>