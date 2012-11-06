<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_view extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
     private function check_isvalidated(){
             $this->load->library('session');
			$this->load->helper('url');

        if(! $this->session->userdata('validated')){
            redirect('admin');
        }
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function index()
	{
			$this->load->helper('url');
			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$top_bar['curTab']='home';
			
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('header', $top_bar, true);
		
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['scripts']=Array('jquery.js','graphs/highcharts.js','graphs/modules/exporting.js');
			$this->load->view('admin_home',$data);

		

	}
	
		public function modify($message=""){
			$this->load->helper('url');
			$this->load->helper('form');
			$top_bar['curTab']='modify';
			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('header', $top_bar, true);
			
			
			//by Mayank
			$form_elem = Array('Current_Password'=>Array('input'=>'text','name'=>'current_Password','id'=>'pass','type'=>'password','label'=>'Current Password','class'=>'required'),
								'New_Password'=>Array('input'=>'text','name'=>'new_Password','id'=>'n_pass','type'=>'password','label'=>'New Password','class'=>'required'),
								'Confirm_New_Password'=>Array('input'=>'text','name'=>'confirm_new_Password','id'=>'c_n_pass','type'=>'password','label'=>'Confirm New Password','class'=>'required'), 
								'Change'=>Array('input'=>'submit','value'=>'Change Password','type'=>'submit'));
			$data['form_elem']=$form_elem;
			$form_attr=array('id'=>'modifyForm');
			$data['form_attr']=$form_attr;
			
			
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			
			$data['msg']=$message;
			$data['scripts']=Array('jquery.js','jquery.infieldlabel.js','jquery.validate.js');
			$this->load->view('admin_manage',$data);

	}
	public function showlistmain(){
			$this->load->helper('form');
			$this->load->model('student_verification');
					$this->load->model('admin_list');

		$female=$this->student_verification->getPreferences('F');
		$male=$this->student_verification->getPreferences('M');
		
		$data['m_pref']=$male;
		$data['f_pref']=$female;
		$progList=$this->admin_list->getPrograms();
		
			$this->load->helper('url');
			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$top_bar['curTab']='list';
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('header', $top_bar, true);
			$form_elem = Array('Gender'=>Array('input'=>'select','attributes'=>Array('id'=>'gender'),'name'=>Array('name'=>'gender','label'=>'Gender: '),'values'=>Array('Male', 'Female')),'Program'=>Array('input'=>'select','name'=>Array('name'=>'program1','label'=>'Program: '),'values'=>$progList),'room_pref1'=>Array('input'=>'select','attributes'=>Array('id'=>'pref1'),'name'=>Array('name'=>'room_preference1','label'=>'Room Preference 1:'),'values'=>Array('Loading...')),'Submit'=>Array('input'=>'submit','value'=>'Go!','type'=>'submit'));
			$form_attr=array('id'=>'listForm');
			$data['form_elem']=$form_elem;
			$data['form_attr']=$form_attr;

			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['scripts']=Array('jquery.js','jquery.infieldlabel.js');
		
			$this->load->view('showlist_main',$data);

		
	}
	public function editApp(){
			$this->load->helper('form');
			$this->load->model('student_verification');
			$this->load->model('admin_list');
			$student_data=$this->admin_list->getRecord();
			if($student_data[0]['gender']=='M')
		$availPref=$this->admin_list->getPreferences('M',true);
		else
		
		$availPref=$this->admin_list->getPreferences('F',true);
		
		
		$data['availPref']=$availPref;
		$data['student_data']=$student_data[0];
			$this->load->helper('url');
			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$top_bar['curTab']='list';
		$cssfiles=Array('styles.css','demo_table.css');
			$data['css']=$cssfiles;
				$data['top_menu'] = $this->load->view('header', $top_bar, true);
			$form_elem = Array('status'=>Array('input'=>'select','attributes'=>Array('id'=>'status'),'name'=>Array('name'=>'status','label'=>'Status: '),'values'=>Array('Weak Accept','Weak Reject','Strong Accept','Strong Reject','Waiting')),'room'=>Array('input'=>'select','name'=>Array('name'=>'room','label'=>'Room: '),'values'=>$availPref),'Remarks'=>Array('input'=>'textarea','name'=>'remarks','id'=>'remarks','type'=>'text','cols' => '40','label'=>'remarks'),'notify'=>Array('input'=>'checkbox','id'=>'notify','name'=>'notify','label'=>'Notify?','value'=>'yes'),'Submit'=>Array('input'=>'submit','value'=>'Submit!','type'=>'submit'));
			$form_attr=array('id'=>'listForm');
			$data['form_elem']=$form_elem;
			$data['form_attr']=$form_attr;
			$this->load->library('table');
			$tmpl = array ( 'table_open'  => '<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="for_list">' );

			$this->table->set_template($tmpl);
			
			$this->table->set_heading('Report ID','Reported By', 'Reason');

			$report_arr=$this->admin_list->getWrongInfoReports($student_data[0]['roll_no']);
			//print_r($report_arr);
			$data['byReports']=$this->table->generate($report_arr);
			$data['byLength']=count($report_arr);
			$tmpl = array ( 'table_open'  => '<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="against_list">' );

			$this->table->set_template($tmpl);
			$this->table->set_heading('Report ID','Person Reported', 'Reason');

			$report_arr=$this->admin_list->getFalseApplicantsReports($student_data[0]['roll_no']);
			//print_r($report_arr);
			$data['againstReports']=$this->table->generate($report_arr);
			$data['againstLength']=count($report_arr);

			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['scripts']=Array('jquery.js','jquery.infieldlabel.js','jquery.dataTables.js');
		
			$this->load->view('admin_app_manage',$data);

		
	}
	public function setStatus(){
			$this->load->helper('form');
			$this->load->model('student_verification');
			$this->load->model('add_msg_or_status_model');

			$this->load->model('admin_list');
			$roll=$this->input->get('roll', TRUE);

			$presentStatus=$this->admin_list->getPresentStatus($roll);
			//print_r($presentStatus);
			$newstat = $this->security->xss_clean($this->input->post('status'));
			$newrem = $this->security->xss_clean($this->input->post('remarks'));
			$newroom = $this->security->xss_clean($this->input->post('room'));
			$notify= $this->security->xss_clean($this->input->post('notify'));
				$status='';
			if($newstat==0)
				$status='Weak Accept';
			else if($newstat==1)
				$status='Weak Reject';
			else if($newstat==2)
				$status='Strong Accept';
			else if($newstat==3)
				$status='Strong Reject';
			else if($newstat==4)
				$status='Waiting';
			if($newroom==$presentStatus['room_type']){
				$newroom='';
				}
			if($newstat==$presentStatus['status']){
				$status='';
				}
			if($newrem==$presentStatus['remarks']){
				$newrem='';
				}
							echo $status.":".$newroom.":".$newrem.":".$roll.":".$this->student_verification->getGender($roll).":".$notify;

			$this->admin_list->add_msg_or_status_model->editStatus($roll,$newroom,$status,$newrem);
			if($notify=="yes"){
						$this->load->library('email');
						$this->email->from('hosteliiitd@gmail.com'); // change it to yours

						//$this->email->to($email); // change it to yours
						$student_data=$this->admin_list->getRecord($roll);
						$emailTo=$student_data[0]['email'];
						//print_r($student_data);
						$this->email->to($emailTo); // change it to yours
						echo "<br>To:".$emailTo;
						$this->email->subject('Hostel Application Form:Update');
						$message="Hi, There was an update in your application status. Please refer to the following information.\n";
						foreach($student_data[0] as $key=>$value){
						
							$message.=$key.":".$value."\n";
						}
							$this->email->message($message);
					
				if($this->email->send())
				{
					echo 'Sent!';

				}
				else
				{
					show_error($this->email->print_debugger());
				
				}
		


			}
			
			redirect('Admin_view/showlist');
			
				
	}
	public function getFalseReports()
	{
			$this->load->helper('url');
			$this->load->model('admin_list');

			$base_url=base_url();
			$top_bar['curTab']='FalseReport';
			$top_bar['base_url']=$base_url;
			$data['top_menu'] = $this->load->view('header', $top_bar, true);
			
			$cssfiles=Array('styles.css','demo_table.css');
			$data['css']=$cssfiles;
			//$data['scripts']=Array('jquery.js','jquery.infieldlabel.js');
			$data['scripts']=Array('jquery.js','jquery.dataTables.js');
		
			$this->load->library('table');
			$tmpl = array ( 'table_open'  => '<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="admin_list">' );

			$this->table->set_template($tmpl);
			
			$this->table->set_heading('Report ID','Person Reported', 'Reason');

			$report_arr=$this->admin_list->getFalseApplicantsReports();
			//print_r($report_arr);
			$data['table']=$this->table->generate($report_arr);
			
			$this->load->view('show_report_page',$data);
	}
	public function getWrongReports()
	{
			$this->load->helper('url');
			$this->load->model('admin_list');

			$base_url=base_url();
			$top_bar['curTab']='WrongReport';
			$top_bar['base_url']=$base_url;
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('header', $top_bar, true);
			
			$cssfiles=Array('styles.css','demo_table.css');
			$data['css']=$cssfiles;
			//$data['scripts']=Array('jquery.js','jquery.infieldlabel.js');
			$data['scripts']=Array('jquery.js','jquery.dataTables.js');
		
			$this->load->library('table');
			$tmpl = array ( 'table_open'  => '<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="admin_list">' );

			$this->table->set_template($tmpl);
			
			$this->table->set_heading('Report ID','Reported By', 'Reason');

			$report_arr=$this->admin_list->getWrongInfoReports();
			//print_r($report_arr);
			$data['table']=$this->table->generate($report_arr);
			
			$this->load->view('show_report_page',$data);
	}
			
	
	public function showlist(){
			$this->load->helper('url');
			$top_bar['curTab']='list';
				$this->load->helper('form');
			$this->load->model('student_verification');
		$this->load->model('admin_list');
		   $gender = $this->security->xss_clean($this->input->post('gender'));
        $r_pref = $this->security->xss_clean($this->input->post('room_preference1'));
		$prog = $this->security->xss_clean($this->input->post('program1'));
		echo $gender.':'.$r_pref.':'.$prog.'<br>';
     
		$table=$this->admin_list->getList();
		$progList=$this->admin_list->getPrograms();
		//print_r($table);
		$female=$this->student_verification->getPreferences('F');
		$male=$this->student_verification->getPreferences('M');
		
		$data['m_pref']=$male;
		$data['f_pref']=$female;
		
		$form_elem = Array('Gender'=>Array('input'=>'select','attributes'=>Array('id'=>'gender'),'name'=>Array('name'=>'gender','label'=>'Gender: '),'values'=>Array('Male', 'Female')),'Program'=>Array('input'=>'select','name'=>Array('name'=>'program1','label'=>'Program: '),'values'=>$progList),'room_pref1'=>Array('input'=>'select','attributes'=>Array('id'=>'pref1'),'name'=>Array('name'=>'room_preference1','label'=>'Room Preference 1:'),'values'=>Array('Loading...')),'Submit'=>Array('input'=>'submit','value'=>'Go!','type'=>'submit'));
			$form_attr=array('id'=>'listForm');
			$data['form_elem']=$form_elem;
			$data['form_attr']=$form_attr;

			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$cssfiles=Array('styles.css','demo_table.css');
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('header', $top_bar, true);
			$this->load->library('table');
			$this->load->database();

			$tmpl = array ( 'table_open'  => '<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="admin_list">' );

			$this->table->set_template($tmpl);
			$this->table->set_heading('name', 'Roll No.','Program', 'Location', 'Dist','Status','Room','Status','Edit');
		
			
			foreach($table as $row)
			{
			//	echo 'hello:';
	
			//	print_r($row);
	//				echo 'world';
	
				$this->table->add_row(array($row['f_name'],$row['roll_no'],$row['program'],$row['location'],$row['dist'].' K.M',$row['status'],$row['room_type'],$row['status'],'<button onclick="parent.location=\''.site_url('Admin_view/editApp').'?roll='.$row['roll_no'].'\'">Edit</button>'));
					
			
			}
			//return;
		
			$data['table']=$this->table->generate();
		
			$data['css']=$cssfiles;
			$data['scripts']=Array('jquery.js','jquery.dataTables.js');
		
			$this->load->view('showlist',$data);

		
	}
	
	
	
	
	//Pass change func (to change admin's password) made by Mayank 
	//Called from "views/admin_manage"
	//ISSUES: NEED presently logged in user's USERNAME
	public function pass_change()
	{
		//Load Change Password Module to use its functions
		$this->load->model('change_pass_model');
		$this->load->helper('url');
		
		
		$cur_pass1 = $_POST['current_Password']; //Get current password posted in Form made in views/admin_manage
		$new_pass1 = $_POST['new_Password']; //Get New password posted in Form made in views/admin_manage
		$confirm_new_pass1 = $_POST['confirm_new_Password']; //Get confirm new password posted in Form made in views/admin_manage
		
		
		/* The following line checks if current password as provided by user in form correctly matches the 
			*	password of currently logged in user. It calls check_current_password() function from 
			*	"change_pass_model" MODEL 
			*/		
		$result = $this->change_pass_model->check_current_password($cur_pass1);
		if ($result)
		{
			
			if ($new_pass1 == $confirm_new_pass1)
			{
			
				/*This following line calls "change_the_password()" FUNCTION from "change_pass_model" MODEL and
					changes the password for the currently logged-in user.
				*/
				$this->change_pass_model->change_the_password($new_pass1);
				
				
				$alert="  Your Password has been changed successfully.";
				$this->modify($alert);
				//redirect('Admin_view/modify');
			}
			
			else
			{
				// COMES here when new_password is not same as confirm_new_password field
				$alert="  The 'New Password' field doesn't match 'Confirm New Password' field. Please try again.";
				$this->modify($alert);
				
			}
		}
		else 
		{
		$alert="  Invalid 'Current Password'. Please Try Again.";
				$this->modify($alert);
			  // Comes here when the current user's (who is logged in) password in database does not match
			  // with the one provided in form in the field Current Password.
		
		}
	}
	
}