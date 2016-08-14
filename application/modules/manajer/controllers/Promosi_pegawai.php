<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promosi_pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level_user') != 'Manajer')
		{
			redirect('auth/users');
		}

		$this->load->model('nilai_pegawai_model','nilai_pegawai');
	}

	public function index()
	{
		// $data[''] = $this->
		$this->template->manajer('promosi_pegawai','script',$data);
	}

}

/* End of file Promosi_pegawai */
/* Location: ./application/modules/manajer/controllers/Promosi_pegawai */