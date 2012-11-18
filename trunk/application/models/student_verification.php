<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_verification extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	public function checkNewAddress($string1, $string2)
	{
		$string1=str_replace(',', '' , $string1);
		$string2=str_replace(',', '' , $string2);
		
		//$string1= preg_replace('/[,]/', '', $string1);
		//$string2= preg_replace('/[,]/', '', $string2);
		
		
		if (strcmp($string1, $string2) == 0)
			{
				return true;
			}
		else
			{
				return false;
			}
	}
	
	public function getinfo($fname,$lname,$roll)
	{
		$this->load->database();
		$this->load->library('session');

		//$query = $this->db->query('SELECT first_name, roll_no, address, email FROM student_info WHERE first_name='.$name);
		
		$this->db->select('first_name, last_name, roll_no, address, email');
		$this->db->from('student_info');
		$this->db->where('first_name',$fname);
		$this->db->where('last_name',$lname);	
		$this->db->where('roll_no',$roll);
		
		
		$query=$this->db->get();
		
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $row)
			{
				$data1=array(
				'first_name'=> $row->first_name,
				'last_name'=> $row->last_name,
				
				'roll_no'=> $row->roll_no,
				'address'=> $row->address,
				'email'=>$row->email,
				'isvalidated'=>true
				);
				$this->session->set_userdata($data1);
				return $data1;
				
			}
		}
		else
		{
			$data1=array(
				'first_name'=>"xxx",
				'roll_no'=>-1,
				'address'=>"xxx"
				);
				
				return $data1;
		}
		
		
	}
	public function dbvalidation($roll,$fname){
		$this->load->database();
		$this->load->library('session');
		$this->db->select('f_name,l_name,gender,year,email,address,program');
		$this->db->from('student_info');
		$this->db->where('roll_no',$roll);
		$query=$this->db->get();
		echo "roll=".$roll."<br>";
		//print_r($query);
		if($query->num_rows == 1)
		{		
	
		foreach($query->result() as $row){
				echo "roll=".$roll.":".$row->f_name."<br>";
				if(strcasecmp(trim($row->f_name),trim($fname))==0){
						echo "roll=".$roll."<br>";

					$data1=array(
						'roll_no'=>$roll,
						'contact'=> $this->security->xss_clean($this->input->post('contact')),
						'location'=> $this->security->xss_clean($this->input->post('location')),
						'pref_1'=>$this->security->xss_clean($this->input->post('room_preference1')),
						'pref_2'=>$this->security->xss_clean($this->input->post('room_preference2')),
						'email'=>$row->email,
						'isvalidated'=>true
						);
											$this->session->set_userdata($data1);

										//print_r($data1);

					$data2=array(
					'first_name'=> $row->f_name,
					'last_name'=> $row->l_name,
				
					'roll_no'=> $roll,
					'address'=> $row->address,
					'email'=>$row->email,
					'program'=>$row->program,
					'gender'=>$row->gender,
					'contact'=> $this->security->xss_clean($this->input->post('contact')),
						'location'=> $this->security->xss_clean($this->input->post('location')),
						'pref_1'=>$this->getPrefLabel($this->security->xss_clean($this->input->post('room_preference1'))),
						'pref_2'=>$this->getPrefLabel($this->security->xss_clean($this->input->post('room_preference2')))
					);
					//print_r($data2);
							$temparr=$student_data=$this->session->all_userdata();
					//print_r($temparr);
					return $data2;
				
				}
				}
				
		
		}
				return false;
		

	}
	public function getPrefLabel($prefid){
			$this->load->database();
			$this->db->select('preference_name');

			$this->db->from('eav_preferences');
			$this->db->where('preference_id',$prefid);
			$pquery=$this->db->get();
			if($pquery->num_rows==1){
				$row=$pquery->result();
				return $row[0]->preference_name;
				}
	}
	public function getProgLabel($prefid){
			$this->load->database();
			$this->db->select('program_name');

			$this->db->from('eav_program');
			$this->db->where('program_id',$prefid);
			$pquery=$this->db->get();
			if($pquery->num_rows==1){
				$row=$pquery->result();
				return $row[0]->program_name;
				}

	}
	public function getPreferences($gender,$backend=false){
			$tablename='eav_preferences_';
			if($gender=='M')
				$tablename.='male';
			else if($gender=='F')
				$tablename.='female';
			else
				return false;
			$this->load->database();
			$this->db->select('preference_id, preference_name,preference_available');

			$this->db->from('eav_preferences NATURAL JOIN '.$tablename);
			//$this->db->where('eav_preferences.preference_id',$tablename.'.preference_id');
			$pquery=$this->db->get();
			if($pquery->num_rows>0){
				foreach ($pquery->result() as $row)
				{
				if($row->preference_available>0)
				{
					if($backend||$row->preference_name!='None')
					$data1[]=array(
					'preference_id'=> $row->preference_id,
					'preference_name'=> $row->preference_name,
					'preference_available'=> $row->preference_available
					
					);
				}
				}
				return $data1;
				
				}

	}
	public function confirmed_application($rand_key){
			$this->load->database();

					$this->load->library('session');

					$roll=$this->session->userdata('roll_no');
					$this->db->select('f_name,l_name,year,gender,email,address,program');
					$this->db->from('student_info');
					$this->db->where('roll_no',$roll);
					$query=$this->db->get();
					echo "hello worls".$this->session->userdata('roll_no');
					if($query->num_rows == 1)
					{	$row=$query->result();
						$row=$row[0];
						$target_table="";
						$this->db->select('program_id');

						$this->db->from('eav_program');
						$this->db->where('program_name',$row->program);
						$pquery=$this->db->get();
						$prow=$pquery->result();
						$data1['program']=$prow[0]->program_id;
				
						if($row->gender=='M')
							$target_table='applicants_info_male';
						else
							$target_table='applicants_info_female';
						$sqlapp_info="INSERT INTO applicants_info(roll_no,gender) values(".$this->db->escape($roll).",".$this->db->escape($row->gender).")";
						$this->db->query($sqlapp_info);
						
						echo $sqlapp_info."<br>";
						$sql = "INSERT INTO ".$target_table."(roll_no,f_name,l_name,contact_no,location,pref_1,pref_2,rand_key,year,email,address,program_id,distance_km) VALUES(".$this->db->escape($roll).",".$this->db->escape($row->f_name).",".$this->db->escape($row->l_name).",".$this->db->escape($this->session->userdata('contact')).",".$this->db->escape($this->session->userdata('location')).",".$this->db->escape($this->session->userdata('pref_1')).",".$this->db->escape($this->session->userdata('pref_2')).",".$this->db->escape($rand_key).",".$this->db->escape($row->year).",".$this->db->escape($row->email).",".$this->db->escape($row->address).",".$this->db->escape($data1['program']).",-1)";
						echo $sql."<br> hello";
						$this->db->query($sql);
						
						$this->db->select('date_application');
						$this->db->from($target_table);
						$this->db->where('roll_no',$roll);
						$query=$this->db->get();
						if($query->num_rows == 1){
						$row=$query->result();
						//print_r($row);
						return $row[0]->date_application;
						}
					
						
						
						}
	}
	public function get_alloc_info()
	{
			$this->load->database();
			$this->db->select('first_name, roll_no, address, email, distance, status');
			$this->db->from('alloc_list');
			$query=$this->db->get();
			
			foreach ($query->result() as $row)
			{
				$data1[]=array(
				'first_name'=> $row->first_name,
				'roll_no'=> $row->roll_no,
				'address'=> $row->address,
				'email'=>$row->email,
				'distance'=>$row->distance,
				'status'=>$row->status
				);
			}
		
			return $data1;
	}
	
	public function getAddress($key){
		
		$this->load->database();
		
		$this->db->select('f_name, l_name, roll_no, address, email');
		$this->db->from('applicants_info_male');
		$this->db->where('rand_key',$key);
		
		$query=$this->db->get();
		
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $row)
			{
				$data1=array(
				'first_name'=> $row->f_name,
				'last_name'=> $row->l_name,				
				'roll_no'=> $row->roll_no,
				'address'=> $row->address,
				'email'=>$row->email,
				'gender'=>'M',
				'isvalidated'=>true
				);
				
				
			}
			return $data1;
		}
		else
		{
			$this->db->select('f_name, l_name, roll_no, address, email');
			$this->db->from('applicants_info_female');
			$this->db->where('rand_key',$key);
		
			$query=$this->db->get();
			if($query->num_rows == 1)
				{
					foreach ($query->result() as $row)
					{
						$data1=array(
						'first_name'=> $row->f_name,
						'last_name'=> $row->l_name,				
						'roll_no'=> $row->roll_no,
						'address'=> $row->address,
						'email'=>$row->email,
						'gender'=>'F',
						'isvalidated'=>true
						);
				
				
						}
					return $data1;	
					}

		}
		
	}
	public function insertDistance($dist){
			$this->load->database();
			$this->load->library('session');
			$target_table="";
			$roll=$this->session->userdata('roll_no');
			if($this->session->userdata('gender')=='F')
				$target_table="applicants_info_female";
			else
				$target_table="applicants_info_male";
			$sql = "UPDATE ".$target_table." SET distance_km=".$dist." WHERE roll_no='".$roll."'";
			$this->db->query($sql);


	}

	public function insertFalseApplicantReport($roll, $reason)
	{
			$this->load->database();
			$this->db->select('roll_no');
			$this->db->from('applicants_info');
			$this->db->where('roll_no',$roll);
			$query1=$this->db->get();
			if($query1->num_rows==1)
			{
				//$sql='insert into false_applicants_reports(roll_no, reason) values('.$roll.',"'.$reason.'")';
				$sql="INSERT INTO false_applicants_reports(roll_no,reason) values(".$this->db->escape($roll).",".$this->db->escape($reason).")";
				$this->db->query($sql);
				return true;
			}
			else
			{
				return false;
			}
			//$sql='insert into false_applicants_reports(roll_no, reason) values('.$roll.',"'.$reason.'") where '.$roll.' in (select roll_no from applicants_info)';  
			
			
	}
	public function getGender($roll)
	{
			$this->load->database();
			$this->db->select('gender');
			$this->db->from('applicants_info');
			$this->db->where('roll_no',$roll);
			$query1=$this->db->get();
			if($query1->num_rows==1)
			{
				$row=$query1->result();
				return $row[0]->gender;
						
				
			}
			else
			{
				return false;
			}
			//$sql='insert into false_applicants_reports(roll_no, reason) values('.$roll.',"'.$reason.'") where '.$roll.' in (select roll_no from applicants_info)';  
			
			
	}

	
	public function insertWrongAddressReport($roll,$comment)
	{
			$this->load->database();
			$sql="INSERT INTO wrong_info_reports(roll_no,reason) values(".$this->db->escape($roll).",".$this->db->escape($comment).")";
			$this->db->query($sql);
	
	}
	
	public function checkRoll($roll)
	{
		$this->load->database();
		$this->db->select('email');
		$this->db->from('student_info');
		$this->db->where('roll_no',$roll);
		
		$query=$this->db->get();
		if($query->num_rows==1)
		{
			foreach ($query->result() as $row)
			{
				return $row->email;
			}
		}
		else
		{
			return false;
		}
	}
	
} ?>