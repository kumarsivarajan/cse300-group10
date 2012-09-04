<div id="header">
 <h1 title="institute logo">Site Navigator:</h1>
 
<ul title="navigation">
 <li <? if($navTab == "about"){echo " id=\"active\"";}?>><a href="<?php echo base_url(); ?>about_us.php" title="About Page">About the System</a></li>
 <li <? if($navTab == "add"){echo " id=\"active\"";}?>><a href="<?php echo base_url(); ?>add" title="Add Lyrics">Apply For Hostel Room</a></li>
 <li <? if($navTab == "home"){echo " id=\"active\"";}?>><a href="<?php echo base_url(); ?>" title="Home Page">Home</a></li>
 </ul>
 </div>