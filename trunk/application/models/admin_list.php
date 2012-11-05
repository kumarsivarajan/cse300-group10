<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres - Modified :Manik
 * Description: Login model class
 */
class Admin_list extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     
    public function getList(){
        // grab user input
        $this->load->database();
        			$this->load->model('student_verification');

        $gender = $this->security->xss_clean($this->input->post('gender'));
        $r_pref = $this->security->xss_clean($this->input->post('room_preference1'));
		$prog = $this->security->xss_clean($this->input->post('program1'));
		echo $gender.':'.$r_pref.':'.$prog.'<br>';
        // Prep the query
        $lefttable='applicants_info_';
        $righttable='applicant_status_';
        if($gender==0)
        {
	        $lefttable.='male';
	        $righttable.='male';
        }
        else if($gender==1)
        
        {
	        $lefttable.='female';
	        $righttable.='female';
        }
        else{
	        return false;
        }
        $this->db->select('lt.f_name,lt.roll_no,lt.program_id,lt.location,lt.distance_km,rt.status,rt.room_type,rt.remarks');

        $this->db->where('program_id', $prog);
        $this->db->where('pref_1', $r_pref);
        $this->db->from($lefttable.' lt LEFT OUTER JOIN '.$righttable.' rt ON lt.roll_no=rt.roll_no');

        // Run the query
		$query=$this->db->get();
        if($query->num_rows > 0)
        {
        	foreach($query->result() as $row)
            	$data[] = Array(
            	'f_name'=>$row->f_name,
            	'roll_no'=>$row->roll_no,
            	'program'=>$this->student_verification->getProgLabel($row->program_id),
            	'location'=>$row->location,
            	'dist'=>$row->distance_km,
            	'status'=>$row->status,
            	'remarks'=>$row->remarks,
            	'room_type'=>$this->student_verification->getPrefLabel($row->room_type)
            	);
            return $data;
        }
        return false;
    }
    public function getRecord($roll=''){
        // grab user input
        $this->load->database();
        $this->load->model('student_verification');
        if($roll=='')
        $roll = $_GET['roll'];
        $lefttable='applicants_info_male';
        $righttable='applicant_status_male';
        $this->db->select('lt.f_name,lt.roll_no,lt.program_id,lt.email,lt.date_application,lt.location,,lt.address,lt.distance_km,lt.pref_1,lt.pref_2,lt.contact_no,rt.status,rt.room_type,rt.remarks');

        $this->db->where('lt.roll_no', $roll);
        $this->db->from($lefttable.' lt LEFT OUTER JOIN '.$righttable.' rt ON lt.roll_no=rt.roll_no');
        $gender='M';
        // Run the query
		$query=$this->db->get();
        if($query->num_rows == 0)
        {					$gender='F';			
        			        $this->db->where('lt.roll_no', $roll);

	                $lefttable='applicants_info_female';
	                $righttable='applicant_status_female';
	                  $this->db->from($lefttable.' lt LEFT OUTER JOIN '.$righttable.' rt ON lt.roll_no=rt.roll_no');

        	$query=$this->db->get();
    
        }
        if($query->num_rows == 1){
        foreach($query->result() as $row)
            	$data[] = Array(
            	'f_name'=>$row->f_name,
            	'roll_no'=>$row->roll_no,
            	'program'=>$this->student_verification->getProgLabel($row->program_id),
            	'location'=>$row->location,
            	'dist'=>$row->distance_km,
            	'address'=>$row->address,
            	'date_application'=>$row->date_application,
            	'email'=>$row->email,
            	'contact'=>$row->contact_no,
            	'pref_1'=>$this->student_verification->getPrefLabel($row->pref_2),
            	'pref_2'=>$this->student_verification->getPrefLabel($row->pref_1),
            	'status'=>$row->status,
            	'remarks'=>$row->remarks,
            	'room_type'=>$this->student_verification->getPrefLabel($row->room_type),
            	'gender'=>$gender
            	);
            	if(!isset($data[0]['roll_no']))
            		$data[0]['roll_no']=$roll;
            return $data;
            }
        return false;
    }

    public function getPrograms(){
			$tablename='eav_program';
			$this->load->database();
			$this->db->select('program_id, program_name');

			$this->db->from($tablename);
			//$this->db->where('eav_preferences.preference_id',$tablename.'.preference_id');
			$pquery=$this->db->get();
			if($pquery->num_rows>0){
								$data1=array();

				foreach ($pquery->result() as $row)
				{
					$data1[$row->program_id]=$row->program_name;
					
				}
				return $data1;
				
				}

	}
	public function getPreferences($gender){
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
					$data1[$row->preference_id]=$row->preference_name;
					
				}
				}
				return $data1;
				
				}

	}
	public function getPresentStatus($roll=''){
        // grab user input
        $this->load->database();
        $this->load->model('student_verification');
        
        if($roll=='')
        $roll = $_GET['roll'];
		$gender=$this->student_verification->getGender($roll);
        $righttable='applicant_status_';
        $this->db->select('status,room_type,remarks');
        if($gender=='M')
        	$righttable.='male';
        else if($gender=='F')
        	$righttable.='female';
        $this->db->where('roll_no', $roll);
        $this->db->from($righttable);
       
        // Run the query
		$query=$this->db->get();
        if($query->num_rows == 1){
        foreach($query->result() as $row)
            	$data = Array(
            	'roll_no'=>$roll,
            	'status'=>$row->status,
            	'remarks'=>$row->remarks,
            	'room_type'=>$row->room_type,
            	);
            	if(!isset($data[0]['roll_no']))
            		$data['roll_no']=$roll;
            return $data;
            }
        else
        	return false;
    }




} ?>