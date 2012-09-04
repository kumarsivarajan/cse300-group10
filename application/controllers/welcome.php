<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

		$this->load->helper('date');
		$time = time();
		$base_url = base_url();

		date_default_timezone_set('Asia/Calcutta');
		$institutename='IIIT-D';
		$cust_message='Bookings are open now'; 
		$format = 'DATE_RFC822';
		$datestring = standard_date($format,$time);
		$data['date']=$datestring;
		$data['ins_name']=$institutename;
		$data['cust_msg']=$cust_message;
		$navigation_data['navTab']='home';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		$this->load->view('welcome_message',$data);
		

	}
	function about()
	{
		$this->load->view('about_us');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */