<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres - Modified :Manik
 * Description: Login model class
 */
class Admin_list extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function getDeadline(){
            $this->load->database();
              $sql='SELECT DATE_FORMAT(deadline, \'%d-%m-%Y\') as deadline FROM (`hostel_info`)';
		$query=$this->db->query($sql);
		        if($query->num_rows == 1)
		        {
			        $row=$query->result();
			        return $row[0]->deadline;
			        
		        }
	    
    }
    public function getList(){
        // grab user input
        $this->load->database();
        			$this->load->model('student_verification');

        $gender = $this->security->xss_clean($this->input->get('gender'));
        $r_pref = $this->security->xss_clean($this->input->get('room_preference1'));
		$prog = $this->security->xss_clean($this->input->get('program1'));
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
    
    public function getWrongInfoReports($roll=''){
	    $this->load->database();
        $this->db->select('report_id,roll_no,reason');
        $this->db->from('wrong_info_reports');
        if($roll!='')
        	        $this->db->where('roll_no', $roll);
        $query=$this->db->get();
        if($query->num_rows >= 1){
        foreach($query->result() as $row)
            	$data[] = Array(
            	'report_id'=>$row->report_id,
            	'roll_no'=>$row->roll_no,
            	'reason'=>$row->reason,
            	'room_type'=>$row->room_type,
            	);
            return $data;
            }
    }
    public function getFalseApplicantsReports($roll=''){
	    $this->load->database();
        $this->db->select('report_id,roll_no,reason');
        $this->db->from('false_applicants_reports');
        if($roll!='')
        	        $this->db->where('roll_no', $roll);
        $query=$this->db->get();
        if($query->num_rows >= 1){
        foreach($query->result() as $row)
            	$data[] = Array(
            	'report_id'=>$row->report_id,
            	'roll_no'=>$row->roll_no,
            	'reason'=>$row->reason,
            	);
        return $data;
            }
    }
    public function deleteFalseReport($id=''){
	    $this->load->database();
        if($id!='')
        		$id=$this->security->xss_clean($this->input->get('rid'));
        $where=Array('report_id'=>$id);
        $query=$this->db->delete('false_applicants_reports',$where);
    }
       public function deleteWrongReport($id=''){
	    $this->load->database();
        if($id!='')
        		$id=$this->security->xss_clean($this->input->get('rid'));
        $where=Array('report_id'=>$id);
        $query=$this->db->delete('wrong_info_reports',$where);
    }
    public function changeHostelInfo($newVals)
	{
		$this->load->database();
		
		
		
		
		$this->db->update('hostel_info', $newVals);
		
	}

    public function getHostelInfo()
	{
		$this->load->database();
		$this->db->from('hostel_info');
		$this->db->select('*');

		        	$query=$this->db->get();

		 if($query->num_rows == 1)
		        {
			        $row=$query->result();
			        $row[0]->deadline=$this->getReadableDate($row[0]->deadline,'-');
			        return $row[0];
			        
		        }

		
	}
	public function getReadableDate($date,$delim){
		$split=explode($delim, $date);
		return $split[2].$delim.$split[1].$delim.$split[0];
	}
	public function getApplicationHistory($duration){
		/*$this->load->helper('date');
		$time = time();
		$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";

		echo mdate($datestring, $time);*/
	}

} ?>