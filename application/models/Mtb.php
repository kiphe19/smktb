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
		$this->db->select_max('position');
    	$this->db->where('id_box', $this->input->post('id'), FALSE);
    	$this->db->where('type', '3', FALSE);
		$last_pos = (int)$this->db->get('content')->row_array()['position'];

		$data['id_box'] = $this->input->post('id');
		$data['type'] = $this->input->post('type');
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$data['position'] = ++$last_pos;
		$data['status'] = '1';
		$insert = $this->db->insert('content', $data);
		$id = $this->db->insert_id();
		$msg = ($insert == 1) ? "Text Berhasil ditambahkan" : "Text Gagal ditambahkan";
		if ($insert == 1) {
			$this->db->select('*');
			$this->db->where('id_box', $data['id_box']);
			$this->db->where('type', $data['type']);
			$this->db->order_by('position', 'asc');
			$result = $this->db->get('content')->result();

			$this->db->select('id_content');
			$this->db->where('id_box', $data['id_box']);
			$this->db->where('type', $data['type']);
			$this->db->from('content');
			$sum = $this->db->count_all_results();

			$html = "";
			foreach ($result as $key) {
				$btn_up = ($key->position > 1) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="up" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-up"></i></button> ' : ' ' ;
				$btn_down = ($key->position < $sum) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="down" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-down"></i></button>' : ' ' ;
				$html .= 
				'<tr class="text-cont" data-id="'.$key->id_content.'">' .
					'<td class="title">' . $key->title . '</td>' .
					'<td class="hide content">' . $key->content . '</td>' . 
					'<td>' . $btn_up . $btn_down . '</td>' .
					'<td>' .
						'<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
						'<a href="' . base_url('ctb/box/'.$key->id_box.'/text/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" delete>Delete</a> ' . 
					'</td>' .
				'</tr>';
			}
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
		header("Content-Type: text/json");
		echo json_encode($resp);
	}
	public function deleteContentText($id_box)
	{
		$id_content = $this->input->post('id');
		$this->db->select('position');
		$this->db->where('id_content', $id_content);
		$miss_pos = $this->db->get('content')->row_array();

		$this->db->where('id_box', $id_box);
		$this->db->where('id_content', $id_content);
		$delete = $this->db->delete('content');

		$resp = array();
		if ($delete == 1) {
			$this->db->select('id_content, position');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '3');
			$this->db->where('position >', $miss_pos['position']);
			$pos_bottom = $this->db->get('content')->result();
			foreach ($pos_bottom as $now) {
				$this->db->set('position', --$now->position);
				$this->db->where('id_content', $now->id_content);
				$this->db->update('content');
			}

			$this->db->select('*');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '3');
			$this->db->order_by('position', 'asc');
			$result = $this->db->get('content')->result();

			$this->db->select('id_content');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '3');
			$this->db->from('content');
			$sum = $this->db->count_all_results();

			$html = "";
			foreach ($result as $key) {
				$btn_up = ($key->position > 1) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="up" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-up"></i></button> ' : ' ' ;
				$btn_down = ($key->position < $sum) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="down" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-down"></i></button>' : ' ' ;
				$html .= 
				'<tr class="text-cont" data-id="'.$key->id_content.'">' .
					'<td class="title">' . $key->title . '</td>' .
					'<td class="hide content">' . $key->content . '</td>' . 
					'<td>' . $btn_up . $btn_down . '</td>' .
					'<td>' .
						'<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
						'<a href="' . base_url('ctb/box/'.$key->id_box.'/text/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" delete>Delete</a> ' . 
					'</td>' .
				'</tr>';
			}
			$resp['success']	= true;
			$resp['msg']		= "Text Berhasil Dihapus";
			$resp['data']		= $html;
		} else {
			$resp['success'] 	= false;
			$resp['msg'] 		= "Text Gagal dihapus";
		}

		header("Content-Type: text/json");
		echo json_encode($resp);

		// $this->db->where('id_box', $id_box);
		// $this->db->where('id_content', $id_content);
		// $delete = $this->db->delete('content');
		// $resp = array();
		// if ($delete == 1) {
		// 	$resp['success'] = true;
		// 	$resp['msg'] = "Text Berhasil Di Hapus";
		// } else {
		// 	$resp['success'] = false;
		// 	$resp['msg'] = "Text Gagal Di Hapus";
		// }
		// header("Content-Type: text/json");
		// echo json_encode($resp);
	}
	public function deleteContentVideo($id_box)
	{
		$id_content = $this->input->post('id_content');
		$file = "uploads/".$this->input->post('name');

		if (is_file($file)) {
			unlink($file);
		}

		$this->db->select('position');
		$this->db->where('id_content', $id_content);
		$miss_pos = $this->db->get('content')->row_array();

		$this->db->where('id_box', $id_box);
		$this->db->where('id_content', $id_content);
		$delete = $this->db->delete('content');

		$resp = array();
		if ($delete == 1) {
			$this->db->select('id_content, position');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '1');
			$this->db->where('position >', $miss_pos['position']);
			$pos_bottom = $this->db->get('content')->result();
			foreach ($pos_bottom as $now) {
				$this->db->set('position', --$now->position);
				$this->db->where('id_content', $now->id_content);
				$this->db->update('content');
			}

			$this->db->select('*');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '1');
			$this->db->order_by('position', 'ASC');
			$data = $this->db->get('content')->result();

			$this->db->select('*');
			$this->db->from('content');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '1');
			$sum = $this->db->count_all_results();

			$html = "";
			foreach ($data as $key) {
				$par = (strlen($key->content) > 20) ? "..." : "";
				$up = ($key->position > 1) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="up" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-up"></i></button> ' : '';
				$down = ($key->position < $sum) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="down" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-down"></i></button>' : '';
				$html .= 
					'<tr class="vid-cont">' .
						'<td><a href="" title="'.$key->content.'">' . substr($key->content, 0, 20) . $par . '</td>' .
						'<td>' . $up . $down . '</td>' .
						'<td>' .
							// '<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
							'<a href="' . base_url('ctb/box/'.$key->id_box.'/video/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" data-name="'.$key->content.'" delete><i class="fa fa-trash"></i> Delete</a> ' . 
						'</td>' .
					'</tr>';
			}
			$resp['success']	= true;
			$resp['msg']		= "Video Berhasil Dihapus";
			$resp['data']		= $html;
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
		$file = "uploads/".$this->input->post('name');

		if (is_file($file)) {
			unlink($file);
		}

		$this->db->select('position');
		$this->db->where('id_content', $id_content);
		$miss_pos = $this->db->get('content')->row_array();

		$this->db->where('id_box', $id_box);
		$this->db->where('id_content', $id_content);
		$delete = $this->db->delete('content');

		$resp = array();
		if ($delete == 1) {
			$this->db->select('id_content, position');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '2');
			$this->db->where('position >', $miss_pos['position']);
			$pos_bottom = $this->db->get('content')->result();
			foreach ($pos_bottom as $now) {
				$this->db->set('position', --$now->position);
				$this->db->where('id_content', $now->id_content);
				$this->db->update('content');
			}

			$this->db->select('*');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '2');
			$this->db->order_by('position', 'ASC');
			$data = $this->db->get('content')->result();

			$this->db->select('*');
			$this->db->from('content');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '2');
			$sum = $this->db->count_all_results();

			$html = "";
			foreach ($data as $key) {
				$par = (strlen($key->content) > 20) ? "..." : "";
				$up = ($key->position > 1) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="up" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-up"></i></button> ' : '';
				$down = ($key->position < $sum) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="down" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-down"></i></button>' : '';
				$html .= 
					'<tr class="pict-cont">' .
						'<td><a href="" title="'.$key->content.'">' . substr($key->content, 0, 20) . $par . '</td>' .
						'<td>' . $up . $down . '</td>' .
						'<td>' .
							// '<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
							'<a href="' . base_url('ctb/box/'.$key->id_box.'/picture/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" data-name="'.$key->content.'" delete><i class="fa fa-trash"></i> Delete</a> ' . 
						'</td>' .
					'</tr>';
			}
			$resp['success']	= true;
			$resp['msg']		= "Gambar Berhasil Dihapus";
			$resp['data']		= $html;
		} else {
			$resp['success'] 	= false;
			$resp['msg'] 		= "Gambar Gagal dihapus";
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
			$this->db->select_max('position');
        	$this->db->where('id_box', $id_box, FALSE);
        	$this->db->where('type', '1', FALSE);
			$last_pos = (int)$this->db->get('content')->row_array()['position'];

        	$file = $this->upload->data()['file_name'];
        	$data['id_box']		= $id_box;
        	$data['content']	= $file;
        	$data['type'] 		= '1';
        	$data['position']	= ++$last_pos;

        	$insert = $this->db->insert('content', $data);
        	$id = $this->db->insert_id();
        	if ($insert) {
				$this->db->select('*');
				$this->db->where('id_box', $id_box);
				$this->db->where('type', '1');
				$this->db->order_by('position', 'ASC');
				$data = $this->db->get('content')->result();

				$this->db->select('*');
				$this->db->from('content');
				$this->db->where('id_box', $id_box);
				$this->db->where('type', '1');
				$sum = $this->db->count_all_results();

				$html = "";
				foreach ($data as $key) {
					$par = (strlen($key->content) > 20) ? "..." : "";
					$up = ($key->position > 1) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="up" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-up"></i></button> ' : '';
					$down = ($key->position < $sum) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="down" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-down"></i></button>' : '';
					$html .= 
						'<tr class="vid-cont">' .
							'<td><a href="" title="'.$key->content.'">' . substr($key->content, 0, 20) . $par . '</td>' .
							'<td>' . $up . $down . '</td>' .
							'<td>' .
								// '<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
								'<a href="' . base_url('ctb/box/'.$key->id_box.'/video/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" data-name="'.$key->content.'" delete><i class="fa fa-trash"></i> Delete</a> ' . 
							'</td>' .
						'</tr>';
				}
     //    		$html = 
					// '<tr class="vid-cont">' .
					// 	'<td><a href="" title="'.$file.'">' . substr($file, 0, 20) . $par . '</td>' .
					// 	'<td>' .
					// 		'<button type="button" class="btn btn-flat btn-outline btn-success" data-id="'.$id.'" data-pos="'.$data['position'].'" position-type="up" box-type="'.$data['type'].'" box-id="'.$data['id_box'].'"><i class="fa fa-arrow-up"></i></button> ' .
					// 		'<button type="button" class="btn btn-flat btn-outline btn-success" data-id="'.$id.'" data-pos="'.$data['position'].'" position-type="down" box-type="'.$data['type'].'" box-id="'.$data['id_box'].'"><i class="fa fa-arrow-down"></i></button>' .
					// 	'</td>' .
					// 	'<td>' .
					// 		'<a href="#" class="btn btn-flat btn-outline btn-primary"><i class="fa fa-eye"></i></a> ' .
					// 		'<a href="' . base_url('ctb/box/'.$id_box.'/video/delete-content') . '" data-id="'.$id.'" class="btn btn-outline btn-danger" data-id="'.$id.'" data-name="'.$file.'" delete><i class="fa fa-trash"></i> Delete</a> ' . 
					// 	'</td>' .
					// '</tr>';
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
			$this->db->select_max('position');
        	$this->db->where('id_box', $id_box, FALSE);
        	$this->db->where('type', '2', FALSE);
			$last_pos = (int)$this->db->get('content')->row_array()['position'];

			$file = $this->upload->data()['file_name'];
			$data = array(
				'id_box' 	=> $id_box,
				'content' 	=> $file,
				'type' 		=> '2',
				'position'	=> ++$last_pos
			);
			$insert = $this->db->insert('content', $data);
			$id = $this->db->insert_id();
			if ($insert) {
				$this->db->select('*');
				$this->db->where('id_box', $id_box);
				$this->db->where('type', '2');
				$this->db->order_by('position', 'ASC');
				$data = $this->db->get('content')->result();

				$this->db->select('*');
				$this->db->from('content');
				$this->db->where('id_box', $id_box);
				$this->db->where('type', '2');
				$sum = $this->db->count_all_results();

				$html = "";
				foreach ($data as $key) {
					$par = (strlen($key->content) > 20) ? "..." : "";
					$up = ($key->position > 1) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="up" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-up"></i></button> ' : '';
					$down = ($key->position < $sum) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="down" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-down"></i></button>' : '';
					$html .= 
						'<tr class="pict-cont">' .
							'<td><a href="" title="'.$key->content.'">' . substr($key->content, 0, 20) . $par . '</td>' .
							'<td>' . $up . $down . '</td>' .
							'<td>' .
								// '<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
								'<a href="' . base_url('ctb/box/'.$key->id_box.'/video/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" data-name="'.$key->content.'" delete><i class="fa fa-trash"></i> Delete</a> ' . 
							'</td>' .
						'</tr>';
				}
				// $par = (strlen($file) > 20) ? "..." : "";
				// $html = 
				// 	'<tr class="pict-cont">' .
				// 		'<td><a href="" title="'.$file.'">' . substr($file, 0, 20) . $par . '</td>' .
				// 		'<td>' .
				// 			'<button type="button" class="btn btn-flat btn-outline btn-success" data-id="'.$id.'" data-pos="'.$data['position'].'" position-type="up" box-type="'.$data['type'].'" box-id="'.$data['id_box'].'"><i class="fa fa-arrow-up"></i></button> ' .
				// 			'<button type="button" class="btn btn-flat btn-outline btn-success" data-id="'.$id.'" data-pos="'.$data['position'].'" position-type="down" box-type="'.$data['type'].'" box-id="'.$data['id_box'].'"><i class="fa fa-arrow-down"></i></button>' .
				// 		'</td>' .
				// 		'<td>' .
				// 			'<a href="#" class="btn btn-flat btn-outline btn-primary"><i class="fa fa-eye"></i></a> ' .
				// 			'<a href="' . base_url('ctb/box/'.$id_box.'/video/delete-content') . '" data-id="'.$id.'" class="btn btn-outline btn-danger" data-id="'.$id.'" data-name="'.$file.'" delete><i class="fa fa-trash"></i> Delete</a> ' . 
				// 		'</td>' .
				// 	'</tr>';
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
	public function change_position()
	{
		$id = (int)$this->input->post('id', TRUE);
		$type = $this->input->post('type', TRUE);
		$position = (int)$this->input->post('pos', TRUE);
		$box_id = (int)$this->input->post('boxId', TRUE);
		$box_type = $this->input->post('boxType', TRUE);

		$status = $this->db->query("call chng_pos($id, $box_id, $box_type, $position, '$type')");

		$this->db->select('*');
		$this->db->where('id_box', $box_id);
		$this->db->where('type', $box_type);
		$this->db->order_by('position', 'ASC');
		$data = $this->db->get('content')->result();

		$this->db->select('*');
		$this->db->where('id_box', $box_id);
		$this->db->where('type', $box_type);
		$this->db->order_by('position', 'ASC');
		$sum = $this->db->get('content')->num_rows();

		$html = "";
		$pos = 1;
		if ($box_type == '1') {
			foreach ($data as $key) {
				$par = (strlen($key->content) > 20) ? "..." : "";
				$up = ($pos > 1) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="up" box-type="'.$box_type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-up"></i></button> ' : '';
				$down = ($pos < $sum) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="down" box-type="'.$box_type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-down"></i></button>' : '';
				$html .= 
					'<tr class="vid-cont">' .
						'<td><a href="" title="'.$key->content.'">' . substr($key->content, 0, 20) . $par . '</td>' .
						'<td>' . $up . $down . '</td>' .
						'<td>' .
							// '<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
							'<a href="' . base_url('ctb/box/'.$box_id.'/video/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" data-name="'.$key->content.'" delete><i class="fa fa-trash"></i> Delete</a> ' . 
						'</td>' .
					'</tr>';
				$pos++;
			}
		} else if ($box_type == '2') {
			foreach ($data as $key) {
				$par = (strlen($key->content) > 20) ? "..." : "";
				$up = ($pos > 1) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="up" box-type="'.$box_type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-up"></i></button> ' : '';
				$down = ($pos < $sum) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="down" box-type="'.$box_type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-down"></i></button>' : '';
				$html .= 
					'<tr class="pict-cont">' .
						'<td><a href="" title="'.$key->content.'">' . substr($key->content, 0, 20) . $par . '</td>' .
						'<td>' . $up . $down . '</td>' .
						'<td>' .
							// '<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
							'<a href="' . base_url('ctb/box/'.$box_id.'/picture/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" data-name="'.$key->content.'" delete><i class="fa fa-trash"></i> Delete</a> ' . 
						'</td>' .
					'</tr>';
				$pos++;
			}
		} else if ($box_type == '3') {
			foreach ($data as $key) {
				$btn_up = ($key->position > 1) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="up" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-up"></i></button> ' : ' ' ;
				$btn_down = ($key->position < $sum) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="down" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-down"></i></button>' : ' ' ;
				$html .= 
				'<tr class="text-cont" data-id="'.$key->id_content.'">' .
					'<td class="title">' . $key->title . '</td>' .
					'<td class="hide content">' . $key->content . '</td>' . 
					'<td>' . $btn_up . $btn_down . '</td>' .
					'<td>' .
						'<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
						'<a href="' . base_url('ctb/box/'.$key->id_box.'/text/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" delete>Delete</a> ' . 
					'</td>' .
				'</tr>';
			}
		}
		$resp = array(
			'success' 	=> true, 
			'msg'		=> 'Posisi Berhasil Diubah',
			'data'		=> $html
			);
		header("Content-Type: text/json");
		echo json_encode($resp);
	}
	
	public function edit_text($id_box)
	{
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$content = $this->input->post('content');

		$this->db->set('title', $title);
		$this->db->set('content', $content);
		$this->db->where('id_box', $id_box);
		$this->db->where('id_content', $id);
		$update = $this->db->update('content');
		$resp = array();
		if ($update == 1) {
			// $html = 
			// 	'<td class="title">' . $title . '</td>' .
			// 	'<td class="hide content">' . $content . '</td>' . 
			// 	'<td>' .
			// 		'<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-up"></i></button> ' .
			// 		'<button type="button" class="btn btn-flat btn-outline btn-success"><i class="fa fa-arrow-down"></i></button>' .
			// 	'</td>' .
			// 	'<td>' .
			// 		'<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
			// 		'<a href="' . base_url('ctb/box/'.$id_box.'/text/delete-content') . '" data-id="'.$id.'" class="btn btn-outline btn-danger" delete>Delete</a> ' . 
			// 	'</td>';
			$this->db->select('*');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '3');
			$this->db->order_by('position', 'asc');
			$result = $this->db->get('content')->result();

			$this->db->select('id_content');
			$this->db->where('id_box', $id_box);
			$this->db->where('type', '3');
			$this->db->from('content');
			$sum = $this->db->count_all_results();

			$html = "";
			foreach ($result as $key) {
				$btn_up = ($key->position > 1) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="up" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-up"></i></button> ' : ' ' ;
				$btn_down = ($key->position < $sum) ? '<button type="button" class="btn btn-flat btn-outline btn-success pos" data-id="'.$key->id_content.'" data-pos="'.$key->position.'" position-type="down" box-type="'.$key->type.'" box-id="'.$key->id_box.'"><i class="fa fa-arrow-down"></i></button>' : ' ' ;
				$html .= 
				'<tr class="text-cont" data-id="'.$key->id_content.'">' .
					'<td class="title">' . $key->title . '</td>' .
					'<td class="hide content">' . $key->content . '</td>' . 
					'<td>' . $btn_up . $btn_down . '</td>' .
					'<td>' .
						'<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal5" edit>Edit</button> ' .
						'<a href="' . base_url('ctb/box/'.$key->id_box.'/text/delete-content') . '" data-id="'.$key->id_content.'" class="btn btn-outline btn-danger" delete>Delete</a> ' . 
					'</td>' .
				'</tr>';
			}
			$resp = array(
				'success' 	=> true,
				'id'		=> $id,
				'msg'		=> 'Text Berhasil Diperbarui',
				'updated'	=> $html
				);
		} else {
			$resp = array(
				'success' 	=> false,
				'msg'		=> 'Text Gagal Diperbarui',
				);
		}
		header("Content-Type: text-json");
		echo json_encode($resp);
	}
}

/* End of file Mtb.php */
/* Location: ./application/models/Mtb.php */