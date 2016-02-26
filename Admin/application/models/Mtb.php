<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtb extends CI_Model {

	public function selectBox()
	{
		$this->db->select('id_box, type');
		return $this->db->get('main');
	}
	public function saveNews()
	{
		$news = $this->input->post('news');
		$this->db->set('content', $news);
		$update = $this->db->update('news');
		$return = ($update == 1) ? "Berhasil memperbarui News" : "Gagal memperbarui News";
		echo $return;
	}
	public function getNews()
	{
		$this->db->select('content');
		return $this->db->get('news');
	}
	public function addContentText()
	{
		$data['id_box'] = $this->input->post('id');
		$data['type'] = $this->input->post('type');
		if ($this->input->post('title')) {
			$data['title'] = $this->input->post('title');
		}
		$data['content'] = $this->input->post('content');
		$data['status'] = '1';
		$insert = $this->db->insert('content', $data);
		$msg = ($insert == 1) ? "Content Berhasil ditambahkan" : "Content Gagal ditambahkan";
		
		$this->db->select('id_content, title');
		$this->db->where('id_box', $data['id_box']);
		$this->db->where('type', $data['type']);
		$content = $this->db->get('content')->result();

		$html = "";
		foreach ($content as $key) {
			$html .= 
			'<tr>' .
				'<td>' . $key->title . '</td>' .
				'<td>' .
					'<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-up"></i></button> ' .
					'<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-down"></i></button>' .
				'</td>' .
				'<td>' .
					'<a href="<?php echo base_url(\'ctb/box1\') ?>" class="btn btn-outline btn-primary">Edit</a> ' .
					'<a href="' . base_url('ctb/box/'.$data['id_box'].'/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" delete>Delete</a> ' . 
				'</td>' .
			'</tr>';
		}
		$resp = array(
			'msg' => $msg,
			'data' => $html
			);

		header("Content-Type: text/json");
		echo json_encode($resp);
	}
	public function deleteContentText($id_box)
	{
		$id_content = $this->input->post('id');
		$this->db->where('id_box', $id_box);
		$this->db->where('id_content', $id_content);
		$delete = $this->db->delete('content');
		echo ($delete == 1) ? "Content Berhasil di Hapus" : "Content Gagal di Hapus";
	}
}

/* End of file Mtb.php */
/* Location: ./application/models/Mtb.php */