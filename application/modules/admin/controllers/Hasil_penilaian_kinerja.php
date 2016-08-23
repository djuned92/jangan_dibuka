<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_penilaian_kinerja extends CI_Controller {

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
		$data['pegawai'] = $this->pegawai->pegawai_staff(); // detail pegawai staff
		$data['_detail_nilai_pegawai'] = $this->nilai_pegawai->_detail_nilai_pegawai($tahun);
		$data['detail_nilai_pegawai'] = $this->nilai_pegawai->detail_nilai_pegawai($tahun);
		$data['total'] = $this->nilai_pegawai->num_row_nilai_pegawai($tahun); // banyaknya num rows berdasarkan tahun
		$this->template->admin('hasil_penilaian_kinerja','chart',$data);
		// echo json_encode($data);
		// echo count($data);

		// $hasil = 0;
		// for($i=1; $i<=$total; $i++)
		// {
		// 	foreach ($data as $r) 
		// 	{
		// 		if($r->id_nilai_pegawai == $i)
		// 		{
		// 			$evaluasi = $r->bobot * $r->bobot_nilai;
		// 			$hasil += $evaluasi;
		// 		}
		// 	}
		// 	if($hasil !=0 )
		// 	{	
		// 		echo $hasil;
		// 		echo '<br>';
		// 	}
		// 	$hasil = 0; // reset hasil
		// }
		
		// foreach($data as $r)
		// {
		// 	$evaluasi[] = $r; 
		// }
			
		// echo "<pre>";
		// print_r($evaluasi);
	}
}
/* End of file Hasil_penilaian_kinerja.php */
/* Location: ./application/modules/admin/controllers/Hasil_penilaian_kinerja.php */
