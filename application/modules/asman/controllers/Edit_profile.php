<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level_user') != 'Asman')
		{
			redirect('auth/users');
		}
	}

	public function index($id = NULL)
	{
		$this->load->model('pegawai_model','pegawai');
		$this->load->model('jabatan_model','jabatan');

		$this->form_validation->set_rules('nip','Nip','required'); // trigger bootstrap form validation
		if($this->form_validation->run() == FALSE)
		{
			$id = $this->session->userdata('id_pegawai'); 
			$data['pegawai'] = $this->pegawai->get_by_id($id);
			$data['jabatan'] = $this->jabatan->get_all();
			$this->template->asman('edit_profile','script',$data);
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
				
	           	$this->upload->initialize($config); // $this->load->library('upload', $config) karena gk bisa pake yang $this->upload->initialize($config);

	            if ( ! $this->upload->do_upload('userfile'))
	            {
	                //file gagal di upload -> kembali ke form tambah
			    	$error = array('error' => $this->upload->display_errors());
			    	echo $error;
	            }
	            else // dengan foto di isi
	            {
	            	$this->pegawai->update($id);
					$this->session->set_flashdata('update_profile','Profile berhasil diperbaharui');
					redirect('asman/home');
	            }
	        }
            else // tanpa foto di isi
            {
            	$this->pegawai->update_not_foto($id);
				$this->session->set_flashdata('update_profile','Profile berhasil diperbaharui');
				redirect('asman/home');
            }
		}
	}
}