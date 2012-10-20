<div id="nav-bar">
<h1><a href="<?php echo base_url() ?>"> <img src="<?php echo base_url("/application/images/logo.png")?>" height="50" width="70"/></a>
<a href="<?php echo "http://www.iiitd.ac.in" ?>"> <img src="<?php echo base_url("/application/images/ins_logo.png")?>" height="50" /></a>
</h1>
<h2 id="navigation"title="institute logo">Site Navigator:</h2>
<div id="main">

<div id="navigationMenu" title="navigation">
 <li ><a class="home <?php if($navTab == "home"){echo " active";}?>" href="<?php echo base_url(); ?>" title="Home Page"><span>Home</span></a></li>
 <li ><a class="services <?php if($navTab == "apply"){echo " active";}?>" href="<?php echo site_url('Welcome/name_rollno'); ?>" title="Apply"><span>Apply For Hostel Room</span></a></li>
 <li ><a class="services <?php if($navTab == "list"){echo " active";}?>" href="<?php echo site_url('Welcome/alloc_list'); ?>" title="Apply"><span>Allocation List</span></a></li>
 
 <li ><a class="about <?php if($navTab == "about"){echo " active";}?>" href="<?php echo site_url('Welcome/about'); ?>" title="About Page"><span>About the System</span></a></li>
 </div>
</div>
 </div>