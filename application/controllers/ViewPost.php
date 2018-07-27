<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewPost extends CI_Controller {

	         public function __construct(){
 
                  parent::__construct();  
                  $this->load->model('ViewPost_model');
  	 	            $this->load->helper(array('form','url'));
  	 	            $this->load->library('session');
                  $this->load->library('upload');
                  $this->load->library('table');
                  $this->load->helper('html');
        
            }

           public function checkPost(){
                //check the user store in a session or not
                  if(!$this->session->userdata('user') ){
                        redirect('/Login');  
                  }

                  else{
 
                       $user=$this->session->userdata('user'); //get the user from the session 
                       $view['value'] = $this->ViewPost_model->checkPost($user); //pass user to the ViewPost_model with arg
                       $this->load->view('ViewPost_view', $view); 
                  }
            }

          public function deletePost(){
                      $id = $this->uri->segment(3); //get the ID from URL 
                      $data['user_info'] = $this->ViewPost_model->deletePost($id);
                      redirect('/ViewPost/checkPost');
           }
  }
  
?>