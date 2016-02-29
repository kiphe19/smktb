<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtb extends CI_Model {

	public function selectBox()
	{
		$this->db->select('id_box, type');
		return $this->db->get('main');
	}

	public function newsget(){
		$q = $this->db->get('news');
		return $q->result_array();
	}

	public function newsupdate($data, $id){
		$this->db->where('id', $id);
		$q = $this->db->update('news', $data);
		return $q;
	}

	public function box($data){
		$this->db->insert('content', $data);
		return TRUE;
	}

}

/* End of file Mtb.php */
/* Location: ./application/models/Mtb.php */