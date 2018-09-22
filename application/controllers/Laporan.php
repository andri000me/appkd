<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['peminjaman_model','peminjam_model','ruang_model','mobil_model','penanggung_jawab_model','perlengkapan_model','peminjaman_detail_model']);
		$this->auth->is_logged_in();
		$this->load->library('Utils');
	}

	public function index()
	{
		# code...
		$content = $this->load->view('laporan/index', [], TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function tampil(){
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');

		$data = [
					'peminjaman'=>$this->peminjaman_model->export($tanggal_mulai,$tanggal_selesai)
				];
		$content = $this->load->view('laporan/data_peminjaman', $data, TRUE);
		$this->load->view('template/index',compact('content'));

		

	}
}