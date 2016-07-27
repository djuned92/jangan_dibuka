<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// if ($this->session->userdata('level_user') != 'Asman')
		// {
		// 	redirect('auth/users');
		// }
	}

	public function index()
	{
		$this->template->asman('asman/index');
	}

	public function penilaian_pegawai($tahun = NULL)
	{
		$this->load->model(array(
			'nilai_pegawai_model'	=> 'nilai_pegawai',
			'kriteria_tahunan_model'	=> 'kriteria_tahunan'
			));
		$data['usulan_pegawai']	= $this->nilai_pegawai->get_hasil_usulan($tahun);
		$data['tahun_kriteria'] = $this->kriteria_tahunan->detail_kriteria_tahunan($tahun);
		$this->template->asman('asman/penilaian_pegawai','asman/script',$data);
	}

	public function create_detail_nilai_pegawai()
	{
		$this->load->model(array(
			'nilai_pegawai_model'	=> 'nilai_pegawai',
			'detail_nilai_model'	=> 'detail_nilai'
			));
		$this->form_validation->set_rules('id_kriteria[]','Id Kriteria');
		$this->form_validation->set_rules('bobot_nilai[]','Bobot Kriteria','required',array(
			'required'	=> 'Bobot tidak boleh kosong'
			));
		if($this->form_validation->run() == FALSE)
		{
			$this->penilaian_pegawai();
		}
		else
		{
			$this->detail_nilai->create_detail_nilai_pegawai();
			$this->session->set_flashdata('create_detail_nilai_pegawai','Pegawai berhasil dinilai');
			redirect('halaman/asman/penilaian_pegawai');
		}
	}

	public function hasil_mfep()
	{
		$this->load->model('nilai_pegawai_model','nilai_pegawai');

		$data = $this->nilai_pegawai->detail_nilai_pegawai();
		// echo json_encode($data);
		foreach($data as $r)
		{
			$datas[] = $r;
		}
		echo "<pre>";
		print_r($datas);
		// // foreach ($data as $r) {
		// // $list [] = $r;
		// // }
		// // echo "<pre>";
		// // print_r($list);
		// // $this->load->view('asman/hasil_mfep',$data);
	}

	/*
	/ id = null, karena pake session berdasarkan id_user yang berelasi sama table pegawai 1 to many
	/ jadi urlnya cuma halaman/asman/edit_profile bukan halaman/asman/edit_profile/id
	/ function ini menghindari user mengedit profile langsung dengan menulis di url nya
	*/
	public function edit_profile($id = NULL)
	{
		$this->load->model('pegawai_model','pegawai');

		$this->form_validation->set_rules('nip','Nip','required'); // trigger bootstrap form validation
		if($this->form_validation->run() == FALSE)
		{
			$id = $this->session->userdata('id_pegawai'); 
			$data['pegawai'] = $this->pegawai->get_by_id($id);
			$this->template->asman('halaman/asman/edit_profile','asman/script',$data);
		}
		else 
		{
			$this->pegawai->update_pegawai($id);
			$this->session->set_flashdata('update_profile','Profile berhasil diperbaharui');
			redirect('halaman/asman/index');
		}
	}

	public function ubah_password()
	{
		$this->load->helper('security');
		$this->load->model('users_model', 'users');

		$id = $this->session->userdata('id_pegawai');
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
			$this->template->asman('asman/ubah_password','asman/script');
		}
		else 
		{
			$password = $this->input->post('old_password');
			if (do_hash($password) == $this->session->userdata('password'))
			{
				$this->users->update_password($id);
				redirect('halaman/asman/index');
			}
			else
			{
				$this->session->set_flashdata('wrong_password','Password lama salah');
				redirect('halaman/asman/ubah_password');
			}
			
		}
	}

}