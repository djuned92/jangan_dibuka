<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_kinerja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level_user') != 'Asman')
		{
			redirect('auth/users');
		}

		$this->load->model(array(
			'nilai_pegawai_model'	=> 'nilai_pegawai',
			'kriteria_tahunan_model'=> 'kriteria_tahunan',
			'detail_nilai_model'	=> 'detail_nilai'
			));
	}

	public function index($tahun = NULL)
	{
		$data['tahun'] = $this->nilai_pegawai->get_tahun();
		$data['penilaian']	= $this->nilai_pegawai->get_nilai_pegawai($tahun);
		$data['tahun_kriteria'] = $this->kriteria_tahunan->detail_kriteria_tahunan($tahun);
		$this->template->asman('penilaian_kinerja','script',$data);
	}

	public function create()
	{
		$this->form_validation->set_rules('id_kriteria[]','Id Kriteria');
		$this->form_validation->set_rules('bobot_nilai[]','Bobot Kriteria','required',array(
			'required'	=> 'Bobot tidak boleh kosong'
			));
		if($this->form_validation->run() == FALSE)
		{
			$data['usulan_pegawai']	= $this->nilai_pegawai->get_hasil_usulan($tahun);
			$data['tahun_kriteria'] = $this->kriteria_tahunan->detail_kriteria_tahunan($tahun);
			$this->template->asman('penilaian_kinerja','script',$data);
		}
		else
		{
			$tahun = $this->input->post('tahun');

			$this->detail_nilai->create_detail_nilai_pegawai();
			$this->session->set_flashdata('create','Pegawai berhasil dinilai');
			redirect('asman/penilaian_kinerja/index/'.$tahun);
		}
	}
}

/* End of file Penilaian_kinerja.php */
/* Location: ./application/modules/asman/controllers/Penilaian_kinerja.php */