<?php

class Jabatan_model extends CI_Model{

	public function get_all()
	{
		$q = $this->db->select('j.*')
					  ->from('jabatan as j')
					  ->order_by('id_jabatan','ASC')
					  ->get();
		return $q->result();
	}

	public function jabatan_pegawai($id_jabatan)
	{
		$q = $this->db->select('j.*, p.*')
					  ->from('jabatan as j')
					  ->join('pegawai as p','p.id_jabatan = j.id_jabatan')
					  ->where('j.id_jabatan',$id_jabatan)
					  ->get();
		return $q->result();
	}

	public function jabatan_kosong()
	{
		$q = $this->db->select('j.*')
					  ->from('jabatan as j')
					  ->where('j.status_jabatan','Kosong')
					  ->get();
		return $q->result();
	}

	public function ada($id_jabatan, $data)
	{
		$data = array(
			'status_jabatan'	=> 'Ada'
			);
		$this->db->where('id_jabatan',$id_jabatan)->update('jabatan', $data);
	}

	public function kosong($id_jabatan, $data)
	{
		$data = array(
			'status_jabatan'	=> 'Kosong'
			);
		$this->db->where('id_jabatan',$id_jabatan)->update('jabatan', $data);
	}
}