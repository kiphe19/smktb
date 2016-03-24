<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged')) {
			redirect('ctb','refresh');
		}
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$row = $this->db->count_all_results();
		if ($row == 1) {
			$this->session->set_userdata('logged', 'true');
			$this->session->set_userdata('username', $username);
			redirect('ctb','refresh');
		} else {
			$data['message'] = "Username atau Password salah";
			$this->load->view('login', $data, FALSE);
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */