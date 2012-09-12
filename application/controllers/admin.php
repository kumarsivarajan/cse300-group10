<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->helper('form');
		$form_elem=Array('User Name'=>Array('input'=>'text','name'=>'UserName','id'=>'uid','type'=>'text','label'=>'User Name'),'Password'=>Array('input'=>'text','name'=>'Password','id'=>'pass','type'=>'password','label'=>'Password'),'Submit'=>Array('input'=>'submit','value'=>'Log In','type'=>'submit'));
		$this->load->helper('url');
		
		$this->load->helper('date');
		$time = time();
		$base_url = base_url();
		date_default_timezone_set('Asia/Calcutta');
		$institutename='IIIT-D';
		$format = 'DATE_RFC822';
		$datestring = standard_date($format,$time);
		$data['date']=$datestring;
		$data['ins_name']=$institutename;
		$cssfiles[]="styles.css";
		$data['css']=$cssfiles;
		$data['form_elem']=$form_elem;
		$data['scripts']=Array('jquery.js','jquery.infieldlabel.js');
		$this->load->view('admin_login',$data);
		
	}
	public function validate(){
		//Load Login Module
		$this->load->model('backend_login');
        // Validate the user can login
        $this->load->helper('url');
        $result = $this->backend_login->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $this->index();
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('admin_view');
        }       
		
	}
	public function logout(){
	    $this->load->library('session');
        $this->load->helper('url');

        $this->session->sess_destroy();
        redirect('admin');
    }

}