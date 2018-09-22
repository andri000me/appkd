<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android_api extends CI_Model {

	function cek_login($table, $where){
		return $this->db->get_where($table,$where)->row_array();
	}

	public function load_by_penanggungjawab($id){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->order_by('id','desc');
		$this->db->where('penanggung_jawab_id',$id);
		return $this->db->get()->row_array();
	}

	public function show_pj_ruang($tanggal,$keterangan){
		if($keterangan=="hari"){
			$this->db->select('ruang.nama_ruang, ruang.penanggung_jawab_id, peminjam.no_surat,peminjam.alamat,peminjam.no_hp, peminjam.nama_peminjam,peminjam.keperluan,peminjaman.*');
			$this->db->from('peminjaman');
			$this->db->join('ruang', 'peminjaman.ruang_id = ruang.id');
			$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
			$this->db->where('tanggal_peminjaman',$tanggal);
			$this->db->order_by('tanggal_peminjaman','asc');
			return $this->db->get()->result();
		}else if($keterangan=="minggu"){
			$tanggal2 = strtotime("+7 day");
			$tanggal2 = date('Y-m-d', $tanggal2);
			$this->db->select('ruang.*, peminjam.no_surat,peminjam.alamat,peminjam.no_hp, peminjam.nama_peminjam,peminjam.keperluan,peminjaman.*');
			$this->db->from('peminjaman');
			$this->db->join('ruang', 'peminjaman.ruang_id = ruang.id');
			$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
			$this->db->where('tanggal_peminjaman >=', $tanggal);
			$this->db->where('tanggal_peminjaman <=', $tanggal2);
			$this->db->order_by('tanggal_peminjaman','asc');
			return $this->db->get()->result();
		}else{
			$month = date_parse_from_format("Y-m-d", $tanggal);
			// $this->db->select('*');
			$this->db->select('ruang.*, peminjam.no_surat,peminjam.alamat,peminjam.no_hp, peminjam.nama_peminjam,peminjam.keperluan,peminjaman.*');
			$this->db->from('peminjaman');
			$this->db->join('ruang', 'peminjaman.ruang_id = ruang.id');
			$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
			$this->db->where('month(tanggal_peminjaman)',$month['month']);
			$this->db->order_by('tanggal_peminjaman','asc');
			return $this->db->get()->result();
		}
	}

	public function show_pj_kendaraan($tanggal,$keterangan){
		if($keterangan=="hari"){
			$this->db->select('peminjaman.*,mobil.merk,mobil.nopol,peminjam.no_surat,peminjam.nama_peminjam');
			$this->db->from('peminjaman');
			$this->db->join('mobil', 'peminjaman.mobil_id = mobil.id');
			$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
			$this->db->where('tanggal_peminjaman',$tanggal);
			return $this->db->get()->result();
		}else if($keterangan=="minggu"){
			$tanggal2 = strtotime("+7 day");
			$tanggal2 = date('Y-m-d', $tanggal2);
			$this->db->select('peminjaman.*,mobil.merk,mobil.nopol,peminjam.no_surat,peminjam.nama_peminjam');
			$this->db->from('peminjaman');
			$this->db->join('mobil', 'peminjaman.mobil_id = mobil.id');
			$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
			$this->db->where('tanggal_peminjaman >=', $tanggal);
			$this->db->where('tanggal_peminjaman <=', $tanggal2);
			return $this->db->get()->result();
		}else{
			$month = date_parse_from_format("Y-m-d", $tanggal);
			$this->db->select('peminjaman.*,mobil.merk,mobil.nopol,peminjam.no_surat,peminjam.nama_peminjam');
			$this->db->from('peminjaman');
			$this->db->join('mobil', 'peminjaman.mobil_id = mobil.id');
			$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
			$this->db->where('month(tanggal_peminjaman)',$month['month']);
			return $this->db->get()->result();
		}
	}

	public function show_pj_alat($tanggal,$keterangan){
		if($keterangan=="hari"){
			$this->db->select('peminjaman_detail.*, peminjaman.*, perlengkapan.*, ruang.nama_ruang, peminjam.*');
			$this->db->from('peminjaman_detail');
			$this->db->join('peminjaman', 'peminjaman_detail.peminjaman_id = peminjaman.id');
			$this->db->join('perlengkapan', 'peminjaman_detail.perlengkapan_id = perlengkapan.id');
			$this->db->join('ruang','peminjaman.ruang_id = ruang.id');
			$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
			$this->db->where('peminjaman.tanggal_peminjaman',$tanggal);
			return $this->db->get()->result();
		}else if($keterangan=="minggu"){
			$tanggal2 = strtotime("+7 day");
			$tanggal2 = date('Y-m-d', $tanggal2);
			$this->db->select('peminjaman_detail.*, peminjaman.*, perlengkapan.*, ruang.nama_ruang, peminjam.*');
			$this->db->from('peminjaman_detail');
			$this->db->join('peminjaman', 'peminjaman_detail.peminjaman_id = peminjaman.id');
			$this->db->join('perlengkapan', 'peminjaman_detail.perlengkapan_id = perlengkapan.id');
			$this->db->join('ruang','peminjaman.ruang_id = ruang.id');
			$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
			$this->db->where('peminjaman.tanggal_peminjaman >=', $tanggal);
			$this->db->where('peminjaman.tanggal_peminjaman <=', $tanggal2);
			return $this->db->get()->result();
		}else{
			$month = date_parse_from_format("Y-m-d", $tanggal);
			$this->db->select('peminjaman_detail.*, peminjaman.*, perlengkapan.*, ruang.nama_ruang, peminjam.*');
			$this->db->from('peminjaman_detail');
			$this->db->join('peminjaman', 'peminjaman_detail.peminjaman_id = peminjaman.id');
			$this->db->join('perlengkapan', 'peminjaman_detail.perlengkapan_id = perlengkapan.id');
			$this->db->join('ruang','peminjaman.ruang_id = ruang.id');
			$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
			$this->db->where('month(peminjaman.tanggal_peminjaman)',$month['month']);
			return $this->db->get()->result();
		}
	}

	public function show_alat_by($id_peminjaman){
		$this->db->select('peminjaman_detail.*,perlengkapan.nama_perlengkapan');
		$this->db->from('peminjaman_detail');
		// $this->db->where('peminjaman.tanggal_peminjaman','2018-05-28');
		$this->db->where('peminjaman.id',$id_peminjaman);
		$this->db->join('peminjaman', 'peminjaman_detail.peminjaman_id = peminjaman.id');
		$this->db->join('perlengkapan', 'peminjaman_detail.perlengkapan_id = perlengkapan.id');
		$this->db->join('peminjam', 'peminjaman.peminjam_id = peminjam.id');
		return $this->db->get()->result();
	}

	public function update_status($id,$status,$tabel,$nama_file){
		$array = array(
			'status' => $status,
			'foto_kesiapan' => str_replace(' ','',$nama_file)
		);
		$this->db->where('id',$id);
    	$this->db->update($tabel,$array);
 		return true;
	}

	public function detail_pinjam_ruang($id){
		$this->db->select('ruang.nama_ruang, ruang.penanggung_jawab_id, peminjam.no_surat,peminjam.alamat,peminjam.no_hp, peminjam.nama_peminjam,peminjam.keperluan,peminjaman.*');
		$this->db->from('peminjaman');
		$this->db->join('ruang', 'peminjaman.ruang_id = ruang.id');
		$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
		$this->db->where('peminjaman.id',$id);
		return $this->db->get()->row_array();
	}

	public function detail_pinjam_alat($id){
			$this->db->select('peminjaman_detail.*, peminjaman.*, perlengkapan.*, ruang.nama_ruang, peminjam.*');
			$this->db->from('peminjaman_detail');
			$this->db->join('peminjaman', 'peminjaman_detail.peminjaman_id = peminjaman.id');
			$this->db->join('perlengkapan', 'peminjaman_detail.perlengkapan_id = perlengkapan.id');
			$this->db->join('ruang','peminjaman.ruang_id = ruang.id');
			$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
			$this->db->where('peminjaman.id','1528030189');
			return $this->db->get()->row_array();
	}

	public function detail_pinjam_kendaraan($id){
		$this->db->select('peminjaman.*,mobil.merk,mobil.nopol,peminjam.no_surat,peminjam.nama_peminjam');
		$this->db->from('peminjaman');
		$this->db->join('mobil', 'peminjaman.mobil_id = mobil.id');
		$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
		$this->db->where('peminjaman.id',$id);
		return $this->db->get()->row_array();
	}

	public function show_siap_ruang($status,$id_penanggungjawab){
		$this->db->select('ruang.nama_ruang, ruang.penanggung_jawab_id, peminjam.no_surat,peminjam.alamat,peminjam.no_hp, peminjam.nama_peminjam,peminjam.keperluan,peminjaman.*');
		$this->db->from('peminjaman');
		$this->db->join('ruang', 'peminjaman.ruang_id = ruang.id');
		$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
		$this->db->where('peminjaman.status',$status );
		$this->db->where('peminjaman.penanggung_jawab_id',$id_penanggungjawab );
		$this->db->order_by('peminjaman.tanggal_peminjaman','asc');
		return $this->db->get()->result();
	}

	public function show_siap_alat($status,$id_penanggungjawab){
		$this->db->select('peminjam.no_surat, peminjam.nama_peminjam, perlengkapan.nama_perlengkapan, perlengkapan.penanggung_jawab_id, perlengkapan.jumlah, peminjaman.id, peminjaman.tanggal_peminjaman, peminjaman.status');
		$this->db->from('peminjaman');
		$this->db->join('peminjaman_detail', 'peminjaman_detail.peminjaman_id = peminjaman.id');
		$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
		$this->db->join('perlengkapan','peminjaman_detail.perlengkapan_id = perlengkapan.id');
		$this->db->where('peminjaman.status',$status );
		$this->db->where('peminjaman.penanggung_jawab_id',$id_penanggungjawab );
		$this->db->order_by('peminjaman.tanggal_peminjaman','asc');
		return $this->db->get()->result();
	}

	public function show_siap_kendaraan($status,$id_penanggungjawab){
		$this->db->select('mobil.nopol, mobil.merk, mobil.penanggung_jawab_id, peminjam.no_surat,peminjam.alamat,peminjam.no_hp, peminjam.nama_peminjam,peminjam.keperluan,peminjaman.*');
		$this->db->from('peminjaman');
		$this->db->join('mobil', 'peminjaman.mobil_id = mobil.id');
		$this->db->join('peminjam','peminjaman.peminjam_id = peminjam.id');
		$this->db->where('peminjaman.status',$status );
		$this->db->where('peminjaman.penanggung_jawab_id',$id_penanggungjawab );
		$this->db->order_by('peminjaman.tanggal_peminjaman','asc');
		return $this->db->get()->result();
	}

	public function show_ruang(){
		$this->db->select('ruang.*,penanggung_jawab.nama,penanggung_jawab.no_hp');
		$this->db->from('ruang');
		$this->db->join('penanggung_jawab','ruang.penanggung_jawab_id = penanggung_jawab.id');
		return $this->db->get()->result();
	}

	public function show_kendaraan(){
		$this->db->select('mobil.*,penanggung_jawab.nama,penanggung_jawab.no_hp');
		$this->db->from('mobil');
		$this->db->join('penanggung_jawab','mobil.penanggung_jawab_id = penanggung_jawab.id');
		return $this->db->get()->result();
	}

	public function show_alat(){
		$this->db->select('perlengkapan.*,penanggung_jawab.nama,penanggung_jawab.no_hp');
		$this->db->from('perlengkapan');
		$this->db->join('penanggung_jawab','perlengkapan.penanggung_jawab_id = penanggung_jawab.id');
		return $this->db->get()->result();
	}

}