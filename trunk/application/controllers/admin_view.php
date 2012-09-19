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
			$top_bar['curTab']='home';
			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('top_bar', $top_bar, true);
		
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['scripts']=Array('jquery.js','graphs/highcharts.js','graphs/modules/exporting.js');
			$this->load->view('admin_home',$data);

		

	}
	
		public function modify(){
			$this->load->helper('url');
			$this->load->helper('form');
			$top_bar['curTab']='modify';
			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('top_bar', $top_bar, true);
			
			
			//by Mayank
			$form_elem = Array('Current_Password'=>Array('input'=>'text','name'=>'current_Password','id'=>'pass','type'=>'password','label'=>'Current Password','class'=>'required'), 'New_Password'=>Array('input'=>'text','name'=>'new_Password','id'=>'n_pass','type'=>'password','label'=>'New Password','class'=>'required'), 'Confirm_New_Password'=>Array('input'=>'text','name'=>'confirm_new_Password','id'=>'cn_pass','type'=>'password','label'=>'Confirm New Password','class'=>'required'), 'Change'=>Array('input'=>'submit','value'=>'Change Password','type'=>'submit'));
			$data['form_elem']=$form_elem;
			$form_attr=array('id'=>'modifyForm');
			$data['form_attr']=$form_attr;
			
			
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['scripts']=Array('jquery.js','jquery.infieldlabel.js','jquery.validate.js');
			$this->load->view('admin_manage',$data);

	}
	public function showlistmain(){
			$this->load->helper('url');
			$base_url=base_url();
			$top_bar['curTab']='modify';
			$top_bar['base_url']=$base_url;
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('top_bar', $top_bar, true);
		
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['scripts']=Array('jquery.js','jquery.infieldlabel.js');
		
			$this->load->view('showlist_main',$data);

		
	}
	public function showlist(){
			$this->load->helper('url');
			$top_bar['curTab']='modify';
			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$cssfiles=Array('styles.css','demo_table.css');
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('top_bar', $top_bar, true);
			$this->load->library('table');
			$this->load->database();

			$tmpl = array ( 'table_open'  => '<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="admin_list">' );

			$this->table->set_template($tmpl);
			$this->table->set_heading('First name', 'Last name', 'Roll No.', 'Address', 'email id', 'Distance','Status');
		
			$query = $this->db->query("SELECT first_name,last_name,roll_no,address,email,distance,status FROM alloc_list");

		
		
			$data['table']=$this->table->generate($query);
		
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
		
		
		$login_name = $_POST[''];  // ISSUE1 Have to get this Login_name (i.e. currently logged in admin's username) somehow. 
		
		
		$cur_pass1 = $_POST['Current_Password'];
		$new_pass1 = $_POST['New_Password'];
		$confirm_new_pass1 = $_POST['Confirm_New_Password'];
		
		if ($new_pass1 == $confirm_new_pass1)
		{
			if ($this->change_pass_model->check_current_password($cur_pass1, $login_name))
			{
			
				/*This following line calls "change_the_password()" FUNCTION from "change_pass_model" MODEL and
					changes the password for the above user with username "$login_name".
				*/
				$this->change_pass_model->change_the_password($new_pass1);
				
				
				/*
				ISSUE 2 I dont exactly know what to do after changing password. 
				I was thinking to redirect the user to Admin homepage. 
				*/
			}
		}
	}
	
}