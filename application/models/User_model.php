<?php
class User_model extends CI_Model {
    public function __construct()
    {
        $this->load->database('default');
    }

    public function get_user($username,$password)
    {
		$query = $this->db->get_where('admin', array('Username' => $username, 'Password' => md5($password)));
        return $query->result_array();
    }
}
