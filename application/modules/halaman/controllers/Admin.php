<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// if ($this->session->userdata('level_user') != 'Admin')
		// {
		// 	redirect('auth/users');
		// }
	}

	public function index()
	{
		$this->template->admin('admin/index','admin/mod-script');
	}

	/*ALL FUNCTION KELOLA USERS
	==================================================================================*/
	public function kelola_users()
	{
		$this->load->model('users_model','users'); // table users
		$this->load->model('pegawai_model','pegawai');

		$data['pegawai'] = $this->pegawai->get_all();
		$data['users'] = $this->users->get_all();
		$this->template->admin('admin/kelola_users','admin/mod-script', $data);	
	}

	public function aktifasi_user($id)
	{
		$this->load->model(array(
			'users_model'	=> 'users'
			));
		$this->users->aktifasi_user($id);
		$this->session->set_flashdata('aktifasi_user','User berhasil diaktifasi');
		redirect('halaman/admin/kelola_users');
	}

	public function reset_password($id)
	{
		$this->load->model(array(
			'users_model'	=> 'users'
			));
		$this->users->reset_password($id);
		$this->session->set_flashdata('reset_password','Berhasil mereset password');
		redirect('halaman/admin/kelola_users');	
	}

	public function create_user()
	{
		$this->load->model('users_model','users'); // table user

		$this->form_validation->set_rules('level_user','Level User','required'); // sebatas trigger
		if($this->form_validation->run() == FALSE)
		{
			$this->template->admin('halaman/admin/kelola_users');
		}
		else
		{
			$this->users->create_user();
			$this->session->set_flashdata('create_user','User berhasil ditambah');
			redirect('halaman/admin/kelola_users');
		}		
	}

	public function delete_user($id)
	{
		$this->load->model('users_model','users');

		$this->users->delete_user($id);
		$this->session->set_flashdata('delete_user','User berhasil dihapus');
		redirect('halaman/admin/kelola_users');
	}

	public function edit_profile($id = NULL)
	{
		$this->load->model('pegawai_model','pegawai');

		$this->form_validation->set_rules('nip','Nip','required');
		if($this->form_validation->run() == FALSE)
		{
			/*
			/ quetion = kenapa id_user?
			/ answer = karena session yang diset adalah id_user
			/ table user relasi 1 to m ke pegawai
			*/
			$id = $this->session->userdata('id_pegawai'); 
			$data['pegawai'] = $this->pegawai->get_by_id($id);
			$this->template->admin('halaman/admin/edit_profile','admin/mod-script',$data);
		}
		else 
		{
			$this->pegawai->update_pegawai($id);
			$this->session->set_flashdata('update_profile','Profile berhasil diperbaharui');
			redirect('halaman/admin/index');
		}
	}

	/* ALL FUNCTION MASTER KRITERIA
	===============================================================================================*/
	public function master_kriteria()
	{
		$this->load->model('kriteria_model','kriteria'); // table kriteria
		
		$data['kriteria'] = $this->kriteria->get_kriteria();
		$this->template->admin('admin/master_kriteria','admin/mod-script', $data); 
	}

	public function create_kriteria()
	{
		$this->load->model('kriteria_model','kriteria'); // table bobot kriteria

		$this->form_validation->set_rules('nama_kriteria','Nama Kriteria','required'); // sebatas trigger
		if($this->form_validation->run() == FALSE)
		{
			$this->template->admin('halaman/admin/master_kriteria');
		}
		else
		{
			$this->kriteria->create_kriteria();
			$this->session->set_flashdata('create_kriteria','Kriteria berhasil ditambah');
			redirect('halaman/admin/master_kriteria');
		}		
	}

	/* ALL FUNCTION KRITERIA TAHUNAN
	==================================================================================================*/
	public function kriteria_tahunan()
	{
		$this->load->model('kriteria_tahunan_model','kriteria_tahunan');

		$data['kriteria_tahunan'] = $this->kriteria_tahunan->get_kriteria_tahunan();
		$this->template->admin('admin/kriteria_tahunan','admin/mod-script',$data);
	
	}

	public function detail_kriteria_tahun($tahun)
	{
		$this->load->model('kriteria_tahunan_model','kriteria_tahunan');

		$data['kriteria_tahunan'] = $this->kriteria_tahunan->get_tahun_kriteria($tahun);
		$data['detail_kriteria_tahunan'] = $this->kriteria_tahunan->detail_kriteria_tahunan($tahun);
		$this->template->admin('admin/detail_kriteria_tahunan','admin/mod-script', $data);		
	}

	public function buat_kriteria_tahunan()
	{
		$this->load->model('kriteria_model','kriteria');

		$data['kriteria'] = $this->kriteria->get_kriteria();
		$this->template->admin('admin/buat_kriteria_tahunan','admin/mod-script',$data);		
	}

	public function create_kriteria_tahunan()
	{
		$this->load->model('kriteria_model','kriteria');
		$this->load->model('kriteria_tahunan_model','kriteria_tahunan');

		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('id_kriteria[]','Id Kriteria','required');
		$this->form_validation->set_rules('bobot[]','Bobot','');
		if($this->form_validation->run() == FALSE)
		{
			$data['kriteria'] = $this->kriteria->get_kriteria();
			$this->template->admin('admin/kriteria_tahunan','',$data);
		}
		else 
		{
			$this->kriteria_tahunan->create_kriteria_tahunan();
			redirect('halaman/admin/kriteria_tahunan');
		}
	}

	public function edit_bobot_kriteria($tahun)
	{
		// $this->load->model('kriteria_model','kriteria');
		$this->load->model('kriteria_tahunan_model','kriteria_tahunan');

		$data['kriteria_tahunan'] = $this->kriteria_tahunan->get_tahun_kriteria($tahun);
		$data['detail_kriteria_tahun'] = $this->kriteria_tahunan->detail_kriteria_tahunan($tahun);
		$this->template->admin('admin/edit_bobot_kriteria','admin/mod-script', $data);
	}

	public function update_bobot_kriteria($tahun)
	{
		$this->load->model('kriteria_tahunan_model','kriteria_tahunan');

		$this->form_validation->set_rules('bobot[]','Bobot','required');
		if($this->form_validation->run() == FALSE) 
		{
			$data['kriteria_tahunan'] = $this->kriteria_tahunan->get_tahun_kriteria($tahun);
			$data['detail_kriteria_tahun'] = $this->kriteria_tahunan->detail_kriteria_tahunan($tahun);
			$this->template->admin('admin/edit_bobot_kriteria','admin/mod-script', $data);
		}
		else
		{
			$this->kriteria_tahunan->update_bobot_kriteria($tahun);
			$this->session->set_flashdata('update_bobot_kriteria','Bobot kriteria berhasil diperbaharui');
			redirect('halaman/admin/kriteria_tahunan');
		}	
	}

	public function tahun_is_unique()
	{
		$this->load->model('kriteria_tahunan_model','kriteria_tahunan');

		$this->kriteria_tahunan->tahun_is_unique();
	}

	/* ALL FUNCTION USULAN PEGAWAI
	================================================================================================*/
	public function usulan_pegawai()
	{
		$this->load->model(array(
			'pegawai_model'				=> 'pegawai',
			'kriteria_tahunan_model'	=> 'kriteria_tahunan'
			));

		$data['pegawai'] = $this->pegawai->get_all();
		$this->template->admin('admin/usulan_pegawai','admin/mod-script',$data);
	}

	public function create_usulan_pegawai()
	{
		$this->load->model(array(
			'nilai_pegawai_model'	=> 'nilai_pegawai',
			'pegawai_model'			=> 'pegawai'	
			));
		
		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('id_pegawai[]','Id Pegawai','required');
		if($this->form_validation->run() == FALSE)
		{
			$data['pegawai'] = $this->pegawai->get_all();
			$this->template->admin('admin/usulan_pegawai','admin/mod-script',$data);
		}
		else 
		{
			$this->nilai_pegawai->create_usulan_pegawai();
			redirect('halaman/admin/hasil_usulan_pegawai');
		}	
	}

	// hasil usulan pegawai	
	public function hasil_usulan_pegawai()
	{
		$this->load->model(array(
			'nilai_pegawai_model'	=> 'nilai_pegawai'
			));

		$data['hasil_usulan_pegawai'] = $this->nilai_pegawai->hasil_usulan_pegawai();
		$this->template->admin('admin/hasil_usulan_pegawai','admin/mod-script',$data);
	}

	/* ALL FUNCTION MESSAGE
	==============================================================================================*/
	
	public function read_all_message()
	{
		$this->load->model('pesan_model','pesan'); // table pesan

		$data['pesan'] = $this->pesan->get_all();
		$this->template->admin('');
	}

	public function send_mail()
	{
		$this->load->model(array(
			'pesan_model'	=> 'pesan'
			));
		// $data['pesan'] = $this->pesan->get_by_id($id);
		
		$this->template->admin('admin/send_mail','admin/mod-script');
	}

	public function process_send_mail()
	{
		$this->load->library('email');
		$this->load->model(array(
			'pesan_model'	=> 'pesan'
			));

		$this->form_validation->set_rules('subject','Subject','required');
		$this->form_validation->set_rules('message','Message','required');

		if($this->form_validation->run() == FALSE)
		{
			$this->send_mail();
		}
		else
		{
			$to_email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			// configure email setting
			$config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['mailpath'] = '/usr/bin/sendmail';
            $config['smtp_user'] = 'ahmaddjunaedi92@gmail.com';
            $config['smtp_pass'] = 'junjunned';
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
            	redirect('halaman/admin/index');
            }
            else
            {
            	print_r($this->email->print_debugger());  
            }	
		}	
	}
}