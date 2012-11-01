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
	 
	 
	public $FName='';
	public $LName='';
	public $Roll='';
	 
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
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['scripts']=Array('jquery.js','graphs/highcharts.js','graphs/modules/exporting.js');
		$data['css']=$cssfiles;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		$this->load->view('welcome_message',$data);
		

	}
	function about()
	{
		$this->load->helper('url');
		$base_url = base_url();
		$cssfiles=Array("styles.css","sidenavigation.css");
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
		$this->load->model('student_verification');
		$female=$this->student_verification->getPreferences('F');
		$male=$this->student_verification->getPreferences('M');
		
		$data['m_pref']=$male;
		$data['f_pref']=$female;
		
		print_r($male);
		
		$form_elem=Array('First_Name'=>Array('input'=>'text','name'=>'fname','id'=>'fname','type'=>'text','label'=>'Your First Name','class'=>'required'),
						 'Last_Name'=>Array('input'=>'text','name'=>'lname','id'=>'lname','type'=>'text','label'=>'Your Last Name','class'=>'required'),
						'Roll'=>Array('input'=>'text','name'=>'roll','id'=>'roll','type'=>'text','label'=>'Your Roll. No.','class'=>'required'),
						'E-mail'=>Array('input'=>'text','name'=>'email','id'=>'email','type'=>'text','label'=>'Your E-mail ID','class'=>'required'),
						'Contact'=>Array('input'=>'text','name'=>'contact','id'=>'contact','type'=>'text','label'=>'Your Contact No.','class'=>'required'),
						'Location'=>Array('input'=>'text','name'=>'location','id'=>'location','type'=>'text','label'=>'Your Location','class'=>'required'),
						'Gender'=>Array('input'=>'select','attributes'=>Array('id'=>'gender'),'name'=>Array('name'=>'gender','label'=>'Gender: '),'values'=>Array('Male', 'Female')),
						'Program'=>Array('input'=>'select','name'=>Array('name'=>'program1','label'=>'Program: '),'values'=>Array('B. Tech', 'M. Tech','Phd')),
						'room_pref1'=>Array('input'=>'select','attributes'=>Array('id'=>'pref1'),'name'=>Array('name'=>'room_preference1','label'=>'Room Preference 1:'),'values'=>Array('Loading...')),
						'room_pref2'=>Array('input'=>'select','attributes'=>Array('id'=>'pref2'),'name'=>Array('name'=>'room_preference2','label'=>'Room Preference 2:')),
						'Submit'=>Array('input'=>'submit','value'=>'Apply!','type'=>'submit'));

		$form_attr=array('id'=>'applyForm');
		$this->load->helper('url');
		$base_url = base_url();
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['css']=$cssfiles;
		$data['form_elem']=$form_elem;
		$navigation_data['navTab']='apply';
		$navigation_data['base_url']=$base_url;
		$data['scripts']=Array('jquery.js','jquery.infieldlabel.js','jquery.validate.js');
		$data['form_attr']=$form_attr;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		
		$this->load->view('name_rollno',$data);
	}
	function display_details()	
	{	
		
		$this->load->helper('url');
		$base_url = base_url();
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['css']=$cssfiles;
		$program = $_POST['program1'];  // student course as in(mtech,btech)
		$email = $_POST['email'];
		$room_preference1 = $_POST['room_preference1']; // room preferesnce (as in type of room single,double ..)
		$room_preference2 = $_POST['room_preference2'];
		$name = $_POST['name'];
		//Process $name
		$roll = $_POST['roll'];
		$location=$_POST['location'];
		$gender=$_POST['gender'];
		//Process $age
		$data['name']=$name;
		$data['roll']=$roll;
		$data['email']=$email;
		$data['location']=$location;
		$data['program']=$program;
		$data['gender']=$gender;
		$data['room_preference1']=$room_preference1;
		$data['room_preference2']=$room_preference2;
		$navigation_data['navTab']='apply';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);

		$this->load->view('display_details',$data);
	}
	
	function validate_student()
	{
		$this->load->model('student_verification');
		$this->load->library('session');
		$this->load->helper('url');
		$base_url = base_url();
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['css']=$cssfiles;
		$roll=$this->security->xss_clean($this->input->post('roll'));
		$fname=$this->security->xss_clean($this->input->post('fname'));

		$navigation_data['navTab']='apply';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);

		$data1=$this->student_verification->dbvalidation($roll,$fname);
		$temparr=$student_data=$this->session->all_userdata();
		echo "<br>the function<br>";
					print_r($temparr);
		if(!is_array($data1)){
					$this->load->view('error_page',$data);
					
		}
		else{
			$data['app_info']=$data1;
			$this->load->view('db_info',$data);
			}
			$temparr=$student_data=$this->session->all_userdata();
		echo "<br>the function ends<br>";
					print_r($temparr);
		
	}
	
	
	function email_user()
	{
		
		$this->load->model('student_verification');

		$this->load->library('email');
		$this->load->library('session');
				$this->load->helper('url');
				$temparr=$student_data=$this->session->all_userdata();
		echo "<br>the email<br>";
					print_r($temparr);
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
		$this->student_verification->confirmed_application($key);

		
		///////////////////////////////////////
		
		
		$this->email->from('hosteliiitd@gmail.com'); // change it to yours

		//$this->email->to($email); // change it to yours

		$student_data=$this->session->all_userdata();
		print_r($student_data);
		//$emailTo=$student_data['email'];
		echo "Email:".$student_data['email'];
		$emailTo=$student_data['email'];
		$this->email->to($emailTo); // change it to yours

		$this->email->subject('Hostel Application Form Verification');
		$urlinfo=site_url('Welcome/address_maps');
		$this->email->message('Verify your hostel application by clicking on this link:-
		'.$urlinfo.'?key='.$key);
 
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
				$this->session->sess_destroy();

	}
	
	function address_maps()
	{
				$this->load->model('student_verification');
	
		$this->load->helper('url');
		$this->load->library('session');

		$this->load->helper('date');
		$time = time();
		$base_url = base_url();
		
		$key=$_GET["key"];
		//echo $key;
		
		$data1=$this->student_verification->getAddress($key);
		if(!is_array($data1))
			return;
		//DATA to be used for plotting purposes
		
		$data['roll']=$data1['roll_no'];
		$data1['distance']=-1;
		$data['distance']=-1;
		$this->session->set_userdata($data1);
		$this->session->set_userdata('refered_from',site_url('Welcome/address_maps').'?key='.$key ); 
		$this->session->set_userdata('isDistance',1); 

		$fname=$data1['first_name'];
		$lname=$data1['last_name'];
		$roll=$data1['roll_no'];
		$address=$data1['address'];
		$email=$data1['email'];
		
		
		
		
		date_default_timezone_set('Asia/Calcutta');
		
		$format = 'DATE_RFC822';
		$datestring = standard_date($format,$time);
		$data['date']=$datestring;
		$navigation_data['navTab']='apply';
		$navigation_data['base_url']=$base_url;
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['scripts']=Array('jquery.js');
		
		
		
		$data['css']=$cssfiles;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		//$this->load->view('maps_page',$data);
		
		$this->load->library('googlemaps');
		$config['center'] = 'Indraprastha Institute of Information Technology, Delhi';
		$config['zoom']=10;
		$config['directions'] = TRUE;
		//remove house no
		$addsplit=explode( ',',$address);
				$data['address']=$address;

		//print_r($addsplit);
		$address='';
		//echo count($addsplit)."<br>";

		for($i=0;$i<count($addsplit);$i++){
			//	echo $addsplit[$i]."<br>";

			if($i==count($addsplit)-1)
			$address.=$addsplit[$i];
			else if($i!=0)
			$address.=$addsplit[$i].',';
			}

		$data['fname']=$fname;
		$data['lname']=$lname;
		
		$config['directionsStart'] = $address;
		$config['directionsEnd'] = 'Indraprastha Institute of Information Technology, Delhi';
		$config['directionsDivID'] = 'directionsDiv';
		$this->googlemaps->initialize($config);
		
		$marker = array();
		$marker['position'] = 'Indraprastha Institute of Information Technology, Delhi';
		$marker['title']='Indraprastha Institute of Information Technology, Delhi';
		
		$marker['infowindow_content'] = 'Institute : IIIT-D Okhla';
		$this->googlemaps->add_marker($marker);
		
		$marker = array();
		$marker['position'] = $address;
		$marker['animation'] = 'DROP';
		$marker['draggable'] = TRUE;
		//$marker['title']='Vikas Kunj';
		$marker['infowindow_content'] = 'Your Address: '.$address;
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		$this->googlemaps->add_marker($marker);
		
		
		
		// 30km radius
		$circle = array();
		$circle['center'] = 'Indraprastha Institute of Information Technology, Delhi';
		$circle['radius'] = '30000';
		$this->googlemaps->add_circle($circle);
		
		$circle = array();
		$circle['center'] = $address;
		$circle['radius'] = '1000';
		$circle['fillColor']='blue';
		$this->googlemaps->add_circle($circle);
		
		//echo $my_lat."hello";
		
		$data['map'] = $this->googlemaps->create_map();
		
		//echo $data['maps']['marker_0']."ji";
		// Load our view, passing the map data that has just been created
		$this->load->view('address_maps_page', $data);
	
	
	}
	function setDistance(){
		$this->load->library('session');
		$dist=$_GET['dist'];
		if($this->session->userdata('isDistance')==1){
			$this->session->set_userdata('distance', $dist);
			$this->session->set_userdata('isDistance',0);
		}
		
	}
	
	
	
	function alloc_list()
	{
		//$this->load->model('student_verification');
		$this->load->helper('url');
		$this->load->library('table');
		$base_url = base_url();
		$cssfiles=Array('styles.css','demo_table.css','sidenavigation.css');
		$data['scripts']=Array('jquery.js','jquery.dataTables.js');
		

		$data['css']=$cssfiles;		

		$navigation_data['navTab']='list';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		
		$this->load->database();
		$this->load->library('table');
		
		$tmpl = array ( 'table_open'  => '<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="allocation_list">' );

		$this->table->set_template($tmpl);
		$this->table->set_heading('name', 'Roll No.','Program', 'Location', 'Dist','Status');
		
		$query = $this->db->query("SELECT name,rollno,program,location,distance,status FROM allocationlist_boys ");
		
		
		
		$data['table']=$this->table->generate($query);
		$this->load->view('allocation_list',$data);
			
			
			
	
	}
	
	function report_person()
	{
		$this->load->helper('url');
		$base_url = base_url();
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['css']=$cssfiles;
		$navigation_data['navTab']='list';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		$this->load->view('report_issue',$data);	
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
	
function format_add()
	{
		$this->load->helper('url');
		$base_url = base_url();
		
		$key=$_GET["key"];
		//echo $key;
		$this->load->database();
		
		$cssfiles=Array("styles.css","sidenavigation.css");
		$data['css']=$cssfiles;
		$institutename='IIIT-D';
		$this->load->database();
		
		$this->db->select('first_name, last_name, roll_no, address, email');
		$this->db->from('student_info');
		$this->db->where('random',$key);
		
		$query=$this->db->get();
		
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $row)
			{
				$data1=array(
						'first_name'=> $row->first_name,
						'last_name'=> $row->last_name,
						'roll_no'=> $row->roll_no,
						'address'=> $row->address,
						'email'=>$row->email,
						'isvalidated'=>true
				);
		
		
			}
		}
		else
		{
			$this->load->view('wrong_link');
			return;
		}
		
		$data['roll']=$data1['roll_no'];
		$data['distance']=-1;
		//$this->session->set_userdata($data);
		//$this->session->set_userdata('refered_from',site_url('Welcome/address_maps').'?key='.$key );
		//$this->session->set_userdata('isDistance',1);
		
		$fname=$data1['first_name'];
		$lname=$data1['last_name'];
		$roll=$data1['roll_no'];
		$address=$data1['address'];
		$email=$data1['email'];
		
		
		//$address = '1059 Vikas Kunj Vikas Puri New Delhi-110018';
		$data['address'] = $address;
		$data['ins_name']=$institutename;
		$navigation_data['navTab']='about';
		$navigation_data['base_url']=$base_url;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		
		$this->load->view('format_address',$data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */