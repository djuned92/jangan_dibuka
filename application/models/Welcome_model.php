<?php

class Welcome_model extends CI_Model{

	// users register
	public function create_user()
	{
		$data = array(
			'username'			=> $this->input->post('username'),
			'password'			=> md5($this->input->post('password')),
			);
		$this->db->insert('users',$data);
	}

	// cek users login
	public function check_credential()
	{
		$data = array(
		 		'username'	=> $this->input->post('username'),
		 		'password'	=> $this->input->post('password')
		 	); 

		$query = $this->db->where($data)
		 				  ->limit(1)
		 				  ->get('users');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} 
		else 
		{
			return FALSE;
		}
	}

	public function get_all()
	{
		$query = $this->db->select('u.*')
			   			  ->from('users u')
						  ->order_by('id_users','DESC')
						  ->get();
		return $query->result();
	}
}