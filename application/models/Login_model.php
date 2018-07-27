<?php
class login_model extends CI_Model{

	   function __construct()
      {
        // Call the Model constructor
        parent::__construct();
      }

    function loginUser($user,$pass){

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
}
?>