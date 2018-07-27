<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	   public function __construct(){
 
        parent::__construct();  
        $this->load->model('Login_model');
  	 	  $this->load->library('form_validation');
  	   	$this->load->helper(array('form','url'));
  	 	  $this->load->library('session');
    }

    public function index(){
		    $this->load->view("login_view");
	}

	  public function loginUser(){
  			$user_login=array( 
  			'user'=>$this->input->post('user'),
  			'pass'=>md5($this->input->post('pass'))
    	);	
  			$data=$this->Login_model->loginUser($user_login['user'],$user_login['pass']);
  			if($data){
      			$this->session->set_userdata('user',$data['user']);
      			$data['userdata'] = $this->session->userdata();
				    redirect('/CreatePost');
        }
			 else{
        		$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        		$this->load->view("login_view");
     	 }
		}
}
?>