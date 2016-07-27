<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_penilaian_kinerja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('nilai_pegawai_model','nilai_pegawai');

	}

	public function index()
	{
		$data = $this->nilai_pegawai->detail_nilai_pegawai();
		// echo json_encode($data);
		// echo count($data);

		// $hasil = 0;
		// foreach ($data as $r) 
		// {
		// 	$id = $r->id_nilai_pegawai;
		// 	$evaluasi = $r->bobot * $r->bobot_nilai;
		// 	$hasil += $evaluasi;
		// }
		// echo $hasil;

		foreach($data as $r)
		{
			$evaluasi[] = $r; 
		}
			
		echo "<pre>";
		print_r($evaluasi);
	}

}

/* End of file Hasil_penilaian_kinerja.php */
/* Location: ./application/modules/asman/controllers/Hasil_penilaian_kinerja.php */