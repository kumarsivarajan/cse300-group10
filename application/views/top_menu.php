<div class="animatedtabs">
<ul>
<li  <?php if($curTab=="home") echo 'class="selected" '; ?>><a href="<?php echo site_url('Admin_view');?>" ><span>Home</span></a></li>
<li <?php if($curTab=="modify") echo 'class="selected" '; ?>><a  href="<?php echo site_url('Admin_view/modify');?>" ><span>Manage Account</span></a></li>
<li <?php if($curTab=="list") echo 'class="selected" '; ?>><a   href="<?php echo site_url('Admin_view/showlistmain');?>" ><span>Show List</span></a></li>
<li <?php if($curTab=="FalseReport") echo 'class="selected" '; ?>><a   href="<?php echo site_url('Admin_view/getFalseReports');?>" ><span>False Submission Reports</span></a></li>

<li <?php if($curTab=="WrongReport") echo 'class="selected" '; ?>><a   href="<?php echo site_url('Admin_view/getWrongReports');?>" ><span>ERP Info Wrong Reports</span></a></li>
<li <?php if($curTab=="managehostel") echo 'class="selected" '; ?>><a   href="<?php echo site_url('Admin_view/manageHostel');?>" ><span>Configure Hostel Values</span></a></li>

 </ul>
</div>