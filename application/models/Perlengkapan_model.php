<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perlengkapan_model extends CI_Model {

	public function show()
	{
		return $this->db->get('perlengkapan')->result();
	}

	public function save($data)
	{
		$this->db->insert('perlengkapan', $data);	
	}

	public function find($id)
	{
		return $this->db->get_where('perlengkapan', ['id'=>$id])->row();
	}

	public function update($id,$data)
	{
		$this->db->update('perlengkapan', $data, ['id'=>$id]);
	}

	public function delete($id)
	{
		$this->db->delete('perlengkapan', ['id'=>$id]);
	}


}

/* End of file perlengkapan_model.php */
/* Location: ./application/models/perlengkapan_model.php */