<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read_all_messages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pesan_model','pesan');

		if ($this->session->userdata('level_user') != 'Admin')
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['message'] = $this->pesan->get_all();
		$this->template->admin('read_all_messages','script',$data);	
	}

}

/* End of file Read_all_messages.php */
/* Location: ./application/modules/admin/controllers/Read_all_messages.php */