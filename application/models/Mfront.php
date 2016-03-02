<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mfront extends CI_Model {

	public function getBox1()
	{
		$this->db->select('type');
		$this->db->where('id_box', 1);
		$type = $this->db->get('main')->row_array();

		$this->db->select('*');
		$this->db->where('id_box', 1);
		$this->db->where('type', $type['type']);
		$data['content'] = $this->db->get('content')->result();
		$data['type'] = $type['type'];
		return $data;
	}	
	public function getBox2()
	{
		$this->db->select('type');
		$this->db->where('id_box', 2);
		$type = $this->db->get('main')->row_array();

		$this->db->select('*');
		$this->db->where('id_box', 2);
		$this->db->where('type', $type['type']);
		$data['content'] = $this->db->get('content')->result();
		$data['type'] = $type['type'];
		return $data;
	}	
	public function getBox3()
	{
		$this->db->select('type');
		$this->db->where('id_box', 3);
		$type = $this->db->get('main')->row_array();

		$this->db->select('*');
		$this->db->where('id_box', 3);
		$this->db->where('type', $type['type']);
		$data['content'] = $this->db->get('content')->result();
		$data['type'] = $type['type'];
		return $data;
	}	
	public function getBox4()
	{
		$this->db->select('type');
		$this->db->where('id_box', 4);
		$type = $this->db->get('main')->row_array();

		$this->db->select('*');
		$this->db->where('id_box', 4);
		$this->db->where('type', $type['type']);
		$data['content'] = $this->db->get('content')->result();
		$data['type'] = $type['type'];
		return $data;
	}	
	public function getNews()
	{
		$this->db->select('*');
		return $this->db->get('news')->row_array();
	}
}

/* End of file Mfront.php */
/* Location: ./application/models/Mfront.php */