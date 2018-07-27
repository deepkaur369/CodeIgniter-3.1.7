<?php
class DeletePost_model extends CI_Model{

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function delete($id){
  
  $this->db->where('code',$id);
  $this->db->delete('user_info');

   }
 }