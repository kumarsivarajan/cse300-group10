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
	    <script type="text/javascript" charset="utf-8">
	    		var k = jQuery.noConflict();

			k(document).ready(function() {
				k('#admin_list').dataTable();
			} );
		</script>
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
	var searchTerm;
		<?php if($curgen!=''):?>

	searchTerm = <?php echo $curgen; ?>;
	for(var i = 0; i < genup.length; i++){
		if(genup.options[i].value == searchTerm){
		
			genup.options[i].selected = true;
			break;
		}
	}
	<?php endif; ?>
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

			var prefup = document.getElementById("pref1");
	<?php if($curpref!=''):?>

	searchTerm = <?php echo $curpref; ?>;
	
	for(i = 0; i < prefup.length; i++){
	//alert(prefup.options[i].value);
		if(prefup.options[i].value == searchTerm){
			prefup.options[i].selected = true;
			break;
		}
	}
	<?php endif; ?>
	<?php if($curprog!=''):?>

	prefup=document.getElementById("program1");
			searchTerm = <?php echo $curprog; ?>;
	for(i = 0; i < prefup.length; i++){
		if(prefup.options[i].value == searchTerm){
			prefup.options[i].selected = true;
			break;
		}
	}	
	<?php endif;?>
				
				
				
				});
	
	</script>
</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	<div class="admin-contentbar">
	<h2>Manage Applications</h2>
	<!-- This where you write you code-->
	<!--Test123-->
		<?php echo generate_form_nobreak('Admin_view/showlist',$form_elem,$form_attr);?>

	<h1><center>Show List</center></h1>
	<?php echo $table?>
		
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>