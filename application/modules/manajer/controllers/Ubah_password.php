<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level_user') != 'Manajer')
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$this->load->helper('security');
		$this->load->model('users_model', 'users');

		$id = $this->session->userdata('id_user');
		$data = $this->users->get_by_id($id);
		$data = array(
			'username'	=> $data->username,
			'password'	=> $data->password
			);
		$this->session->set_userdata($data);

		$this->form_validation->set_rules('old_password','Password Lama','required', array(
			'required'	=> 'Password lama tidak boleh kosong'
			));
		$this->form_validation->set_rules('password','Password Baru','required', array(
			'required'	=> 'Password baru tidak boleh kosong'
			));
		$this->form_validation->set_rules('confirm_password','Konfirmasi Password','required|matches[password]', array(
			'required'	=> 'Ulangi password tidak boleh kosong',
			'matches'	=> 'Ulangi password tidak sama'
			));

		if($this->form_validation->run() == FALSE)
		{
			$this->template->manajer('ubah_password','script');
		}
		else 
		{
			$password = $this->input->post('old_password');
			if (do_hash($password) == $this->session->userdata('password'))
			{
				$this->users->update_password($id);
				redirect('manajer/home');
			}
			else
			{
				$this->session->set_flashdata('wrong_password','Password lama salah');
				redirect('manajer/ubah_password');
			}	
		}
	}
	
}