<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mfront');
	}
	public function index()
	{
		$data['box1'] = $this->Mfront->getBox1();
		$data['box2'] = $this->Mfront->getBox2();
		$data['box3'] = $this->Mfront->getBox3();
		$data['box4'] = $this->Mfront->getBox4();
		$data['news'] = $this->Mfront->getNews();
		$this->load->view('front/index', $data);
	}

}

/* End of file Front.php */
/* Location: ./application/controllers/Front.php */