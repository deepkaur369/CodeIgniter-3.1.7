<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct(){
 
        parent::__construct();  			
  	 	$this->load->model('Registration_model');
  	 	$this->load->library('form_validation');
  	 	$this->load->helper(array('form','url'));
  	 	$this->load->library('javascript');

 
	}
 
	public function index()
	{
		$this->load->view("Registration_view");
	}
 
	public function RegisterUser(){

		
		// $this->form_validation->set_rules('user', 'User', 'trim|required');
		// $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		// $this->form_validation->set_rules('pass', 'Password', 'trim|required');
		// $this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]'); //{10} for 10 digits number
		// $this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');
		// if ($this->form_validation->run() == FALSE){
			 
		// 	$this->load->view('Registration_view');
		// }	
		// else{

			$userName 	= $this->security->xss_clean($this->input->post('user'));
			$email 		= $this->security->xss_clean($this->input->post('email'));
			$password 	= $this->security->xss_clean(md5($this->input->post('pass')));
			$mobile 	= $this->security->xss_clean($this->input->post('mobile'));
			$insertData = array('user'=>$userName,
								
								'email'=>$email,
								
								'pass'=>$password,

								'mobile'=>$mobile

							);

			// $checkDuplicateEmail = $this->Registration_model->checkDuplicateEmail($email);
			// $checkDuplicateUser = $this->Registration_model->checkDuplicateUser($userName);
			// if(($checkDuplicateEmail == 0) && ($checkDuplicateUser==0))
			// {
				$insertUser = $this->Registration_model->insertUser($insertData);
			
				if($insertUser){
					$data['errorMsg'] = 'Successfully register';
	 				$this->load->view('Registration_view',$data);
				}
	 	// 		else{
	 	// 			$data['errorMsg'] = 'Unable to save user. Please try again';
	 	// 			$this->load->view('Registration_view',$data);
	 	// 		}
			// }
	 	// 	else{
	 	// 		$data['errorMsg'] = 'User email or username already exists';
	 	// 		$this->load->view('Registration_view',$data);
	 	// 	}
		//}
	}

public function checkDuplicateUser()
{
    $user = $this->input->post('user');

    $exists = $this->Registration_model->checkDuplicateUser($user);
        
	if ($exists) {
        echo false; 
    } else {
        echo true;

    }
 }

}
		
?>