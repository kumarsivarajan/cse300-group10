<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Address_Maps extends CI_Controller {

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
		// Load the library
		//$this->load->library('googlemaps');
		// Initialize our map. Here you can also pass in additional parameters for customising the map (see below)
		//$this->googlemaps->initialize();
		// Create the map. This will return the Javascript to be included in our pages <head></head> section and the HTML code to be
		// placed where we want the map to appear.
		//$data['map'] = $this->googlemaps->create_map();
		// Load our view, passing the map data that has just been created
		//$this->load->view('maps_page', $data);
		$this->load->helper('url');

		$this->load->helper('date');
		$time = time();
		$base_url = base_url();
		date_default_timezone_set('Asia/Calcutta');
		
		$format = 'DATE_RFC822';
		$datestring = standard_date($format,$time);
		$data['date']=$datestring;
		$navigation_data['navTab']='home';
		$navigation_data['base_url']=$base_url;
		$cssfiles[]="styles.css";
		$data['css']=$cssfiles;
		$data['content_navigation'] = $this->load->view('navigation_bar', $navigation_data, true);
		//$this->load->view('maps_page',$data);
		
		$this->load->library('googlemaps');
		$config['center'] = 'Indraprastha Institute of Information Technology, Delhi';
		$config['zoom']=10;
		$this->googlemaps->initialize($config);
		
		$marker = array();
		$marker['position'] = 'Indraprastha Institute of Information Technology, Delhi';
		$marker['title']='Indraprastha Institute of Information Technology, Delhi';
		$this->googlemaps->add_marker($marker);
		
		// 30km radius
		$circle = array();
		$circle['center'] = 'Indraprastha Institute of Information Technology, Delhi';
		$circle['radius'] = '30000';
		$this->googlemaps->add_circle($circle);
		
		
		
		$data['map'] = $this->googlemaps->create_map();
		// Load our view, passing the map data that has just been created
		$this->load->view('address_maps_page', $data);
		

	}
	
}