<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['peminjaman_model','peminjam_model','ruang_model','mobil_model','penanggung_jawab_model','perlengkapan_model','peminjaman_detail_model']);
		$this->auth->is_logged_in();
		$this->load->library('Utils');
	}

	public function index()
	{
		$data = [
					'peminjaman'=>$this->peminjaman_model->show(),
					'ruang'=>$this->peminjaman_model->ruang(),
					'mobil'=>$this->peminjaman_model->mobil()
				];
		$content = $this->load->view('peminjaman/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function tambah()
	{	
		if ($this->session->userdata('id_peminjaman')=='') {
			
			$this->session->set_userdata( ['id_peminjaman' => time()] );
		}
		$data = [
					'peminjam'=>$this->peminjam_model->show(),
					'ruang'=>$this->ruang_model->show(),
					'mobil'=>$this->mobil_model->show(),
					'penanggung_jawab'=>$this->penanggung_jawab_model->show(),
					'perlengkapan'=>$this->perlengkapan_model->show(),
					'peminjaman_detail'=>$this->peminjaman_detail_model,

				];
		$content = $this->load->view('peminjaman/tambah', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function edit($id)
	{
		$data = [
					'peminjaman'=>$this->peminjaman_model->find($id),
					'peminjam'=>$this->peminjam_model->show(),
					'ruang'=>$this->ruang_model->show(),
					'mobil'=>$this->mobil_model->show(),
					'penanggung_jawab'=>$this->penanggung_jawab_model->show(),
					'perlengkapan'=>$this->perlengkapan_model->show(),
					'peminjaman_detail'=>$this->peminjaman_detail_model->get_peminjaman_detail($id),
				];
		$content = $this->load->view('peminjaman/edit', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function simpan()
	{
		$jenis = $this->input->post('jenis');
		$data = [
					'id'=>$this->input->post('id'),
					'peminjam_id'=>$this->input->post('id_peminjam'),
					'ruang_id'=>$this->input->post('ruang_id'),
					'mobil_id'=>$this->input->post('mobil_id'),
					'tanggal_peminjaman'=>$this->input->post('tanggal_peminjaman'),
					'tanggal_selesai'=> $this->input->post('tanggal_selesai'),
					'jam'=>$this->input->post('jam'),
					'keterangan'=>$this->input->post('keterangan'),
					'jumlah_peserta'=>$this->input->post('jumlah_peserta'),
					'acara'=>$this->input->post('acara'),
					'tempat'=>$this->input->post('tempat'),
					'keterangan'=>$this->input->post('keterangan'),
					'penanggung_jawab_id'=>$this->input->post('penanggung_jawab_id'),
					'foto_kesiapan' => 'default'
				];
		$this->peminjaman_model->save($data);
		$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
		// session_unset('id_peminjaman');
		$this->session->unset_userdata('id_peminjaman');

		$penanggung_jawab_id = $this->input->post('penanggung_jawab_id');
		$title = $this->utils->tanggal_indo($this->input->post('tanggal_peminjaman'),true);
		$message = $this->input->post('acara');

		$this->utils->pushNotif($penanggung_jawab_id, $title, $message);
		
		if ($jenis=='mobil') {
			redirect('peminjaman?jenis=mobil');
		}else if ($jenis=='ruang') {
			redirect('peminjaman?jenis=ruang');
			
		}else{
			redirect('perlengkapan/daftar_peminjaman');
		}
		
	}

	public function update()
	{
		$jenis = $this->input->post('jenis');
		$id = $this->input->post('id');
		$data = [
					'peminjam_id'=>$this->input->post('id_peminjam'),
					'ruang_id'=>$this->input->post('ruang_id'),
					'mobil_id'=>$this->input->post('mobil_id'),
					'tanggal_peminjaman'=>$this->input->post('tanggal_peminjaman'),
					'tanggal_selesai'=> $this->input->post('tanggal_selesai'),
					'keterangan'=>$this->input->post('keterangan'),
					'jumlah_peserta'=>$this->input->post('jumlah_peserta'),
					'acara'=>$this->input->post('acara'),
					'tempat'=>$this->input->post('tempat'),
					'keterangan'=>$this->input->post('keterangan'),
					'penanggung_jawab_id'=>$this->input->post('penanggung_jawab_id')
				];
		$this->peminjaman_model->update($id,$data);
		$this->session->set_flashdata('success', 'Data Berhasil diupdate');
		if ($jenis=='mobil') {
			
			redirect('peminjaman?jenis=mobil');
		}else if ($jenis=='ruang') {
			redirect('peminjaman?jenis=ruang');
			
		}else{
			redirect('perlengkapan/daftar_peminjaman');
		}
	}

	public function delete($id,$jenis)
	{
		$this->peminjaman_model->delete($id);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus	');
		if ($jenis=='mobil') {
			
			redirect('peminjaman?jenis=mobil');
		}else if ($jenis=='ruang') {
			redirect('peminjaman?jenis=ruang');
			
		}else{
			redirect('perlengkapan/daftar_peminjaman');
		}

	}

	function get_jumlah_perlengkapan()
	{
		$tanggal = date("Y-m-d",strtotime($this->input->post('tanggal')));

		$perlengkapan = $this->peminjaman_model->get_jumlah_perlengkapan($tanggal);
		echo json_encode($perlengkapan);
	}

	public function copy($id_peminjaman,$jenis)
	{
		$peminjaman = $this->peminjaman_model->find($id_peminjaman);
		$detail = $this->peminjaman_detail_model->get_peminjaman_detail($id_peminjaman);
		$id = time();
		$data = [
					'id'=>$id,
					'peminjam_id'=>$peminjaman->peminjam_id,
					'tanggal_peminjaman'=>$peminjaman->tanggal_peminjaman,
					'status'=>$peminjaman->status,
					'tanggal_selesai'=>$peminjaman->tanggal_selesai,
					'mobil_id'=>$peminjaman->mobil_id,
					'foto_kesiapan'=>$peminjaman->foto_kesiapan,
					'ruang_id'=>$peminjaman->ruang_id,
					'keterangan'=>$peminjaman->keterangan,
					'jumlah_peserta'=>$peminjaman->jumlah_peserta,
					'acara'=>$peminjaman->acara,
					'tempat'=>$peminjaman->tempat,
					'penanggung_jawab_id'=>$peminjaman->penanggung_jawab_id
				];
		$this->peminjaman_model->save($data);
		foreach ($detail as $d) {
			$this->peminjaman_detail_model->save([
				'perlengkapan_id'=>$d->perlengkapan_id,
				'jumlah'=>$d->jumlah,
				'peminjaman_id'=>$id
			]);
		}

		$this->session->set_flashdata('success', 'Data Berhasil di copy');
		if ($jenis=='mobil') {
			
			redirect('peminjaman?jenis=mobil');
		}else if ($jenis=='ruang') {
			redirect('peminjaman?jenis=ruang');
			
		}else{
			redirect('perlengkapan/daftar_peminjaman');
		}
	}

}

/* End of file peminjaman.php */
/* Location: ./application/controllers/peminjaman.php */