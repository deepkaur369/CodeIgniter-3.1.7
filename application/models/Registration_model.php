<?php
class registration_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	function checkDuplicateEmail($email)
	{
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('email', $email);
		return $this->db->count_all_results();
	}
	function checkDuplicateUser($user)
	{
		$this->db->select('user');
		$this->db->from('user');
		$this->db->where('user', $user);
		return $this->db->count_all_results();
	}
	
	function insertUser($data)
	{
		if($this->db->insert('user', $data)){
			return  true;
		}
		else{
			return false;
		}
	
	}
}
?>