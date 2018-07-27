<?php
class ViewPost_model extends CI_Model{

	         function __construct()
            {
                  // Call the Model constructor
                  parent::__construct();
            }

            function checkPost($user){
                  $this->db->select('*');
                  $this->db->from('user_info'); 
                  $this->db->where('user',$user);
                  $query = $this->db->get();
                  return $result = $query->result();
             }

            function deletePost($id){
  
                $this->db->where('code',$id);
                $this->db->delete('user_info');

            }
  }
?>