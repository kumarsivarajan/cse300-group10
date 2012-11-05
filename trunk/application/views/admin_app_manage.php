<!DOCTYPE html>
<html lang="en">
<head>
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

		 j(document).ready(function(){
			 j("label").inFieldLabels();
			 j("#listForm").validate({
				 	errorPlacement: function(error,element) {
					 					j('#errorPanel').show();
					 					return true;
                                        }
                    });
			 });
	</script>
		<script type="text/javascript">
	var j = jQuery.noConflict();

		 j(document).ready(function(){
			 j("label").inFieldLabels();
			 j("#listForm").validate({
				 	errorPlacement: function(error,element) {
					 					j('#errorPanel').show();
                                        }
                    });
			 });
	</script>
	
</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	<div class="admin-contentbar">
	<h2 >Manage Application</h2>
	<button onClick="history.go(-1);return true;" style="left:0;">Go back</button><br />
	<div class="applicant_info">
		<p><b>Applicant's First Name:</b> <?php echo $student_data['f_name']; ?> </p>
		<p><b>Roll No.:</b> <?php echo $student_data['roll_no']; ?></p>
		<p><b>Program:</b> <?php echo $student_data['program']; ?></p>
		<p><b>First Preference:</b> <?php echo $student_data['pref_1']; ?></p>
		<p><b>Second Preference:</b> <?php echo $student_data['pref_2']; ?></p>
		<p><b>Contact No.: </b><?php echo $student_data['contact']; ?></p>
		<p><b>Address: </b><?php echo $student_data['address']; ?></p>
		<p><b>Mentioned Location: </b><?php echo $student_data['location']; ?></p>
		<p><b>Distance: </b><?php echo $student_data['dist']."KM"; ?></p>

		<p><b>Assigned Status: </b><?php echo $student_data['status']; ?></p>
		<p><b>Assigned Room: </b><?php echo $student_data['room_type']; ?></p>
		<p><b>Assigned Remarks: </b><?php echo $student_data['remarks']; ?></p>
		
	</div>
	<div >
			<?php if($student_data['dist']!=-1): ?>
			<?php echo generate_form('Admin_view/setStatus?roll='.$student_data['roll_no'], $form_elem, $form_attr);?>
			<?php else: ?>
			<?php echo "Student Hasn't Verified his distance, yet"; endif; ?>
			
		</div>
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>