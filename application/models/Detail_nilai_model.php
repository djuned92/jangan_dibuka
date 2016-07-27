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
}