<?php

class Template {
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('parser');
	}

	public function admin($content, $script = NULL, $data = NULL)
	{
		// fungsi ini untuk get pesan di navbar-top
		$this->CI->load->model('pesan_model','pesan');
		$data['pesan'] = $this->CI->pesan->get_pesan();

		$data = array(
			'head'			=> $this->CI->load->view('template/admin/head', $data, TRUE),
			'navbar-top'	=> $this->CI->load->view('template/admin/navbar-top', $data, TRUE),
			'navbar-sidebar'=> $this->CI->load->view('template/admin/navbar-sidebar', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/admin/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/admin/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['mod-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/admin/index', $data);
	}

	public function spv($content, $script = NULL, $data = NULL)
	{
		$data = array(
			'head'			=> $this->CI->load->view('template/spv/head', $data, TRUE),
			'navbar-top'	=> $this->CI->load->view('template/spv/navbar-top', $data, TRUE),
			'navbar-sidebar'=> $this->CI->load->view('template/spv/navbar-sidebar', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/spv/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/spv/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['mod-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/spv/index', $data);
	}

	public function asman($content, $script = NULL, $data = NULL)
	{
		$data = array(
			'head'			=> $this->CI->load->view('template/asman/head', $data, TRUE),
			'navbar-top'	=> $this->CI->load->view('template/asman/navbar-top', $data, TRUE),
			'navbar-sidebar'=> $this->CI->load->view('template/asman/navbar-sidebar', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/asman/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/asman/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['mod-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/asman/index', $data);
	}

	public function manajer($content, $script = NULL, $data = NULL)
	{
		$data = array(
			'head'			=> $this->CI->load->view('template/manajer/head', $data, TRUE),
			'navbar-top'	=> $this->CI->load->view('template/manajer/navbar-top', $data, TRUE),
			'navbar-sidebar'=> $this->CI->load->view('template/manajer/navbar-sidebar', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/manajer/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/manajer/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['mod-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/manajer/index', $data);
	}
}