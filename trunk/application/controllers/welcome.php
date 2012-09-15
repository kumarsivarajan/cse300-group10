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
		$cssfiles[]="styles.css";
		$data['css']=$cssfiles;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		$this->load->view('welcome_message',$data);
		

	}
	function about()
	{
		$this->load->helper('url');
		$base_url = base_url();
		$cssfiles[]="styles.css";
		$data['css']=$cssfiles;
		$institutename='IIIT-D';
		$data['ins_name']=$institutename;
		$navigation_data['navTab']='about';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		
		$this->load->view('about_us',$data);
	}
	function name_rollno()
	{
		$this->load->helper('form');
		$form_elem=Array('Name'=>Array('input'=>'text','name'=>'name','id'=>'name','type'=>'text','label'=>'Your name'),
						'Roll'=>Array('input'=>'text','name'=>'roll','id'=>'roll','type'=>'text','label'=>'Your roll no'),
						'Location'=>Array('input'=>'text','name'=>'location','id'=>'location','type'=>'text','label'=>'Your Location'),
						'Gender'=>Array('input'=>'select','name'=>Array('name'=>'gender','label'=>'Gender: '),'values'=>Array('Male', 'Female')),
						'Program'=>Array('input'=>'select','name'=>Array('name'=>'program1','label'=>'Program: '),'values'=>Array('B. Tech', 'M. Tech','Phd')),
						'room_pref'=>Array('input'=>'select','name'=>Array('name'=>'room_preference','label'=>'Room Preference:'),'values'=>Array('Single','Double','Triple')),
						'Submit'=>Array('input'=>'submit','value'=>'Apply!','type'=>'submit'));
		$form_attr=array('onsubmit'=>'return checkInput()');
		$this->load->helper('url');
		$base_url = base_url();
		$cssfiles[]="styles.css";
		$data['css']=$cssfiles;
		$data['form_elem']=$form_elem;
		$navigation_data['navTab']='apply';
		$navigation_data['base_url']=$base_url;
				$data['scripts']=Array('jquery.js','jquery.infieldlabel.js');
		$data['form_attr']=$form_attr;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		
		$this->load->view('name_rollno',$data);
	}
	function display_details()	
	{	
		
		$this->load->helper('url');
		$base_url = base_url();
		$cssfiles[]="styles.css";
		$data['css']=$cssfiles;
		$program = $_POST['program1'];  // student course as in(mtech,btech)
		$room_preference = $_POST['room_preference']; // room preferesnce (as in type of room single,double ..)
		$name = $_POST['name'];
		//Process $name
		$roll = $_POST['roll'];
		$location=$_POST['location'];
		$gender=$_POST['gender'];
		//Process $age
		$data['name']=$name;
		$data['roll']=$roll;
		$data['location']=$location;
		$data['program']=$program;
		$data['gender']=$gender;
		$data['room_preference']=$room_preference;
		$navigation_data['navTab']='apply';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);

		$this->load->view('display_details',$data);
	}
	
	function validate_student()
	{
		$this->load->model('student_verification');
		$this->load->helper('url');
		$base_url = base_url();
		$cssfiles[]="styles.css";
		$data['css']=$cssfiles;
		
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$location=$_POST['location'];
		$gender=$_POST['gender'];
		$program = $_POST['program1'];  // student course as in(mtech,btech)
		$room_preference = $_POST['room_preference']; // room preferesnce (as in type of room single,double ..)
		
		$data1=Array();
		$data1=$this->student_verification->getinfo($name, $roll);
		
		$data['firstname']=$data1['first_name'];
		$data['roll']=$data1['roll_no'];
		$data['address']=$data1['address'];
		$data['location']=$location;
		$data['program']=$program;
		$data['gender']=$gender;
		$data['room_preference']=$room_preference;		
		
		$navigation_data['navTab']='apply';
		$navigation_data['base_url']=$base_url;
				$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);

		if($data['firstname']=="xxx")
		{
			$this->load->view('error_page');
		}
		else
		{
			$this->load->view('db_info',$data);
		}
	}
	

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */