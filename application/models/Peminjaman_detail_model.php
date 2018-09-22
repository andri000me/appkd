<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_detail_model extends CI_Model {

	public function show()
	{
		return $this->db->get('peminjaman_detail')->result();
	}

	public function save($data)
	{
		$this->db->insert('peminjaman_detail', $data);	
	}

	public function find($id)
	{
		return $this->db->get_where('peminjaman_detail', ['id'=>$id])->row();
	}

	public function update($id,$data)
	{
		$this->db->update('peminjaman_detail', $data, ['id'=>$id]);
	}

	public function delete($id)
	{
		$this->db->delete('peminjaman_detail', ['id'=>$id]);
	}

	public function get_peminjaman_detail($id_peminjaman)
	{
		return $this->db->select('peminjaman_detail.*,perlengkapan.nama_perlengkapan')
						->from('peminjaman_detail')
						->join('perlengkapan','perlengkapan.id=peminjaman_detail.perlengkapan_id','left')
						// ->join('peminjaman','peminjaman.id=peminjaman_detail.peminjaman_id','left')
						->where('peminjaman_detail.peminjaman_id',$id_peminjaman)
						->get()->result();
		// return $this->db->get_where('peminjaman_detail', ['peminjaman_id'=>$id_peminjaman])->result();
	}

	public function hapus($id)
	{
		$this->db->delete('peminjaman_detail', ['id'=>$id]);		
	}


}

/* End of file peminjaman_detail_model.php */
/* Location: ./application/models/peminjaman_detail_model.php */