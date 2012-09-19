<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres - Modified :Manik
 * Description: Login model class
 */
class Backend_login extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     
    public function validate(){
        // grab user input
        $this->load->library('session');
        $this->load->database();
        $username = $this->security->xss_clean($this->input->post('UserName'));
        $password = $this->security->xss_clean($this->input->post('Password'));
         
        // Prep the query
        $this->db->where('uid', $username);
        $this->db->where('pwd', $password);
         
        // Run the query
        $query = $this->db->get('admin_users');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'uid' => $row->uid,
                    'name' => $row->name,
                    'lname' => $row->lname,
                    'mail' => $row->mail,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
} ?>