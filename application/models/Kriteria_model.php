<?php

class Kriteria_model extends CI_Model{

	public function get_kriteria()
	{
		$q = $this->db->select('k.*')
					  ->from('kriteria as k')
					  ->order_by('k.id_kriteria','ASC')
					  ->get();

		return $q->result();
	}

	public function create_kriteria()
	{
		// table kriteria
		$data = array(
			'nama_kriteria'	=> ucwords($this->input->post('nama_kriteria'))
			);
		$this->db->insert('kriteria', $data);
	}
}