<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan_pegawai extends CI_Controller {

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
		$this->load->model(array(
			'pegawai_model'				=> 'pegawai',
			// 'kriteria_tahunan_model'	=> 'kriteria_tahunan',
			'jabatan_model'				=> 'jabatan'
			));

		$data['pegawai'] = $this->pegawai->pegawai_staff();
		$data['jabatan'] = $this->jabatan->jabatan_kosong();
		$this->template->spv('usulan_pegawai','script',$data);
	}

	public function create()
	{
		$this->load->model(array(
			'nilai_pegawai_model'	=> 'nilai_pegawai',
			'pegawai_model'			=> 'pegawai',
			'jabatan_model'			=> 'jabatan'	
			));
		
		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('id_pegawai[]','Id Pegawai','required');
		if($this->form_validation->run() == FALSE)
		{
			$data['pegawai'] = $this->pegawai->pegawai_staff();
			$data['jabatan'] = $this->jabatan->jabatan_kosong();
			$this->template->spv('usulan_pegawai','script',$data);
		}
		else 
		{
			$this->nilai_pegawai->create_usulan_pegawai();
			redirect('spv/usulan_pegawai');
		}	
	}
}