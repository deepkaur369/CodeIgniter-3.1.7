<?php
class CreatePost_model extends CI_Model{

	     function __construct()
        {
              // Call the Model constructor
              parent::__construct();
        }
       function create($data){
              if($this->db->insert('user_info', $data)){
                  return  true;
              }
              else{
                 return false;
              }
        }
  }

?>