<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditPost extends CI_Controller {

	public function __construct(){
 
        parent::__construct();  
        $this->load->model('EditPost_model');
  	 	  $this->load->library('form_validation');
  	 	  $this->load->helper(array('form','url'));
  	 	  $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('directory');
        
    }

    public function index(){

     	if($this->session->userdata('user') ){
		    $this->load->view("editPost_view");
      	}

      	else{
        	redirect('/Login');
      	}
	}

	public function display(){
		//$data = array();
		$id = $this->uri->segment(3);
        $data['result'] = $this->EditPost_model->display($id);
        $this->load->view('editPost_view', $data);

	}

    public function edit() {
      	$id = $this->uri->segment(3);
        $title   = $this->security->xss_clean($this->input->post('title'));
      	$content    = $this->security->xss_clean($this->input->post('content'));
      	$user=$this->session->userdata('user');

         if(!empty($_FILES['userfile']['name'])){
                $config['upload_path'] =  './assets/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['userfile']['name'];
				      /* Call the codeigniter upload library */
              	$this->load->library('upload', $config);
             	  $this->upload->initialize($config);
             	if($this->upload->do_upload('userfile')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];                 
                }

              	$editData = array('title'=>$title, 
                'content'=>$content,
                'images'=>$config['file_name'],
                'user'=> $user,
                'code'=>$id
                );

              $edit = $this->EditPost_model->edit($editData , $id);
            }
          else{
                $editData = array('title'=>$title, 
                'content'=>$content,
                'user'=> $user,
                'code'=>$id
                );

                $edit = $this->EditPost_model->edit($editData , $id);
              }
     
        }
  	}


 
?>

