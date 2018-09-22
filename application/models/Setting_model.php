<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

	function find($id)
	{
		return $this->db->get_where('setting', ['id'=>$id])->row();
	}

	function update($data)
	{
		$this->db->update('setting', $data, ['id'=>1]);
	}

}

/* End of file Setting_model.php */
/* Location: ./application/models/Setting_model.php */