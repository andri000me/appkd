<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function show()
	{
		return $this->db->get('user')->result();
	}

	public function save($data)
	{
		$this->db->insert('user', $data);	
	}

	public function find($id)
	{
		return $this->db->get_where('user', ['id'=>$id])->row();
	}

	public function update($id,$data)
	{
		$this->db->update('user', $data, ['id'=>$id]);
	}

	public function delete($id)
	{
		$this->db->delete('user', ['id'=>$id]);
	}

	public function is_valid($email = NULL)
	{
	    return $this->db->select('*')
	            ->from('user')
	            ->where("email", $email)
	            ->get()->row();
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */