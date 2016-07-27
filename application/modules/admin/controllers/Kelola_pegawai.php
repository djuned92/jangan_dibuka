<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_pegawai extends CI_Controller {

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
		$data['pegawai'] = $this->pegawai->get_all();
		$data['jabatan'] = $this->jabatan->get_all();
		$this->template->admin('kelola_pegawai','script', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('nip','NIP','required'); // sebatas trigger
		if($this->form_validation->run() == FALSE)
		{
			$data['pegawai'] = $this->pegawai->get_all();
			$data['jabatan'] = $this->jabatan->get_all();
			$this->template->admin('kelola_pegawai','script', $data);
		}
		else
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
	        	$this->pegawai->create();
				$this->session->set_flashdata('create','Pegawai berhasil ditambah');
				redirect('admin/kelola_pegawai');	
	        }
		}
	}

	public function update($id)
	{
		$this->form_validation->set_rules('nip','NIP','required'); // sebatas trigger
		if($this->form_validation->run() == FALSE)
		{
			$data['pegawai'] = $this->pegawai->get_all();
			$data['jabatan'] = $this->jabatan->get_all();
			$this->template->admin('kelola_pegawai','script', $data);
		}
		else
		{
			if ($_FILES['userfile']['name'] != '') // dengan foto disi
			{
				$config['upload_path']          = './assets/img/';
	            $config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 1024*10; // 10mb
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
		        else // dengan foto di isi
		        {
		        	$this->pegawai->update($id);
					$this->session->set_flashdata('update','Pegawai berhasil diperbaharui');
					redirect('admin/kelola_pegawai');
		        }
		    }
		    else // tanpa foto di isi
		    {
		    	$this->pegawai->update_not_foto($id);
				$this->session->set_flashdata('update','Pegawai berhasil diperbaharui');
				redirect('admin/kelola_pegawai');
		    }
		}
	}

	public function delete($id)
	{
		$this->pegawai->delete($id);
		$this->session->set_flashdata('delete','Pegawai berhasil dihapus');
		redirect('admin/kelola_pegawai');
	}
}