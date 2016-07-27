<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_sertifikat_diklat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'pegawai_model'				=> 'pegawai',
			'sertifikat_diklat_model'	=> 'sertifikat_diklat'		
			));

		if ($this->session->userdata('level_user') != 'Admin')
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['sertifikat_diklat'] = $this->sertifikat_diklat->get_all();
		$data['pegawai'] = $this->pegawai->get_all();
		$this->template->admin('kelola_sertifikat_diklat','script',$data);
	}

	public function create()
	{
		$config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024*10; // 10 mb
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
		
		$this->upload->initialize($config); // $this->load->library('upload', $config) karena gk bisa. pake yang $this->upload->initialize($config);

       	if ( ! $this->upload->do_upload('userfile'))
        {
        	//file gagal di upload -> kembali ke form tambah
        	$error = array('error' => $this->upload->display_errors());
        	echo $error;
        }
        else 
        {
			$this->form_validation->set_rules('no_serdik','No Sertifikat Diklat','required'); // sebatas trigger
			if($this->form_validation->run() == FALSE)
			{
				$data['sertifikat_diklat'] = $this->sertifikat_diklat->get_all();
				$data['pegawai'] = $this->pegawai->get_all();
				$this->template->admin('kelola_sertifikat_diklat','script',$data);
			}
			else
			{
				$this->sertifikat_diklat->create();
				$this->session->set_flashdata('create','Sertifikat diklat berhasil ditambah');
				redirect('admin/kelola_sertifikat_diklat');
			}		
		}
	}

	public function update($id)
	{
		if ($_FILES['userfile']['name'] != '') // dengan scan sertifikat diklat di isi
		{
			$config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000; // kb
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload'); // $this->load->library('upload', $config) karena gk bisa pake yang $this->upload->initialize($config);
           	$this->upload->initialize($config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                //file gagal di upload -> kembali ke form tambah
		    	$error = array('error' => $this->upload->display_errors());
		    	echo $error;
            }
	        else
	        {
            	$this->form_validation->set_rules('no_serdik','No Sertifikat Diklat','required'); // sebatas trigger
				if($this->form_validation->run() == FALSE)
				{
					$data['sertifikat_diklat'] = $this->sertifikat_diklat->get_all();
					$data['pegawai'] = $this->pegawai->get_all();
					$this->template->admin('kelola_sertifikat_diklat','script',$data);
				}
				else
				{
					$this->sertifikat_diklat->update($id);
					$this->session->set_flashdata('update','Sertifikat diklat berhasil diperbaharui');
					redirect('admin/kelola_sertifikat_diklat');
				}
            }
        }
        else // tanpa scan sertifikat diklat di isi
        {
        	$this->form_validation->set_rules('no_serdik','No Sertifikat Diklat','required'); // sebatas trigger
			if($this->form_validation->run() == FALSE)
			{
				$data['sertifikat_diklat'] = $this->sertifikat_diklat->get_all();
				$data['pegawai'] = $this->pegawai->get_all();
				$this->template->admin('kelola_sertifikat_diklat','script',$data);
			}
			else
			{
				$this->sertifikat_diklat->update_not_foto($id);
				$this->session->set_flashdata('update','Sertifikat diklat berhasil diperbaharui');
				redirect('admin/kelola_sertifikat_diklat');
			}
        }
	}

	public function delete($id)
	{
		$this->sertifikat_diklat->delete($id);
		$this->session->set_flashdata('delete','Sertifikat diklat berhasil dihapus');
		redirect('admin/kelola_sertifikat_diklat');
	}
}