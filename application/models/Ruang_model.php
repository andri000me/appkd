<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang_model extends CI_Model {

	public function show()
	{
		return $this->db->get('ruang')->result();
	}

	public function save($data)
	{
		$this->db->insert('ruang', $data);	
	}

	public function find($id)
	{
		return $this->db->get_where('ruang', ['id'=>$id])->row();
	}

	public function update($id,$data)
	{
		$this->db->update('ruang', $data, ['id'=>$id]);
	}

	public function delete($id)
	{
		$this->db->delete('ruang', ['id'=>$id]);
	}


}

/* End of file ruang_model.php */
/* Location: ./application/models/ruang_model.php */