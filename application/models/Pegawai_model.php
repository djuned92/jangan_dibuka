<?php

class Pegawai_model extends CI_Model{

	// table user dan pegawai
	public function get_by_id($id)
	{
		$q = $this->db->select('p.*')
					  ->from('pegawai as p')
					  ->where('p.id_pegawai', $id)
					  ->limit(1)
					  ->get();
		return $q->row();
	}

	public function get_all()
	{
		// $where = "p.jabatan = 'Staff'";
		$q = $this->db->select('p.*,j.nama_jabatan')
				  	  ->from('pegawai as p')
				  	  ->join('jabatan as j','j.id_jabatan = p.id_jabatan')
				  	  // ->where($where)
				  	  ->order_by('p.id_pegawai','DESC')
				  	  ->get();
	  	return $q->result();
	}

	public function pegawai_staff()
	{
		$where = "p.id_jabatan = '4' || p.id_jabatan = '6' || 
		p.id_jabatan = '8' || p.id_jabatan = '10' || 
		p.id_jabatan = '12' || p.id_jabatan = '12'";
		$q = $this->db->select('p.*, j.*')
				  	  ->from('pegawai as p')
				  	  ->join('jabatan as j','p.id_jabatan = j.id_jabatan')
				  	  ->where($where)
				  	  ->order_by('p.id_pegawai','DESC')
				  	  ->get();
	  	return $q->result();	
	}

	public function create()
	{
		$data = array(
			'nip' 			=> $this->input->post('nip'),
			'nama' 			=> ucwords($this->input->post('nama')),
			'id_jabatan'	=> $this->input->post('id_jabatan'),
			'tempat' 		=> ucwords($this->input->post('tempat')),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'email'		 	=> $this->input->post('email'),
			'alamat' 		=> $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'pendidikan' 	=> $this->input->post('pendidikan'),
			'mulai_bekerja' => $this->input->post('mulai_bekerja'),
			'foto' 			=> $this->upload->data('file_name'),
			'status' 		=> $this->input->post('status')
			);
		$this->db->insert('pegawai', $data);
	}

	public function update($id, $data)
	{

		$data = array(
			'nip' 			=> $this->input->post('nip'),
			'nama' 			=> ucwords($this->input->post('nama')),
			'id_jabatan'	=> $this->input->post('id_jabatan'),
			'tempat' 		=> ucwords($this->input->post('tempat')),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'email'		 	=> $this->input->post('email'),
			'alamat' 		=> $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'pendidikan' 	=> $this->input->post('pendidikan'),
			'mulai_bekerja' => $this->input->post('mulai_bekerja'),
			'foto' 			=> $this->upload->data('file_name'),
			'status' 		=> $this->input->post('status')
			);
		$this->db->where('id_pegawai', $id)->update('pegawai', $data);
	}

	public function update_not_foto($id, $data)
	{

		$data = array(
			'nip' 			=> $this->input->post('nip'),
			'nama' 			=> ucwords($this->input->post('nama')),
			'id_jabatan'	=> $this->input->post('id_jabatan'),
			'tempat' 		=> ucwords($this->input->post('tempat')),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'email'		 	=> $this->input->post('email'),
			'alamat' 		=> $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'pendidikan' 	=> $this->input->post('pendidikan'),
			'mulai_bekerja' => $this->input->post('mulai_bekerja'),
			'status' 		=> $this->input->post('status')
			);
		$this->db->where('id_pegawai', $id)->update('pegawai', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_pegawai',$id)->delete('pegawai');
	}
}
