<?php

class Pesan_model extends CI_Model{

	public function create_message()
	{
		$data = array(
				'username'	=> $this->input->post('username'),
				'masalah'	=> $this->input->post('masalah')
			);
		$this->db->insert('pesan', $data);
	}

	public function get_all()
	{
		$q = $this->db->select('pesan.*')
					  ->from('pesan')
				 	  ->order_by('id_pesan','DESC')
				 	  ->get();

		return $q->result();
	}

	// get 3 pesan teratas
	public function get_pesan()
	{
		$q = $this->db->select('pesan.*')
					  ->from('pesan')
				 	  ->order_by('id_pesan','DESC')
				 	  ->limit(3)
				 	  ->get();

		return $q->result();
	}

	public function get_by_id($id)
	{
		$q = $this->db->select('p.*')
					  ->from('pesan as p')
					  ->where('p.id_pesan',$id)
					  ->get();
		return $q->row();
	}
}