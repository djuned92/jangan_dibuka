<?php

class Detail_nilai_model extends CI_Model{

	public function create_detail_nilai_pegawai()
	{
		$id_kriteria = $this->input->post('id_kriteria');
		$bobot_nilai = $this->input->post('bobot_nilai');

		for($i = 0; $i < count($id_kriteria); $i++)
		{
			$data[] = array(
				'id_nilai_pegawai'	=> $this->input->post('id_nilai_pegawai'),
				'id_kriteria'		=> $id_kriteria[$i],
				'bobot_nilai'		=> $bobot_nilai[$i]
				);
		}
		$this->db->insert_batch('detail_nilai', $data);
	}

	public function check_detail_nilai($id_nilai_pegawai)
	{
		$q = $this->db->select('dn.*,np.id_nilai_pegawai')
						->from('detail_nilai as dn')
						->join('nilai_pegawai as np','dn.id_nilai_pegawai = np.id_nilai_pegawai')
						->where('dn.id_nilai_pegawai',$id_nilai_pegawai)
						->get();
		return $q->result();
	}
}