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
//			$data['scripts']=Array('jquery.js','jquery.infieldlabel.js');
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
			$form_elem = Array('Current_Password'=>Array('input'=>'text','name'=>'Current_Password','id'=>'pass','type'=>'password','label'=>'Current Password'), 'New_Password'=>Array('input'=>'text','name'=>'New_Password','id'=>'n_pass','type'=>'password','label'=>'New Password'), 'Confirm_New_Password'=>Array('input'=>'text','name'=>'Confirm_New_Password','id'=>'cn_pass','type'=>'password','label'=>'Confirm New Password'), 'Change'=>Array('input'=>'submit','value'=>'Change Password','type'=>'submit'));
			$data['form_elem']=$form_elem;
			
			
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			
			//A little issue here [Java script not working] (or I dont know how to make it work)
//			$data['scripts']=Array('jquery.js','jquery.infieldlabel.js');
			
			
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
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('top_bar', $top_bar, true);
		
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
//			$data['scripts']=Array('jquery.js','jquery.infieldlabel.js');
		
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
		
		$cur_pass1 = $_POST['Current_Password']; //Get current password posted in Form made in views/admin_manage
		$new_pass1 = $_POST['New_Password']; //Get New password posted in Form made in views/admin_manage
		$confirm_new_pass1 = $_POST['Confirm_New_Password']; //Get confirm new password posted in Form made in views/admin_manage
		
		
		if ($new_pass1 == $confirm_new_pass1)
		{	
			/* The following line checks if current password as provided by user in form correctly matches the 
			*	password of currently logged in user. It calls check_current_password() function from 
			*	"change_pass_model" MODEL 
			*/				
			if ($this->change_pass_model->check_current_password($cur_pass1))
			{
			
				/*This following line calls "change_the_password()" FUNCTION from "change_pass_model" MODEL and
					changes the password for the currently logged-in user.
				*/
				$this->change_pass_model->change_the_password($new_pass1);
				
				/* FOLLOWING NEEDS TO BE edited/changed TO show user that his password has been chagned. 
				* [MAYBE JAVASCRIPT IS NEEDED in "views/admin_manage" which is ultimately called by the
				*  following redirect]
				*/
				redirect('Admin_view/modify');
				
			}
			
			else
			{
			  // Comes here when the current user's (who is logged in) password in database does not match
			  // with the one provided in form in the field Current Password.
			}
			
		}
		else 
		{
		// COMES here when new_password is not same as confirm_new_password field
		
		}
	}
	
}