<<<<<<< HEAD
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
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctb extends CI_Controller {

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['box'] = $this->Mtb->selectBox();
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
		if ($update == 1) {
			echo "Box " . $id . " Berhasil Diperbarui";
		}
		else{
			echo "Box " . $id . " Gagal Diperbarui";
		}
	}
	// public function form_box1($param = NUll)
	// {
	// 	$data['title'] = "Box 1";
	// 	$this->load->view('index', $data);
	// }
}

/* End of file Ctb.php */
>>>>>>> 47af5b36865a8a3dfc002297deed29634525670f
/* Location: ./application/controllers/Ctb.php */