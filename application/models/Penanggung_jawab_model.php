<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penanggung_jawab_model extends CI_Model {

	public function show()
	{
		return $this->db->get('penanggung_jawab')->result();
	}

	public function save($data)
	{
		$this->db->insert('penanggung_jawab', $data);	
	}

	public function find($id)
	{
		return $this->db->get_where('penanggung_jawab', ['id'=>$id])->row();
	}

	public function update($id,$data)
	{
		$this->db->update('penanggung_jawab', $data, ['id'=>$id]);
	}

	public function delete($id)
	{
		$this->db->delete('penanggung_jawab', ['id'=>$id]);
	}


}

/* End of file penanggung_jawab_model.php */
/* Location: ./application/models/penanggung_jawab_model.php */