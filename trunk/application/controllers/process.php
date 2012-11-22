<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {


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
	 
	 
	 function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
     private function check_isvalidated(){
             $this->load->library('session');
			$this->load->helper('url');

        if(! $this->session->userdata('isValidated')){
            redirect('Welcome/name_rollno');
        }
    }
	public function index()
	{
	
	}
	
	
	
	
	function email_user()
	{
		
		$this->load->model('student_verification');

		$this->load->library('email');
		$this->load->library('session');
				$this->load->helper('url');
				$temparr=$student_data=$this->session->all_userdata();
		echo "<br>the email<br>";
					//print_r($temparr);
		//$base_url = base_url();
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['css']=$cssfiles;
		
		
		$roll= $this->session->userdata('roll_no');
		
		
		
		
		
		
		///key being generated here  /////////////////////////////
		$key = '';
		$length=30-strlen($roll);
		list($usec, $sec) = explode(' ', microtime());
		mt_srand((float) $sec + ((float) $usec * 100000));
		
		$inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));

		for($i=0; $i<$length; $i++)
		{
			$key .= $inputs{mt_rand(0,61)};
		}
		$key=$roll.$key;
		echo $key."  --- ".$roll;
		$date_app=$this->student_verification->confirmed_application($key);

		
		///////////////////////////////////////
		
		
		$this->email->from('hosteliiitd@gmail.com'); // change it to yours

		//$this->email->to($email); // change it to yours

		$student_data=$this->session->all_userdata();
		//print_r($student_data);
		//$emailTo=$student_data['email'];
		echo "Email:".$student_data['email'];
		$emailTo=$student_data['email'];
		$this->email->to($emailTo); // change it to yours

		$this->email->subject('Hostel Application Form Verification');
		$urlinfo=site_url('Welcome/address_maps');
		$message="Hi,\n";
		$message.="It seems you had applied for hostel room at IIIT-Delhi, We received the the application from you on ".$date_app."\n";
		$message.="Verify your hostel application by clicking on this link:-
		".$urlinfo."?key=".$key;
		$this->email->message($message);
 
		if($this->email->send())
		{
			echo '<html> <body><h1>Email sent. Follow the link in the email to proceed (Please check the SPAM folder as well)</h1>
			Mail Link : <a href="http://mail.iiitd.ac.in">IIITD:Webmail</a>
			</body> </html>';
							$this->session->sess_destroy();

		}
		else
		{
			show_error($this->email->print_debugger());
			
				$this->session->sess_destroy();

		}

	}
	
	function report_address()
	{
		$this->load->helper('form');
		
		$form_elem=Array( 'report_box'=>Array('input'=>'textarea','name' => 'report_box', 'cols' => '40', 'id'=>'report_box', 'class'=>'required','label'=>'Enter comments', 'defaultValue'=>'enter'),
							'Submit'=>Array('input'=>'submit','value'=>'Submit report','type'=>'submit'));
		$form_attr=array('id'=>'reportForm');
		$data['form_elem']=$form_elem;
		$data['form_attr']=$form_attr;
		$this->load->model('student_verification');
		
		$this->load->helper('url');		
		$base_url = base_url();
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['css']=$cssfiles;
		$navigation_data['navTab']='list';
		$navigation_data['base_url']=$base_url;
		$data['scripts']=Array('jquery.js','jquery.infieldlabel.js','jquery.validate.js');

		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		$this->load->view('report_address',$data);	
	}
	function add_addr_report_to_db()
	{
		$this->load->model('student_verification');
	
		$this->load->helper('url');		
		$base_url = base_url();
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['css']=$cssfiles;
		$navigation_data['navTab']='list';
		$navigation_data['base_url']=$base_url;
		
		
		$this->load->library('session');
		$roll= $this->session->userdata('roll_no');
		
		//$roll=$_POST['roll_report'];
		$comment=$_POST['report_box'];
		
		
		$data['comment']=$comment;
		$data['roll']=$roll;
		
		$data1=$this->student_verification->insertWrongAddressReport($roll, $comment);
		$data['check']=true;
		
		//print_r($data);
		
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		$this->load->view('final_report_addr',$data);
	}
	
	function setDistance(){
		$this->load->library('session');
		$dist=$_GET['dist'];
		if($this->session->userdata('isDistance')==1){
			$this->session->set_userdata('distance', $dist);
			$this->session->set_userdata('isDistance',0);
		}
		
	}
	
	function submit()
	{

			$this->load->model('student_verification');

				$this->load->helper('url');
				$this->load->library('session');
			$data['dist'] = $this->session->userdata('distance');
			$this->student_verification->insertDistance($data['dist']);
			
			if($this->session->userdata('isDistance')==1)
				redirect($this->session->userdata('refered_from'));
		$base_url = base_url();
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['css']=$cssfiles;
		$navigation_data['navTab']='apply';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
				$this->session->sess_destroy();

		$this->load->view('Submit_page',$data);	
	}
	
	
	function format_address()
	{
					$this->load->library('session');
	$this->load->helper('form');
	
		$this->load->helper('url');
		$base_url = base_url();
		$address=str_replace(",", "", $this->session->userdata('address')) ;
		$form_elem=Array('address_box'=>Array('input'=>'textarea','name' => 'address_box', 'onclick'=>'InsertText();' , 'cols' => '40', 'id'=>'address_box', 'class'=>'required','readonly'=>'readonly', 'defaultValue'=>$address,'value'=>$address),
				'Submit'=>Array('input'=>'submit','value'=>'Submit','type'=>'submit'));
		$form_attr=array('id'=>'applyForm');
		$data['form_elem']=$form_elem;
	$cssfiles=Array("styles.css","sidenavigation.css");
		$data['css']=$cssfiles;
		$data['scripts']=Array('jquery.js','jquery.infieldlabel.js','jquery.validate.js');
		$data['address']=$address;
		$navigation_data['navTab']='about';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		
		$this->load->view('format_add',$data);
	}

function format_address_incorrect()
	{
		$this->load->helper('url');
		$base_url = base_url();
		
		$key=$_GET["key"];
		//echo $key;
		$this->load->database();
		
		$this->db->select('first_name, last_name, roll_no, address, email');
		$this->db->from('student_info');
		$this->db->where('random',$key);
		
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['key1'] = $key;
		$data['css']=$cssfiles;
		$institutename='IIIT-D';
		$data['ins_name']=$institutename;
		$navigation_data['navTab']='about';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		$this->load->view('format_address_incorrect', $data);
	}

			
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */