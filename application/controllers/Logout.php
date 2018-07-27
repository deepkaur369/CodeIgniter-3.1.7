<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function __construct(){
 
        parent::__construct();  
        $this->load->library('session');
        $this->load->library('form_validation');
  	 	$this->load->helper(array('form','url'));
       }

       public function index(){
       //	$this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('pass');
        $this->session->sess_destroy();


        // Set Message
        $this->session->set_flashdata('logged_out','You have been Logged Out');
        redirect('/Login');

       }

        public function commentPostLogOut(){
       // $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('pass');
        $this->session->unset_userdata('comment');
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();


        // Set Message
        $this->session->set_flashdata('logged_out','You have been Logged Out');
        redirect('/Comment');

       }
    }
 ?>