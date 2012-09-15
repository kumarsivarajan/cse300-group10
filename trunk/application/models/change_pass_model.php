<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres - Modified :Manik
 * Description: Login model class
 */
class Change_pass_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     
	 
	 /* This function checks if the current password as written in the change password textbox matches
		with the password of the currently logged in admin user.
	 */
    public function check_current_password($cur_submitted_pass, $name)
	{
		$this->load->database();
		
		$this->db->select('pwd');
		$this->db->from('admin_users');
		$this->db->where('uid',$name);
		
		$query=$this->db->get();
		
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $row)
			{
				if ($row == $cur_submitted_pass)
				{
					return true;
				}	
				else 
				{
					return false;
				}
			}
		}
		/*else
		{
			echo "There are zero (0) admins with that name";
		}*/
		
	}
	
	
	/* This function changes the current password with the new password.
		ALL BOUNDARY CONDITIONS (such as $new_pass & $confirm_new_pass should be same AND
		it is the password for that user only) ARE BEING CHECKED ELSEWHERE, hence this
		function is minimal.
	*/
	public function change_the_password($new_pass)
	{
		$this->load->database();
	
		$data = array('pwd' => $new_pass);
		$this->db->update('admin_users', $data);			
		
	}
	
} ?>