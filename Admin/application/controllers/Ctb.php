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
	public function news()
	{
		$data['title'] = "News Text";
		$this->load->view('index', $data);
	}
	public function box2()
	{
		$data['title'] = "Box 2";
		$this->load->view('index', $data);
	}
	// public function form_box1($param = NUll)
	// {
	// 	$data['title'] = "Box 1";
	// 	$this->load->view('index', $data);
	// }
}

/* End of file Ctb.php */
/* Location: ./application/controllers/Ctb.php */