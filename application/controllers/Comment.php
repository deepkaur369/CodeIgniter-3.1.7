<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	         public function __construct(){
 
                  parent::__construct();  
                  $this->load->model('Comment_mode');
                  $this->load->model('Login_model');
                  $this->load->model('Registration_model');
  	 	            $this->load->helper(array('form','url'));
  	 	            $this->load->library('session');
                  $this->load->library('upload');
                  $this->load->library('table');
                  $this->load->helper('html');
        
            }
           
          public function index()
          {
            $view['value'] = $this->Comment_model->index(); 
            $this->load->view('comment_view', $view); 
          }   

          public function CommentPost(){
            $id = $this->uri->segment(3);
            $data['result'] = $this->Comment_model->CommentPost($id);
            /*session create for post ID   */
            $this->session->set_userdata('id',$id);
            $data['id'] = $this->session->userdata();
            $data['PostComment']= $this->Comment_model->getOnePostComment($id);
            $this->load->view('singlePostComment_view', $data );
          }  
         
          public function loginForComment(){
            if(!$this->session->userdata('user') ){
              if($this->input->post('comment')){
                $comment = $this->input->post('comment'); 
                $this->session->set_userdata('comment',$comment);
              }                       
                $dataComment['comment']=$this->session->userdata('comment');
                $this->load->view("login_view");
                  if($this->input->post('user')){  
                    $user_login=array( 
                    'user'=>$this->input->post('user'),
                    'pass'=>md5($this->input->post('pass'))               
                    );
                    $data=$this->Comment_model->loginForComment($user_login['user'],$user_login['pass']);                
                      if($data){        
                        $id=$this->session->userdata('id'); 
                        $this->session->set_userdata('user',$data['user']);
                        $data['userdata'] = $this->session->userdata();
                        redirect('/Comment/CommentPost/'.$id,$dataComment );
                      }
                      else{
                        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
                      }
                    }
                  }
                  else{
                    $this->session->set_userdata('comment',$_POST['comment']);
                    $data['postcode']=$this->session->userdata('id'); 
                    $data['post_comment']=$this->session->userdata('comment');
                    $data['user']    =$this->session->userdata('user');
                    $insertCommentPost = $this->Comment_model->insertComment($data);
                      if($insertCommentPost){ 
                         redirect('/Comment/CommentPost/'.$data['postcode'] );
                      }
                  }  
              }
            }
?>