<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreatePost extends CI_Controller {

	public function __construct(){
 
    parent::__construct();  
    $this->load->model('CreatePost_model');
  	$this->load->library('form_validation');
  	$this->load->helper(array('form','url'));
  	$this->load->library('session');
    $this->load->library('upload');
    $this->load->library('directory');
    }

  public function index(){

    if($this->session->userdata('user')){
		  $this->load->view("createPost_view");
    }
    else{
      redirect('/Login');
    }
	}

  public function create(){

    $this->form_validation->set_rules('title', 'Title', 'trim|required');
    $this->form_validation->set_rules('content', 'Content', 'trim|required'); 
      if ($this->form_validation->run() == FALSE){
        $this->load->view('createPost_view');
      } 
      else{
        $title = $this->security->xss_clean($this->input->post('title'));
        $content = $this->security->xss_clean($this->input->post('content'));
        $user=$this->session->userdata('user');
          if(!empty($_FILES['userfile']['name'])){
            $config['upload_path'] =  './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['userfile']['name'];
            $config['max_size'] = '20';
            $this->load->library('upload', $config);
            $this->upload->initialize($config); 
              if ( ! $this->upload->do_upload()){
                $data['errorMsg'] = 'Image size is too long';
                $this->load->view('createPost_view', $data);
              }
              if($this->upload->do_upload('userfile')){
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];                           
                $insertData = array('title'=>$title,                
                                    'content'=>$content,
                                    'images'=>$config['file_name'],
                                    'user'=> $user
                                  );
                $create = $this->CreatePost_model->create($insertData);                                   
                  if($create){
                    redirect('/ViewPost/checkPost');
                  }
                  else{
                    $data['errorMsg'] = 'Unable to save user. Please try again';
                    $this->load->view('createPost_view',$data);
                  }
                }
              }
              else{            
                $data['errorMsg'] = 'Please select the image';
                $this->load->view('createPost_view',$data);
              }
            } 
       }
   }
   
?>