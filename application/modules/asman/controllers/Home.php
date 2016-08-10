<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level_user') != 'Asman')
		{
			redirect('auth/users');
		}

		$this->load->model('jabatan_model','jabatan');
	}

	public function index()
	{
		$data['jabatan'] = $this->jabatan->jabatan_kosong();
		$this->template->asman('index','script', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/modules/asman/controllers/Home.php */