<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_jabatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'pegawai_model'	=> 'pegawai',
			'jabatan_model'	=> 'jabatan'		
			));

		if ($this->session->userdata('level_user') != 'Admin')
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['jabatan'] = $this->jabatan->get_all();
		$this->template->admin('kelola_jabatan','script', $data);
	}

	public function ada($id_jabatan)
	{
		$this->jabatan->ada($id_jabatan);
		$this->session->set_flashdata('ada','Status jabatan berhasil diperbaharui');
		redirect('admin/kelola_jabatan');
	}

	public function kosong($id_jabatan)
	{
		$this->jabatan->kosong($id_jabatan);
		$this->session->set_flashdata('kosong','Status jabatan berhasil diperbaharui');
		redirect('admin/kelola_jabatan');
	}
}