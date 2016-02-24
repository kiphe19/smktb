<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtb extends CI_Model {

	

}

/* End of file Mtb.php */
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtb extends CI_Model {

	public function selectBox()
	{
		$this->db->select('id_box, type');
		return $this->db->get('main');
	}

}

/* End of file Mtb.php */
>>>>>>> 47af5b36865a8a3dfc002297deed29634525670f
/* Location: ./application/models/Mtb.php */