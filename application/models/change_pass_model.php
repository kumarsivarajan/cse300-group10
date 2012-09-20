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
    public function check_current_password($cur_submitted_pass)
	{
		$this->load->database();
		$this->load->library('session');
		
		
		//GET USERID aka LOGIN NAME of currently logged in user
		$name = $this->session->userdata['uid'];  //this 'userid' ([keyword] for LOGIN NAME) is the same as in backend_login MODEL being saved in $data
		
		//echo "CHECK" ;
		//echo "Usernameis: ". $name ;
		//echo " Owned! ";
		
		//Prepare the query
		$this->db->select('pwd');
		$this->db->from('admin_users');
		$this->db->where('uid',$name);
		
		//Run the query
		$query=$this->db->get();
		
		if($query->num_rows == 1)
		{ 
			//echo "Query returned 1 result /n" ;
			foreach ($query->result() as $row)
			{
				if ($row->pwd == $cur_submitted_pass)
				{  //echo "Query result is same as current submitted pass" ;
					return true;
				}	
				else 
				{
					return false;
				}
			}
		}
		else
		{
			return false;
		}
		
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