<div id="nav-bar">
<h1><a href="<?php echo base_url() ?>"> <img src="<?php echo base_url("/application/images/logo.png")?>" height="50" width="70"/></a>
<a href="<?php echo "http://www.iiitd.ac.in" ?>"> <img src="<?php echo base_url("/application/images/ins_logo.png")?>" height="50" /></a>
</h1>
<h1 title="institute logo">Site Navigator:</h1>
<ul title="navigation">
 <li <? if($navTab == "about"){echo " id=\"active\"";}?>><a href="<?php echo site_url('Welcome/about'); ?>" title="About Page">About the System</a></li>
 <li <? if($navTab == "add"){echo " id=\"active\"";}?>><a href="<?php echo site_url('Welcome/name_rollno'); ?>" title="Apply">Apply For Hostel Room</a></li>
 <li <? if($navTab == "list"){echo " id=\"active\"";}?>><a href="<?php echo site_url('FinalM'); ?>" title="Apply">Allocation List</a></li>
 <li <? if($navTab == "home"){echo " id=\"active\"";}?>><a href="<?php echo base_url(); ?>" title="Home Page">Home</a></li>
 </ul>
 </div>