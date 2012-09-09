<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_user extends CI_Controller {
	public function index(){
		$this->load->library('email');
		$this->email->from('hosteliiitd@gmail.com'); // change it to yours
		$this->email->to('cse300-group10@googlegroups.com'); // change it to yours
		$this->email->subject('Test Mail');
		$this->email->message('Code Igniter Mail Works.This is a system generated mail');
 
		if($this->email->send())
		{
			echo 'Email sent.';
			}
			else
			{
				show_error($this->email->print_debugger());
				}
	}
}