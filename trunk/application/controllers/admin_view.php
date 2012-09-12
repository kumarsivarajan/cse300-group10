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
			$top_bar['curTab']='modify';
			$base_url=base_url();
			$top_bar['base_url']=$base_url;
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
			$data['top_menu'] = $this->load->view('top_bar', $top_bar, true);
		
			$cssfiles[]="styles.css";
			$data['css']=$cssfiles;
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
	
}