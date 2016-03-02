<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctb extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['box'] = $this->Mtb->selectBox();
		$this->load->view('index', $data);
	}
	// public function admin()
	// {
	// }
	public function news()
	{
		$data['title'] = "News Text";
		$data['news'] = $this->Mtb->getNews()->row_array();
		$this->load->view('index', $data);
	}
	public function box($id = 1)
	{
		$this->db->select('*');
		$this->db->where('id_box', $id);
		$main = $this->db->get('main')->row_array();

		$this->db->select('*');
		$this->db->from('content c');
		$this->db->join('main m', 'c.id_box = m.id_box');
		$this->db->where('m.id_box', $id);
		$this->db->where('c.type', $main['type']);
		$this->db->order_by('position', 'ASC');
		$content = $this->db->get()->result();

		$data['title'] = "Box " . $id;
		$data['data'] = $main;
		$data['content'] = $content;
		$this->load->view('index', $data);
	}
	public function saveType()
	{
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$this->db->set('type', $type);
		$this->db->where('id_box', $id);
		$update = $this->db->update('main');
		if ($update) {
			$response = array(
				"success" 	=> true,
				"msg" 		=> "Box " .$id. " Berhasil Diperbarui"
				);
		}
		else{
			$response = array(
				"success" 	=> true,
				"msg" 		=> "Box " .$id. " Gagal Diperbarui"
				);
		}
		header('Content-type: text/json');
		echo json_encode($response);
	}
	public function addText()
	{
		($this->input->method() == "post") ? $this->Mtb->addContentText() : redirect('ctb','refresh') ;
	}
	public function deleteContentText()
	{
		($this->input->method() == "post") ? $this->Mtb->deleteContentText($this->uri->segment(3)) : redirect('ctb','refresh') ;
	}
	public function deleteContentVideo()
	{
		($this->input->method() == "post") ? $this->Mtb->deleteContentVideo($this->uri->segment(3)) : redirect('ctb','refresh') ;
	}
	public function deleteContentPicture()
	{
		($this->input->method() == "post") ? $this->Mtb->deleteContentPicture($this->uri->segment(3)) : redirect('ctb','refresh') ;
	}
	public function editNews()
	{
		($this->input->method() == "post") ? $this->Mtb->saveNews() : redirect('ctb','refresh') ;
	}
	public function uploadVid($id_box = NULL)
	{
		($this->input->method() == "post") ? $this->Mtb->upload_video($id_box) : redirect('ctb','refresh') ;
	}
	public function uploadPict($id_box = NULL)
	{
		($this->input->method() == "post") ? $this->Mtb->upload_picture($id_box) : redirect('ctb','refresh') ;
	}
	public function chpos()
	{
		($this->input->is_ajax_request()) ? $this->Mtb->change_position() : redirect('ctb', 'refresh');
	}
	public function editText($id_box = 1)
	{
		($this->input->method() == "post") ? $this->Mtb->edit_text($id_box) : redirect('ctb','refresh') ;
	}
}

/* End of file Ctb.php */
/* Location: ./application/controllers/Ctb.php */