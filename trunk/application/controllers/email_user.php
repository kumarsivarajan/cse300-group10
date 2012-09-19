<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_user extends CI_Controller {
	public function index(){
		$this->load->library('email');
		$this->load->library('session');

		$this->email->from('hosteliiitd@gmail.com'); // change it to yours
		$student_data=$this->session->all_userdata();
		$emailTo=$student_data['email'];
		$this->email->to($emailTo); // change it to yours
		$this->email->subject('Hostel Application Form Verification');
		$this->email->message('Verify your hostel application by clicking on this link\n');
 
		if($this->email->send())
		{
			echo '<html> <body><h1>Email sent. Follow the link in the email to proceed</h1></body> </html>';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}
}