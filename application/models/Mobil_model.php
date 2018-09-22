<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil_model extends CI_Model {

	public function show()
	{
		return $this->db->get('mobil')->result();
	}

	public function save($data)
	{
		$this->db->insert('mobil', $data);	
	}

	public function find($id)
	{
		return $this->db->get_where('mobil', ['id'=>$id])->row();
	}

	public function update($id,$data)
	{
		$this->db->update('mobil', $data, ['id'=>$id]);
	}

	public function delete($id)
	{
		$this->db->delete('mobil', ['id'=>$id]);
	}


}

/* End of file Mobil_model.php */
/* Location: ./application/models/Mobil_model.php */