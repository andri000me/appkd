<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	public function show()
	{
		return $this->db->get('peminjaman')->result();
	}

	public function save($data)
	{
		$this->db->insert('peminjaman', $data);	
	}

	public function find($id)
	{
		return $this->db->get_where('peminjaman', ['id'=>$id])->row();
	}

	public function update($id,$data)
	{
		$this->db->update('peminjaman', $data, ['id'=>$id]);
	}

	public function delete($id)
	{
		$this->db->delete('peminjaman', ['id'=>$id]);
	}

	public function get_jumlah_perlengkapan($tanggal)
	{
		return $this->db->select('peminjaman_detail.*,perlengkapan.nama_perlengkapan,perlengkapan.jumlah AS qty')
				 ->from('peminjaman_detail')
				 ->where('peminjaman.tanggal_peminjaman',$tanggal)
				 ->join('peminjaman','peminjaman_detail.peminjaman_id=peminjaman.id')
				 ->join('perlengkapan','perlengkapan.id=peminjaman_detail.perlengkapan_id')
				 ->get()->result();
		;
	}

	public function mobil()
	{
		return $this->db->query("SELECT * FROM `peminjaman` WHERE mobil_id > 0")->result();
	}

	public function ruang()
	{
		return $this->db->query("SELECT * FROM `peminjaman` WHERE ruang_id > 0")->result();
	}

	public function perlengkapan()
	{
		return $this->db->query("SELECT * FROM `peminjaman` WHERE ruang_id is null AND mobil_id is null")->result();
	}

	public function export($tanggal_mulai,$tanggal_selesai)
	{
		return $this->db->where('tanggal_peminjaman BETWEEN "'. $tanggal_mulai. '" and "'. $tanggal_selesai.'"')->get('peminjaman')->result();
	}


}

/* End of file peminjaman_model.php */
/* Location: ./application/models/peminjaman_model.php */