<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_sk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level_user') != 'Admin')
		{
			redirect('auth/users');
		}
		
		$this->load->model('nilai_pegawai_model','nilai_pegawai');
		$this->load->model('pegawai_model','pegawai');
	}

	public function index($tahun = NULL)
	{
		$data['tahun'] = $this->nilai_pegawai->get_tahun();
		$data['cetak_sk_pegawai'] = $this->nilai_pegawai->cetak_sk($tahun);
		$this->template->admin('cetak_sk','script',$data);	
	}

	// cetak sk
	public function cetak($tahun = NULL)
	{
		$data['tahun'] = $this->nilai_pegawai->get_tahun();
		$data['cetak_sk_pegawai'] = $this->nilai_pegawai->cetak_sk($tahun);
		$this->load->view('cetak', $data);	
	}

	// download sk
	public function download($tahun)
	{
		ob_start();
		// $data['tahun'] = $this->nilai_pegawai->get_tahun();
		$data['cetak_sk_pegawai'] = $this->nilai_pegawai->cetak_sk($tahun);
		$this->load->view('download', $data);	
		$html = ob_get_contents();
		

		require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        ob_end_clean();
        $pdf->Output('surat_sk_promosi.pdf','D');
	}

}

/* End of file Cetak_sk.php */
/* Location: ./application/modules/admin/controllers/Cetak_sk.php */