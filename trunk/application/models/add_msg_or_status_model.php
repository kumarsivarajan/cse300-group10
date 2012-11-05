<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add_msg_or_status_model extends CI_Model
{
    function __construct()
	{
        parent::__construct();
    }
	
	public function add_remarks($roll, $new_message)
	{
		$this->load->database();
		$this->load->model('student_verification');
		$gender=$this->student_verification->getGender($roll);
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
				$where=Array('roll_no'=>$roll);

				$this->db->update('applicant_status_male', $data, $where);
				echo "done";
				return true;
			}
			else
			{
				$sql = "INSERT INTO applicant_status_male (roll_no, remarks) 
        VALUES (".$this->db->escape($roll).", ".$this->db->escape($new_message).")";

        		$this->db->query($sql);
			
			
			
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
								$where=Array('roll_no'=>$roll);

				$this->db->update('applicant_status_female', $data, $where);
				
				return true;
			}
			else
			{
				$sql = "INSERT INTO applicant_status_female (roll_no, remarks) 
        VALUES (".$this->db->escape($roll).", ".$this->db->escape($new_message).")";

        		$this->db->query($sql);
			
			
			
			
					//echo "Roll No. Not found";
			}
		}
		else
			return false;
		
	}
		
	public function add_status($roll, $new_status)
	{
		$this->load->database();
		$this->load->model('student_verification');
		$gender=$this->student_verification->getGender($roll);
		
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
								$where=Array('roll_no'=>$roll);

				$this->db->update('applicant_status_male', $data, $where);
				
				return true;
			}
			else
			{
				$sql = "INSERT INTO applicant_status_male (roll_no, status) 
        VALUES (".$this->db->escape($roll).", ".$this->db->escape($new_status).")";

        		$this->db->query($sql);
			
			
			
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
								$where=Array('roll_no'=>$roll);

				$this->db->update('applicant_status_female', $data, $where);
				
				return true;
			}
			else
			{
				$sql = "INSERT INTO applicant_status_female (roll_no, status) 
        VALUES (".$this->db->escape($roll).", ".$this->db->escape($new_status).")";

        		$this->db->query($sql);
			
			
			
			
					//echo "Roll No. Not found";
			}
		}
		else
			return false;
		
	}
		
	public function add_room($roll, $new_room)
	{
		$this->load->database();
		$this->load->model('student_verification');
		$gender=$this->student_verification->getGender($roll);
		
		if ($gender== 'M')
		{
			
			//Prepare the query
			$this->db->select('roll_no,status');
			$this->db->from('applicant_status_male');
			$this->db->where('roll_no',$roll);
			//Run the query
			$query=$this->db->get();
			
			
			if($query->num_rows == 1)
			{ 
				$data = array('room_type' => $new_room);
								$where=Array('roll_no'=>$roll);

				$this->db->update('applicant_status_male', $data, $where);
		
				return true;
			}
			else
			{
				$sql = "INSERT INTO applicant_status_male (roll_no, room_type) 
        VALUES (".$this->db->escape($roll).", ".$this->db->escape($new_room).")";

        		$this->db->query($sql);
			
			
			
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
				$data = array('room_type' => $new_room);
								$where=Array('roll_no'=>$roll);

				$this->db->update('applicant_status_female', $data, $where);
				
				return true;
			}
			else
			{
				$sql = "INSERT INTO applicant_status_female (roll_no, room_type) 
        VALUES (".$this->db->escape($roll).", ".$this->db->escape($new_room).")";

        		$this->db->query($sql);
			
			
			
			
					//echo "Roll No. Not found";
			}
		}
		else
			return false;
		
	}
	public function editStatus($roll, $new_room,$new_status,$new_remarks)
	{
		$this->load->database();
		$this->load->model('student_verification');
		$gender=$this->student_verification->getGender($roll);
		
		if ($gender== 'M')
		{
			
			//Prepare the query
			$this->db->select('roll_no,status');
			$this->db->from('applicant_status_male');
			$this->db->where('roll_no',$roll);
			//Run the query
			$query=$this->db->get();
			
			
			if($query->num_rows == 1)
			{ 
				$data = array();
			
				$where=Array('roll_no'=>$roll);
				if($new_room!=''){
					$data['room_type']=$new_room;
					}
				if($new_status!=''){
									$data['status']=$new_status;

					}
				if($new_remarks!=''){
										$data['remarks']=$new_remarks;

				}
				$this->db->update('applicant_status_male', $data, $where);
		
				return true;
			}
			else
			{
				$sql1 = "INSERT INTO applicant_status_male (roll_no ";
				$sql2=" VALUES (".$this->db->escape($roll);
				if($new_room!=''){
					$sql1.=',room_type';
					$sql2.=','.'"'.$new_room.'"';
					}
				if($new_status!=''){
					$sql1.=',status';
					$sql2.=','.'"'.$new_status.'"';
					}
				if($new_remarks!=''){
					$sql1.=',remarks';
					$sql2.=','.'"'.$new_remarks.'"';
					}
					$sql=$sql1.')'.$sql2.')';
        		$this->db->query($sql);
			
			
			
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
				$where=Array('roll_no'=>$roll);
				if($new_room!=''){
					$data['room_type']=$new_room;
					}
				if($new_status!=''){
									$data['status']=$new_status;

					}
				if($new_remarks!=''){
										$data['remarks']=$new_remarks;

				}
				$this->db->update('applicant_status_female', $data, $where);
				
				return true;
			}
			else
			{
				$sql1 = "INSERT INTO applicant_status_female (roll_no ";
				$sql2=" VALUES (".$this->db->escape($roll);
				if($new_room!=''){
					$sql1.=',room_type';
					$sql2.=','.'"'.$new_room.'"';
					}
				if($new_status!=''){
					$sql1.=',status';
					$sql2.=','.'"'.$new_status.'"';
					}
				if($new_remarks!=''){
					$sql1.=',remarks';
					$sql2.=','.'"'.$new_remarks.'"';
					}
					$sql=$sql1.')'.$sql2.')';
        		$this->db->query($sql);
			
			
			
			
					//echo "Roll No. Not found";
			}
		}
		else
			return false;
		
	}
	
	
	
}
	