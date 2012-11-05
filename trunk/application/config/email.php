<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
/* 
| ------------------------------------------------------------------- 
| EMAIL CONFING 
| ------------------------------------------------------------------- 
| Configuration of outgoing mail server. 
| */   
	$config['protocol'] = 'smtp';
	$config['charset'] = 'iso-8859-1';
	$config['smtp_host']='ssl://smtp.googlemail.com';  
	$config['smtp_user'] = 'hosteliiitd@gmail.com';
	$config['smtp_pass'] = 'hostel@123';
	$config['smtp_port']=465;  
	$config['wordwrap'] = TRUE;
	$config['smtp_timeout']='30';
	$config['mailtype']='text';
	$config['crlf']="\r\n";
	$config['newline']="\r\n";
	
	  
	  
/* End of file email.php */  
/* Location: ./system/application/config/email.php */  