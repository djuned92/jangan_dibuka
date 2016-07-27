<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_sk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('nilai_pegawai_model','nilai_pegawai');
	}

	public function index($tahun = NULL)
	{
		$data['tahun'] = $$tahun = $this->nilai_pegawai->get_tahun();
		$this->template->admin('cetak_sk','script',$data);	
	}

}

/* End of file Cetak_sk.php */
/* Location: ./application/modules/admin/controllers/Cetak_sk.php */