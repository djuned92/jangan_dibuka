<?php

class Nilai_pegawai_model extends CI_Model{

	public function create_usulan_pegawai()
	{
		$tahun = $this->input->post('tahun');
		$jabatan = $this->input->post('id_jabatan');
		$id_pegawai = $this->input->post('id_pegawai');

		for($i = 0; $i < count($id_pegawai); $i++)
		{
			$data[] = array(
				'tahun'			=> $tahun,
				'id_jabatan'	=> $jabatan,
				'id_pegawai'	=> $id_pegawai[$i]
				);
		}
		$this->db->insert_batch('nilai_pegawai', $data);
	}

	public function get_tahun() // result semua tahun
	{
		$q = $this->db->select('np.tahun')
					  ->from('nilai_pegawai as np')
					  ->order_by('np.tahun','ASC')
					  ->group_by('np.tahun')
					  ->get();
		return $q->result();	
	}

	public function get_nilai_pegawai($tahun)
	{
		$q = $this->db->select('np.*, p.nama')
					  ->from('nilai_pegawai as np')
					  ->join('pegawai as p','np.id_pegawai = p.id_pegawai')
					  ->where('np.tahun', $tahun)
					  ->get();
		return $q->result();		
	}

	public function get_hasil_usulan() // function untuk lihat hasil usulan spv sdm
	{
		$q = $this->db->select('np.*, p.nip, p.nama, j.*')
					  ->from('nilai_pegawai as np')
					  ->join('pegawai as p','p.id_pegawai = np.id_pegawai')
					  ->join('jabatan as j','j.id_jabatan = np.id_jabatan')
					  ->order_by('np.id_nilai_pegawai','ASC')
					  ->get();
		return $q->result();
	}

	public function detail_nilai_pegawai()
	{
		$where = "kt.tahun = 2014 and kt.id_kriteria = dt.id_kriteria";
		$q = $this->db->select('dt.id_nilai_pegawai, dt.id_kriteria, dt.bobot_nilai,np.*,kt.tahun, kt.id_kriteria, kt.bobot')
				      ->from('detail_nilai as dt')
				      ->join('nilai_pegawai as np','dt.id_nilai_pegawai = np.id_nilai_pegawai')
				      ->join('kriteria_tahunan as kt','kt.tahun = np.tahun')
				      ->where($where)
				      // ->group_by(array('dt.id_nilai_pegawai'))
				      ->order_by('dt.id_detail_nilai','ASC')
				      ->get();
		return $q->result();
	}
}