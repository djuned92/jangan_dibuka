<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level_user') != 'SPV SDM')
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$this->load->model('kriteria_model','kriteria'); // table kriteria
		
		$data['kriteria'] = $this->kriteria->get_kriteria();
		$this->template->spv('master_kriteria','script', $data); 
	}

	public function create()
	{
		$this->load->model('kriteria_model','kriteria'); // table bobot kriteria

		$this->form_validation->set_rules('nama_kriteria','Nama Kriteria','required'); // sebatas trigger
		if($this->form_validation->run() == FALSE)
		{
			$this->template->spv('spv/master_kriteria');
		}
		else
		{
			$this->kriteria->create_kriteria();
			$this->session->set_flashdata('create_kriteria','Kriteria berhasil ditambah');
			redirect('spv/master_kriteria');
		}		
	}

}