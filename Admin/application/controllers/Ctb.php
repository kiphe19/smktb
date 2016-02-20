<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctb extends CI_Controller {

	public function index()
	{
		$data['title'] = "Dashboard";
		$this->load->view('index', $data);		
	}
	public function box1()
	{
		$data['title'] = "Box 1";
		$this->load->view('index', $data);
	}

}

/* End of file Ctb.php */
/* Location: ./application/controllers/Ctb.php */