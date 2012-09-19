<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_verification extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	public function getinfo($name,$roll)
	{
		$this->load->database();
		$this->load->library('session');

		//$query = $this->db->query('SELECT first_name, roll_no, address, email FROM student_info WHERE first_name='.$name);
		
		$this->db->select('first_name, roll_no, address, email');
		$this->db->from('student_info');
		$this->db->where('first_name',$name);
		$this->db->where('roll_no',$roll);
		
		
		$query=$this->db->get();
		
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $row)
			{
				$data1=array(
				'first_name'=> $row->first_name,
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
	
	public function get_alloc_info()
	{
			$this->load->database();
			$this->db->select('first_name, roll_no, address, email');
			$this->db->from('student_info');
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
			
			
	
	
	
} ?>