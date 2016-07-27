<?php

class Sertifikat_diklat_model extends CI_Model{

	public function get_all()
	{
		$q = $this->db->select('sk.*, p.nama')
					  ->from('sertifikat_diklat as sk')
					  ->join('pegawai as p', 'sk.id_pegawai = p.id_pegawai')
					  ->order_by('id_serdik','DESC')
					  ->get();
		return $q->result();
	}

	public function get_by_id_pegawai($id_pegawai)
	{
		$q = $this->db->select('sk.*, p.nama')
					  ->from('sertifikat_diklat as sk')
					  ->join('pegawai as p', 'sk.id_pegawai = p.id_pegawai')
					  ->where('sk.id_pegawai', $id_pegawai)
					  ->order_by('id_serdik','DESC')
					  ->get();
		return $q->result();	
	}

	public function create()
	{
		$data = array(
			'id_pegawai'	=> $this->input->post('id_pegawai'),
			'no_serdik'		=> $this->input->post('no_serdik'),
			'nama_serdik'	=> $this->input->post('nama_serdik'),
			'tanggal_mulai'	=> $this->input->post('tanggal_mulai'),
			'tanggal_selesai'=> $this->input->post('tanggal_selesai'),
			'nilai'			=> $this->input->post('nilai'),
			'bukti_serdik'	=> $this->upload->data('file_name')
			);
		$this->db->insert('sertifikat_diklat', $data);
	}

	public function update($id, $data)
	{

		$data = array(
			'id_pegawai'	=> $this->input->post('id_pegawai'),
			'no_serdik'		=> $this->input->post('no_serdik'),
			'nama_serdik'	=> $this->input->post('nama_serdik'),
			'tanggal_mulai'	=> $this->input->post('tanggal_mulai'),
			'tanggal_selesai'=> $this->input->post('tanggal_selesai'),
			'nilai'			=> $this->input->post('nilai'),
			'bukti_serdik' 	=> $this->upload->data('file_name')
			);
		$this->db->where('id_serdik', $id)->update('sertifikat_diklat', $data);
	}

	public function update_not_foto($id, $data) // scan sertifikat diklat
	{

			$data = array(
			'id_pegawai'	=> $this->input->post('id_pegawai'),
			'no_serdik'		=> $this->input->post('no_serdik'),
			'nama_serdik'	=> $this->input->post('nama_serdik'),
			'tanggal_mulai'	=> $this->input->post('tanggal_mulai'),
			'tanggal_selesai'=> $this->input->post('tanggal_selesai'),
			'nilai'			=> $this->input->post('nilai')
			);
		$this->db->where('id_serdik', $id)->update('sertifikat_diklat', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_serdik',$id)->delete('sertifikat_diklat');
	}
}