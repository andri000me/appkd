<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sopir_model extends CI_Model {

	public function show()
	{
		return $this->db->get('sopir')->result();
	}

	public function save($data)
	{
		$this->db->insert('sopir', $data);	
	}

	public function find($id)
	{
		return $this->db->get_where('sopir', ['id'=>$id])->row();
	}

	public function update($id,$data)
	{
		$this->db->update('sopir', $data, ['id'=>$id]);
	}

	public function delete($id)
	{
		$this->db->delete('sopir', ['id'=>$id]);
	}


}

/* End of file sopir_model.php */
/* Location: ./application/models/sopir_model.php */