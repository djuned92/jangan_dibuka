<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_tahunan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level_user') != 'SPV SDM')
		{
			redirect('auth/users');
		}
	}

	public function index() // $tahun = NULL
	{
		$this->load->model('kriteria_tahunan_model','kriteria_tahunan');
		$this->load->model('kriteria_model','kriteria');
	
		$data['kriteria'] = $this->kriteria->get_kriteria();
		$data['kriteria_tahunan'] = $this->kriteria_tahunan->get_kriteria_tahunan();
		$this->template->spv('kriteria_tahunan','script',$data);
	
	}

	public function create()
	{
		$this->load->model('kriteria_model','kriteria');
		$this->load->model('kriteria_tahunan_model','kriteria_tahunan');

		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('id_kriteria[]','Id Kriteria','required');
		$this->form_validation->set_rules('bobot[]','Bobot','');
		if($this->form_validation->run() == FALSE)
		{
			$data['kriteria'] = $this->kriteria->get_kriteria();
			$this->template->spv('spv/kriteria_tahunan','script',$data);
		}
		else 
		{
			$this->kriteria_tahunan->create_kriteria_tahunan();
			redirect('spv/kriteria_tahunan');
		}
	}

	public function update($tahun)
	{
		$this->load->model('kriteria_tahunan_model','kriteria_tahunan');

		$this->form_validation->set_rules('bobot[]','Bobot','required');
		if($this->form_validation->run() == FALSE) 
		{
			$this->template->spv('spv/kriteria_tahunan','script');
		}
		else
		{
			$this->kriteria_tahunan->update_bobot_kriteria($tahun);
			$this->session->set_flashdata('update_bobot_kriteria','Bobot kriteria berhasil diperbaharui');
			redirect('spv/kriteria_tahunan');
		}	
	}

	public function tahun_is_unique()
	{
		$this->load->model('kriteria_tahunan_model','kriteria_tahunan');

		$this->kriteria_tahunan->tahun_is_unique();
	}
}