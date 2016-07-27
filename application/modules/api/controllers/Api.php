<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index_get()
	{
		$this->response("Hello World");
	}

}

/* End of file Api.php */
/* Location: ./application/modules/api/controllers/Api.php */