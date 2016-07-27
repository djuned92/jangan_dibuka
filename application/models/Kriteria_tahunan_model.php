<?php

class Kriteria_tahunan_model extends CI_Model{

	public function get_kriteria_tahunan() // get kriteria tahunan
	{
		$q = $this->db->select('kt.*') //('kt.*, k.*')
					  ->from('kriteria_tahunan as kt')
					  // ->join('kriteria as k','k.id_kriteria = kt.id_kriteria')
					  // ->where('kt.tahun',$tahun)
					  // ->group_by(array('k.nama_kriteria','kt.bobot'))
					  ->group_by('kt.tahun')
					  ->get();

		return $q->result();
	}

	public function detail_kriteria_tahunan($tahun)
	{
		// $where = "kt.tahun and kt.id_kriteria = k.id_kriteria";
		$q = $this->db->select('kt.*, k.*')
					  ->from('kriteria_tahunan as kt')
					  ->join('kriteria as k','k.id_kriteria = kt.id_kriteria')
					  ->where('kt.tahun',$tahun)
					  // ->group_by(array('k.nama_kriteria','kt.bobot','kt.tahun'))
					  ->get();
					  
		return $q->result();
	}

	public function get_tahun_kriteria($tahun)
	{
		$q = $this->db->select('kriteria_tahunan.*')
					  ->from('kriteria_tahunan')
					  ->where('kriteria_tahunan.tahun',$tahun)
					  ->get();
	    return $q->row();
	}

	public function create_kriteria_tahunan()
	{
		$tahun = $this->input->post('tahun');
		$id_kriteria = $this->input->post('id_kriteria');
		$bobot = $this->input->post('bobot');

		for($i = 0; $i < count($id_kriteria); $i++)
		{
			$data[] = array(
				'tahun'			=> $tahun,
				'bobot'			=> $bobot[$i],
				'id_kriteria'	=> $id_kriteria[$i]
				);
		}
		$this->db->insert_batch('kriteria_tahunan', $data);

	}

	public function update_bobot_kriteria()
	{
		$id_kriteria_tahunan = $this->input->post('id_kriteria_tahunan');
		$bobot = $this->input->post('bobot');

		for($i = 0; $i < count($id_kriteria_tahunan); $i++)
		{
			$data[] = array(
				'id_kriteria_tahunan'	=> $id_kriteria_tahunan[$i],
				'bobot'					=> $bobot[$i]
				); 
		}
		$this->db->update_batch('kriteria_tahunan', $data, 'id_kriteria_tahunan');
	}

	public function tahun_is_unique()
	{
		$data = $this->input->post('tahun');
		$q = $this->db->select('kriteria_tahunan.tahun')
					  ->where($data)
					  ->limit(1)
					  ->get('kriteria_tahunan');
		if ($q->num_rows() > 0)
		{
			$this->form_validation->set_message('tahun_is_unique','Tahun tersebut sudah pernah dibuat');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}