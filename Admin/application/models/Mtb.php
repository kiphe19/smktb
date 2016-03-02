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
		// if ($this->input->post('title')) {
		$data['title'] = $this->input->post('title');
		// }
		$data['content'] = $this->input->post('content');
		$data['status'] = '1';
		$insert = $this->db->insert('content', $data);
		$id = $this->db->insert_id();
		$msg = ($insert == 1) ? "Text Berhasil ditambahkan" : "Text Gagal ditambahkan";
		if ($insert == 1) {
			// foreach ($content as $key) {
				$html = 
				'<tr class="text-cont">' .
					'<td>' . $data['title'] . '</td>' .
					'<td>' .
						'<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-up"></i></button> ' .
						'<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-down"></i></button>' .
					'</td>' .
					'<td>' .
						'<a href="' . base_url('ctb/box/'.$data['id_box'].'/'.$id.'/edit-text') . '" class="btn btn-outline btn-primary">Edit</a> ' .
						'<a href="' . base_url('ctb/box/'.$data['id_box'].'/picture/delete-content') . '" data-id="'.$id.'" class="btn btn-outline btn-danger" delete>Delete</a> ' . 
					'</td>' .
				'</tr>';
			// }
			$resp = array(
				'success'	=> true,
				'msg' 		=> "Text Berhasil ditambahkan",
				'data' 		=> $html
				);
		} else {
			$resp = array(
				'success'	=> false,
				'msg'		=> "Text Gagal ditambahkan"
				);
		}
		// $this->db->select('id_content, title');
		// $this->db->where('id_box', $data['id_box']);
		// $this->db->where('type', $data['type']);
		// $content = $this->db->get('content')->result();


		header("Content-Type: text/json");
		echo json_encode($resp);
	}
	public function deleteContentText($id_box)
	{
		$id_content = $this->input->post('id');
		$this->db->where('id_box', $id_box);
		$this->db->where('id_content', $id_content);
		$delete = $this->db->delete('content');
		$resp = array();
		if ($delete == 1) {
			$resp['success'] = true;
			$resp['msg'] = "Text Berhasil Di Hapus";
		} else {
			$resp['success'] = false;
			$resp['msg'] = "Text Gagal Di Hapus";
		}
		header("Content-Type: text/json");
		echo json_encode($resp);
		// echo ($delete) ? "Content Berhasil di Hapus" : "Content Gagal di Hapus";
	}
	public function deleteContentVideo($id_box)
	{
		$id_content = $this->input->post('id_content');
		$file_name = $this->input->post('name');
		$this->db->where('id_box', $id_box);
		$this->db->where('id_content', $id_content);
		$delete = $this->db->delete('content');
		$resp = array();
		if ($delete) {
			if (is_file("uploads/" . $file_name)) {
				if (unlink('uploads/'.$file_name)) {
					$resp['success'] 	= true;
					$resp['msg'] 		= "Video Berhasil dihapus";
				}
				else {
					$resp['success'] 	= true;
					$resp['msg'] 		= "Video gagal dihapus dari Directory!";				
				}
			} else{
				$resp['success'] 	= true;
				$resp['msg'] 		= "Video yang dihapus tidak ada!";			
			}
		} else {
			$resp['success'] 	= false;
			$resp['msg'] 		= "Video Gagal dihapus";
		}
		header("Content-Type: text/json");
		echo json_encode($resp);
	}
	public function deleteContentPicture($id_box)
	{
		$id_content = $this->input->post('id_content');
		$file_name	= $this->input->post('name');
		$this->db->where('id_box', $id_box);
		$this->db->where('id_content', $id_content);
		$delete = $this->db->delete('content');
		$resp = array();
		if ($delete == 1) {
			if (is_file("uploads/" . $file_name)) {
				if (unlink('uploads/'.$file_name)) {
					$resp['success'] = true;
					$resp['msg'] = "Gambar berhasil dihapus";
				} else {
					$resp['success'] = true;
					$resp['msg'] = "Gambar Gagal dihapus dari Directory!";
				}
			} else {
				$resp['success'] = true;
				$resp['msg'] = "Gambar yang dihapus tidak ada!";
			}
		} else {
			$resp['success'] = false;
			$resp['msg'] = "Gambar Gagal dihapus";
		}
		header("Content-Type: text/json");
		echo json_encode($resp);
	}
	public function upload_video($id_box = NULL)
	{
		$config['upload_path']          = FCPATH . './uploads/';
        $config['allowed_types']        = 'mp4|mkv';
        $config['max_size']             = 1000000;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('files')) {
        	$response = array(
        		"success"		=> false,
        		"error"			=> $this->upload->display_errors()
        		);
        }else{
			$this->db->select('max(position) as pos');
        	$this->db->where('id_box', $id_box, FALSE);
			$last_pos = $this->db->get('content')->row_array()['pos'];

        	$file = $this->upload->data()['file_name'];
        	$data['id_box']		= $id_box;
        	$data['content']	= $file;
        	$data['type'] 		= '1';
        	$data['position']	= ++$last_pos;

        	$insert = $this->db->insert('content', $data);
        	$id = $this->db->insert_id();
        	if ($insert) {
				$par = (strlen($file) > 20) ? "..." : "";
        		$html = 
					'<tr class="vid-cont">' .
						'<td><a href="" title="'.$file.'">' . substr($file, 0, 20) . $par . '</td>' .
						'<td>' .
							'<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-up"></i></button> ' .
							'<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-down"></i></button>' .
						'</td>' .
						'<td>' .
							'<a href="#" class="btn btn-flat btn-outline btn-primary"><i class="fa fa-eye"></i></a> ' .
							'<a href="' . base_url('ctb/box/'.$id_box.'/video/delete-content') . '" data-id="'.$id.'" class="btn btn-outline btn-danger" data-id="'.$id.'" data-name="'.$file.'" delete><i class="fa fa-trash"></i> Delete</a> ' . 
						'</td>' .
					'</tr>';
	        	$response = array(
	        		"success"		=> true,
	        		"msg"			=> "Video ".$file." Berhasil Di Upload",
	        		"data"			=> $html
	        		);
        	} else {
				$response = array(
	        		"success"		=> false,
	        		"msg"			=> "Video ".$file." Gagal Di Upload"
        		); 
			}
        }
        header('Content-Type: text/json');
        echo json_encode($response);
	}
	public function upload_picture($id_box = NULL)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '1000000';
		$this->load->library('upload', $config);
		$response = array();
		if ( ! $this->upload->do_upload('files')){
			$response = array( 
				'success'	=> false,
				'error' 	=> $this->upload->display_errors()
			);
		}
		else{
			$file = $this->upload->data()['file_name'];
			$data = array(
				'id_box' 	=> $id_box,
				'content' 	=> $file,
				'type' 		=> '2'
			);
			$insert = $this->db->insert('content', $data);
			$id = $this->db->insert_id();
			if ($insert) {
				$par = (strlen($file) > 20) ? "..." : "";
				$html = 
					'<tr class="pict-cont">' .
						'<td><a href="" title="'.$file.'">' . substr($file, 0, 20) . $par . '</td>' .
						'<td>' .
							'<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-up"></i></button> ' .
							'<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-down"></i></button>' .
						'</td>' .
						'<td>' .
							'<a href="#" class="btn btn-flat btn-outline btn-primary"><i class="fa fa-eye"></i></a> ' .
							'<a href="' . base_url('ctb/box/'.$id_box.'/video/delete-content') . '" data-id="'.$id.'" class="btn btn-outline btn-danger" data-id="'.$id.'" data-name="'.$file.'" delete><i class="fa fa-trash"></i> Delete</a> ' . 
						'</td>' .
					'</tr>';
				$response = array( 
					'success'	=> true,
					'msg' 		=> "Gambar ".$file." Berhasil di upload",
					'data'		=> $html
				);
			}else {
				$response = array( 
					'success'	=> false,
					'msg' 		=> "Gambar ".$file." Gagal di upload"
				);
			}
		}
		header("Content-Type: text/json");
		echo json_encode($response);
	}
}

/* End of file Mtb.php */
/* Location: ./application/models/Mtb.php */