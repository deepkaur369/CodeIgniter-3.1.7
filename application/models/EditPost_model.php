<?php
class EditPost_model extends CI_Model{

	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function display($id){

    	$this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('code',$id);
        $query = $this->db->get();
        return $result = $query->result();
    }


    function edit($data , $id){

        $this->db->where('code', $id);
    	$this->db->update('user_info', $data);
  		redirect('/ViewPost/checkPost');    	
    }
 }
?>


