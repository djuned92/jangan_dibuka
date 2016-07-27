<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model','users');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function manage_users()
	{	
		$this->load->model('users_model','users');

		$data['users'] = $this->users->get_all();
		$this->load->view('manage_users', $data);
	}

	public function register()
	{
		$this->users->create_user();
		$this->session->set_flashdata('success', 'yeayyy'); // via ajax gk tampil, why?
		redirect('welcome/manage_users');
	}
}
