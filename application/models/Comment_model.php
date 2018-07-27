<?php
class Comment_model extends CI_Model{

	 function __construct()
    {
      // Call the Model constructor
      parent::__construct();
    }

    function index(){
      $this->db->select('*');
      $this->db->from('user_info');
      $query = $this->db->get();
      return $result = $query->result();
      }
    function CommentPost($id){
      $this->db->select('*');
      $this->db->from('user_info');
      $this->db->where('code',$id);
      $query = $this->db->get();
      return $result = $query->result();
    }

    function loginForComment($user,$pass){
      $this->db->select('user');
      $this->db->from('user');
      $this->db->where('user', $user);
      $this->db->where('pass', $pass);
      if($query=$this->db->get()){                                  
        return $query->row_array();
      }
      else{
        return false;
      }
    }
    function insertComment($data){
      if($this->db->insert('comment', $data)){
        $this->db->select('email ,mobile');
        $this->db->from('user');
        $this->db->where('user',$data['user']);
        $query=$this->db ->get();
        $result = $query->row();
        $this->db->where('user',$data['user']);
        $this->db->update('comment',$result);
        print_r($result);
        return  true;
      }
      else{
        return false;
      }
     }

    function getOnePostComment($id){
      $this->db->where('postcode',$id);
      $this->db->select('user ,email,post_comment');
      $this->db->from('comment');
      $query=$this->db ->get();
        return $query->result();

    }
  }
?>