<?php

class Nilai_pegawai_model extends CI_Model{

	public function create_usulan_pegawai()
	{
		$tahun = $this->input->post('tahun');
		$status_nilai_pegawai = 'Tidak Dipromosikan';
		$jabatan = $this->input->post('id_jabatan');
		$id_pegawai = $this->input->post('id_pegawai');

		for($i = 0; $i < count($id_pegawai); $i++)
		{
			$data[] = array(
				'tahun'			=> $tahun,
				'status_nilai_pegawai'	=> $status_nilai_pegawai,
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
		$q = $this->db->select('np.*, p.nama, p.nip')
					  ->from('nilai_pegawai as np')
					  ->join('pegawai as p','np.id_pegawai = p.id_pegawai')
					  ->where('np.tahun', $tahun)
					  ->get();
		return $q->result();		
	}

	public function get_hasil_usulan() // function untuk lihat hasil usulan spv sdm
	{
		$q = $this->db->select('np.*, p.nip, p.nama,  j.*')
					  ->from('nilai_pegawai as np')
					  ->join('pegawai as p','p.id_pegawai = np.id_pegawai')
					  ->join('jabatan as j','j.id_jabatan = np.id_jabatan')
					  ->group_by('np.tahun','ASC')
					  // ->order_by('np.id_nilai_pegawai','ASC')
					  ->get();
		return $q->result();
	}

	// untuk tampilan detail  diview join 3 jabatan, pegawai, nilai pegawai
	public function _detail_nilai_pegawai($tahun)
	{
		$q = $this->db->select('j.*,p.*,np.*')
						->from('nilai_pegawai as np')
						->join('pegawai as p','p.id_pegawai = np.id_pegawai')
						->join('jabatan as j','j.id_jabatan = np.id_jabatan')
						->order_by('np.id_nilai_pegawai','ASC')
						->where('np.tahun', $tahun)
						->get();
		return $q->result();
	}

	public function detail_nilai_pegawai($tahun)
	{
		// $where = "np.tahun = $tahun and kt.id_kriteria = dt.id_kriteria";
		$q = $this->db->select('dt.id_detail_nilai, dt.id_nilai_pegawai, dt.id_kriteria, dt.bobot_nilai,np.*,kt.tahun, kt.id_kriteria, kt.bobot')
				      ->from('detail_nilai as dt')
				      ->join('nilai_pegawai as np','dt.id_nilai_pegawai = np.id_nilai_pegawai')
				      ->join('kriteria_tahunan as kt','kt.tahun = np.tahun')
				      ->where('kt.id_kriteria = dt.id_kriteria and np.tahun = ', $tahun)
				      ->get();
		return $q->result();
	}

	public function num_row_nilai_pegawai($tahun)
	{
		$q = $this->db->select('dt.id_nilai_pegawai, np.tahun, np.id_nilai_pegawai')
						->from('detail_nilai as dt')
						->join('nilai_pegawai as np','dt.id_nilai_pegawai = np.id_nilai_pegawai')
						->group_by('dt.id_nilai_pegawai')
						//->where('np.tahun',$tahun)
						->get();
		return $q->num_rows();
		// return $q->result();
	}

	public function promosi($id_nilai_pegawai, $data)
	{
		$data = array(
			'status_nilai_pegawai'	=> 'Dipromosikan'
			);
		$this->db->where('id_nilai_pegawai',$id_nilai_pegawai)->update('nilai_pegawai', $data);
	}

	public function tidak_promosi($id_nilai_pegawai, $data)
	{
		$data = array(
			'status_nilai_pegawai'	=> 'Tidak Dipromosikan'
			);
		$this->db->where('id_nilai_pegawai',$id_nilai_pegawai)->update('nilai_pegawai', $data);
	}

	// untuk cetak sk
	public function cetak_sk($tahun)
	{
		// $where = "np.status_nilai_pegawai = Dipromosikan and np.tahun .$tahun.";
		$q = $this->db->select('np.*, p.*, j.*')
						->from('nilai_pegawai as np')
						->join('pegawai as p','p.id_pegawai = np.id_pegawai')
						->join('jabatan as j','j.id_jabatan = np.id_jabatan')
						->where('np.status_nilai_pegawai = 1 and np.tahun = ', $tahun) // tipe data enum harus berdasarkan colom, 0 artinya kosong 1 dipromosikan dan 2 tidak dipromosikan
						->get();
		return $q->result();
	}
}