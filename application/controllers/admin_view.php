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
			$this->load->helper('url');
			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$top_bar['curTab']='list';
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('header', $top_bar, true);
		
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['scripts']=Array('jquery.js','jquery.infieldlabel.js');
		
			$this->load->view('showlist_main',$data);

		
	}
	public function getreports()
	{
			$this->load->helper('url');
			$base_url=base_url();
			$top_bar['curTab']='report';
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
			
			$this->table->set_heading('Person Reported', 'Reason');

			$this->table->add_row('2010061', 'Wrong distance calculated');
			$this->table->add_row('2010044', 'Wrong address submitted to erp');
			
			
			$data['table']=$this->table->generate();
			
			$this->load->view('show_report_page',$data);
	}
			
	
	public function showlist(){
			$this->load->helper('url');
			$top_bar['curTab']='list';
			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$cssfiles=Array('styles.css','demo_table.css');
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('header', $top_bar, true);
			$this->load->library('table');
			$this->load->database();

			$tmpl = array ( 'table_open'  => '<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="admin_list">' );

			$this->table->set_template($tmpl);
			$this->table->set_heading('First name', 'Last name', 'Gender','Roll No.','Program', 'Address', 'email id', 'Distance','Status','Action','Message');
		
			$query = $this->db->query("SELECT first_name,last_name,gender,roll_no,program,location,email,distance,status FROM alloc_list");
			//print_r($query);
			foreach($query->result() as $row)
			{
				/*$row[0]['select']='<select>
						<option value="volvo">Weak accept</option>
		  <option value="saab">Weak reject</option>
		  <option value="mercedes">Strong accept</option>
		  <option value="audi">Strong reject</option>
			<option value="audi">Waiting</option>
													
		</select>';
				
				$row[0]['msg']='<button >add message</button>';*/
				$this->table->add_row(array($row->first_name,$row->last_name,$row->gender,$row->roll_no,$row->program,$row->location,$row->email,$row->distance,$row->status,'<select>
						<option value="volvo">Weak accept</option>
		  <option value="saab">Weak reject</option>
		  <option value="mercedes">Strong accept</option>
		  <option value="audi">Strong reject</option>
			<option value="audi">Waiting</option>
													
		</select>','<button >add message</button>'));
					
			
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