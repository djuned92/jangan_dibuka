<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level_user') != 'Admin')
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$this->load->model('users_model','users'); // table users
		$this->load->model('pegawai_model','pegawai');

		$data['pegawai'] = $this->pegawai->get_all();
		$data['users'] = $this->users->get_all();
		$this->template->admin('kelola_user','script', $data);
	}

	public function create()
	{
		$this->load->model('users_model','users'); // table user

		$this->form_validation->set_rules('level_user','Level User','required'); // sebatas trigger
		if($this->form_validation->run() == FALSE)
		{
			$this->template->admin('kelola_user','script');
		}
		else
		{
			$this->users->create_user();
			$this->session->set_flashdata('create_user','User berhasil ditambah');
			redirect('admin/kelola_user');
		}		
	}

	public function delete($id)
	{
		$this->load->model('users_model','users');

		$this->users->delete_user($id);
		$this->session->set_flashdata('delete_user','User berhasil dihapus');
		redirect('admin/kelola_user');
	}

	public function aktifasi_user($id = NULL)
	{
		$this->load->library('email');
		$this->load->model(array(
			'users_model'	=> 'users'
			));

		$this->form_validation->set_rules('email','Email','required');

		if($this->form_validation->run() == FALSE)
		{
			$this->send_mail();
		}
		else
		{
			$to_email = $this->input->post('email');
			$subject = "Aktifasi User";
			$message = "Kami telah mengaktifasi username anda";

			// configure email setting
			$config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['mailpath'] = '/usr/bin/sendmail';
            $config['smtp_user'] = 'ahmaddjunaedi92@gmail.com';
            $config['smtp_pass'] = 'junjunned92';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $this->email->initialize($config);

            // send email
            $this->email->from('ahmaddjunaedi92@gmail.com','Ahmad Djunaedi');
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);

            if($this->email->send())
            {
				$this->users->aktifasi_user($id);
				$this->session->set_flashdata('aktifasi_user','User berhasil diaktifasi');
				redirect('admin/kelola_user');
            }
            else
            {
            	print_r($this->email->print_debugger());
            }	
		}
	}

	public function reset_password($id = NULL)
	{
		$this->load->library('email');
		$this->load->model(array(
			'users_model'	=> 'users'
			));

		$this->form_validation->set_rules('email','Email','required');

		if($this->form_validation->run() == FALSE)
		{
			$this->send_mail();
		}
		else
		{
			$to_email = $this->input->post('email');
			$subject = "Reset Password";
			$message = "Kami telah mereset password anda menjadi 123456";

			// configure email setting
			$config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['mailpath'] = '/usr/bin/sendmail';
            $config['smtp_user'] = 'ahmaddjunaedi92@gmail.com';
            $config['smtp_pass'] = 'junjunned92';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $this->email->initialize($config);

            // send email
            $this->email->from('ahmaddjunaedi92@gmail.com','Ahmad Djunaedi');
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);

            if($this->email->send())
            {
            	$this->users->reset_password($id);
				$this->session->set_flashdata('reset_password','Berhasil mereset password');
				redirect('admin/kelola_user');
            }
            else
            {
            	print_r($this->email->print_debugger());
            }	
		}
	}
}