<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_user extends CI_Controller {
	public function index(){
		$this->load->library('email');
		$this->email->from('hosteliiitd@gmail.com'); // change it to yours
		$this->email->to('sushant10088@iiitd.ac.in'); // change it to yours
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