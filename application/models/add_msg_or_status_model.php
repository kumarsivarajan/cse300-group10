<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add_msg_or_status_model extends CI_Model
{
    function __construct()
	{
        parent::__construct();
    }
	
	public function add_msg($roll, $gender, $new_message)
	{
		$this->load->database();
		
		if ($gender== 'M')
		{
			
			//Prepare the query
			$this->db->select('roll_no');
			$this->db->from('applicant_status_male');
			$this->db->where('roll_no',$roll);
			
			//Run the query
			$query=$this->db->get();
			
			if($query->num_rows == 1)
			{ 
				$data = array('remarks' => $new_message);
				$this->db->update('applicant_status_male', $data, $where);
				
				return true;
			}
			else
			{
					//echo "Roll No. Not found";
			}
			
		}
		
		else if ($gender == 'F')
		{
			//Prepare the query
			$this->db->select('roll_no');
			$this->db->from('applicant_status_female');
			$this->db->where('roll_no',$roll);
			
			//Run the query
			$query=$this->db->get();
			
			if($query->num_rows == 1)
			{ 
				$data = array('remarks' => $new_message);
				$this->db->update('applicant_status_female', $data, $where);
				
				return true;
			}
			else
			{
					//echo "Roll No. Not found";
			}
		}
		
	}
	
	
	public function add_status($roll, $gender, $new_status)
	{
		$this->load->database();
		
		if ($gender== 'M')
		{
			
			//Prepare the query
			$this->db->select('roll_no');
			$this->db->from('applicant_status_male');
			$this->db->where('roll_no',$roll);
			
			//Run the query
			$query=$this->db->get();
			
			if($query->num_rows == 1)
			{ 
				$data = array('status' => $new_status);	
				$this->db->update('applicant_status_male', $data, $where);
				
				return true;
			}
			else
			{
					//echo "Roll No. Not found";
			}
			
		}
		
		else if ($gender == 'F')
		{
			//Prepare the query
			$this->db->select('roll_no');
			$this->db->from('applicant_status_female');
			$this->db->where('roll_no',$roll);
			
			//Run the query
			$query=$this->db->get();
			
			if($query->num_rows == 1)
			{ 
				$data = array('status' => $new_status);	
				$this->db->update('applicant_status_female', $data, $where);
				
				return true;
			}
			
			else
			{
					//echo "Roll No. Not found";
			}
		}
		
	}
	
	
}
	