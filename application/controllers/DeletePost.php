<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeletePost extends CI_Controller {

	public function __construct(){
 
        parent::__construct();  
        $this->load->model('DeletePost_model');
  	 	  $this->load->helper(array('form','url'));
  	 	  $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('table');
        $this->load->helper('html');
        
    }

 
  public function delete(){
    $id = $this->uri->segment(3);
  //$data['user_info'] = $this->ViewPost_model->show_students();
  $data['user_info'] = $this->ViewPost_model->deletePost($id);
  $this->load->view('ViewPost_view', $data);
  }

    }