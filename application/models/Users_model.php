<?php

class Users_model extends CI_Model{

	
	public function get_all()
	{
		$query = $this->db->select('u.*,p.nama, p.nip, p.email') //,j.nama_jabatan
			   			  ->from('user as u')
			   			  ->join('pegawai as p','p.id_pegawai = u.id_pegawai')
			   			  // ->join('jabatan as j','j.kode_jabatan = p.kode_jabatan')
						  ->order_by('id_user','ASC')
						  ->get();
		return $query->result();
	}

	public function get_by_id($id)
	{
		$query = $this->db->select('u.*,p.nama, p.nip')
			   			  ->from('user as u')
			   			  ->join('pegawai as p','u.id_pegawai = p.id_pegawai')
						  ->where('id_user', $id)
						  ->limit(1)
						  ->get();
		return $query->row();
	}

	public function aktifasi_user($id, $data)
	{
		$data = array(
			'status'	=> 'Aktif'
			);
		$this->db->where('id_user',$id)->update('user',$data);
	}

	// users register
	public function create_user()
	{
		$this->load->helper('security');

		$pwd = $this->input->post('nip');
		$data = array(
			'id_pegawai'		=> $this->input->post('id_pegawai'),
			'level_user'		=> $this->input->post('level_user'),
			'username'			=> $this->input->post('nip'),
			'password'			=> do_hash($pwd) // password di hash, defaultnya sha1
			);
		$this->db->insert('user',$data);
	}

	public function update_user($id)
	{
		$this->load->helper('security');

		$pwd = $this->input->post('password');
		$data = array(
			'status'			=> $this->input->post('status'),
			'password'			=> do_hash($pwd) // password di hash, defaultnya sha1
			);
		$this->db->where('id_user',$id)->update('user',$data);
	}
	
	public function delete_user($id)
	{
		$this->db->where('id_user', $id)->delete('user');
	}
	
	// cek users login
	public function check_credential()
	{
		$this->load->helper('security');

		$pwd = $this->input->post('password');
		$data = array(
		 		'username'	=> $this->input->post('username'),
		 		'password'	=> do_hash($pwd)
		 	); 

		$query = $this->db->where($data)
		 				  ->limit(1)
		 				  ->get('user');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} 
		else 
		{
			return FALSE;
		}
	}

	// cek username
	public function check_username()
	{
		$data = array(
			'username'	=> $this->input->post('username')
			);
		$query = $this->db->where($data)
		 				  ->limit(1)
		 				  ->get('user');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} 
		else 
		{
			return FALSE;
		}

	}

	// cek status aktif / tidak aktif
	public function check_status_user()
	{
		$data = array(
		 		'username'	=> $this->input->post('username'),
		 		'status'	=> 'Aktif'
		 	); 
		$query = $this->db->where($data)
		 				  ->limit(1)
		 				  ->get('user');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} 
		else 
		{
			return FALSE;
		}	
	}

	public function reset_password($id)
	{
		$this->load->helper('security');
		$password = '123456';
		$data = array(
			'password'	=> do_hash($password)
			);
		$this->db->where('id_user',$id)->update('user', $data);	
	}

	public function update_password($id)
	{
		$this->load->helper('security');
		$password = $this->input->post('password');
		$data = array(
			'password'	=> do_hash($password)
			);
		$this->db->where('id_user',$id)->update('user', $data);
	}
}