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
		$form_elem=Array('User Name'=>Array('name'=>'UserName','id'=>'uid','type'=>'text','label'=>'User Name:'),'Password'=>Array('name'=>'Password','id'=>'pass','type'=>'password','label'=>'Password:'),'Submit'=>Array('value'=>'Log In','type'=>'submit'));
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
		$this->load->view('admin_login',$data);
		

	}
	public function validate(){
		//check in SQL
		echo "User:".$_POST['UserName'].";Password:".$_POST['Password'];
		
	}
}