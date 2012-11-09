<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Semester
|--------------------------------------------------------------------------
|
| 
|
*/
$config['deadline']	= '10-01-2013';

$config['sem_name']	= 'Winter 2012';


/*
|--------------------------------------------------------------------------
| Sender E-Mail
|--------------------------------------------------------------------------
|
| Typically this will be your index.php file, unless you've renamed it to
| something else. If you are using mod_rewrite to remove the page set this
| variable so that it is blank.
|
*/
$config['full_email'] = 'hosteliiitd@gmail.com';

$config['email_password'] = 'hostel@123';
/*
|--------------------------------------------------------------------------
| Organisation Information
|--------------------------------------------------------------------------
|
| 
|
*/
$config['org_fullname']='Indraprastha Institute Of Information Technology';

$config['org_shortname']	= 'IIIT-D';

$config['org_address']	= 'Indraprastha Institute Of Information Technology, Okhla Phase-3, New Delhi-110020';

$config['org_main_url']	= 'http://www.iiitd.ac.in';

$config['org_mail_url']	= 'http://mail.iiitd.ac.in';

$config['org_contact_email']	= 'hosteliiitd@gmail.com';

$config['org_contact_number']	= 'hosteliiitd@gmail.com';

$config['org_logo']	= 'images/ins_logo.png';


/*
|--------------------------------------------------------------------------
| View Settings
|--------------------------------------------------------------------------
|
|*/

$config['frt_visible_fields'] = Array('fname','lname','roll_no','program','location','email','distance','status');

$config['adm_visible_fields'] = Array('fname','lname','roll_no','program','address','email','distance','status');