<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_usulan_pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('nilai_pegawai_model','nilai_pegawai');

		if ($this->session->userdata('level_user') != 'SPV SDM')
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['hasil_usulan_pegawai'] = $this->nilai_pegawai->get_hasil_usulan();
		$this->template->spv('hasil_usulan_pegawai','script', $data);
	}

}

/* End of file Hasil_usulan_pegawai.php */
/* Location: ./application/modules/spv/controllers/Hasil_usulan_pegawai.php */