<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam_model extends CI_Model {

	public function show()
	{
		return $this->db->get('peminjam')->result();
	}

	public function save($data)
	{
		$this->db->insert('peminjam', $data);	
	}

	public function find($id)
	{
		return $this->db->get_where('peminjam', ['id'=>$id])->row();
	}

	public function update($id,$data)
	{
		$this->db->update('peminjam', $data, ['id'=>$id]);
	}

	public function delete($id)
	{
		$this->db->delete('peminjam', ['id'=>$id]);
	}


}

/* End of file peminjam_model.php */
/* Location: ./application/models/peminjam_model.php */