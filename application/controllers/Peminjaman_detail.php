<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['peminjaman_detail_model','peminjam_model','ruang_model','mobil_model','penanggung_jawab_model','perlengkapan_model']);
		$this->auth->is_logged_in();
	}

	public function index()
	{
		$data = [
					'peminjaman_detail'=>$this->peminjaman_detail_model->show()
				];
		$content = $this->load->view('peminjaman_detail/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	function get_peminjaman_detail($peminjaman_id)
	{
		$peminjaman = $this->peminjaman_detail_model->get_peminjaman_detail($peminjaman_id);
		echo json_encode($peminjaman);
	}

	public function tambah()
	{	
		// $this->session->set_userdata( ['id_peminjaman_detail' => time()] );
		$data = [
					'peminjam'=>$this->peminjam_model->show(),
					'ruang'=>$this->ruang_model->show(),
					'mobil'=>$this->mobil_model->show(),
					'penanggung_jawab'=>$this->penanggung_jawab_model->show(),
					'perlengkapan'=>$this->perlengkapan_model->show(),
				];
		$content = $this->load->view('peminjaman_detail/tambah', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function edit($id)
	{
		$data = [
					'peminjaman_detail'=>$this->peminjaman_detail_model->find($id)
				];
		$content = $this->load->view('peminjaman_detail/edit', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function simpan()
	{
		$this->peminjaman_detail_model->save($this->input->post());
		// update jumlah perlengkapan
		$this->input->post('perlengkapan_id');
		// $jumlah = $this->input->post('jumlah');
		// $jumlah_awal = getColumn('perlengkapan',['id'=>$id_perlengkapan])->jumlah;
		// $this->perlengkapan_model->update($id_perlengkapan,['jumlah'=>$jumlah_awal-$jumlah]);


		
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->peminjaman_detail_model->update($id,$this->input->post());
		$this->session->set_flashdata('success', 'Data Berhasil diupdate');
		redirect('peminjaman_detail');
	}

	public function delete($id,$id_peminjaman=null)
	{
		$this->peminjaman_detail_model->delete($id);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus	');
		if ($id_peminjaman>0) {
			redirect('peminjaman/edit/'.$id_peminjaman);

		}else{
			redirect('peminjaman_detail');
		}
	}

	function hapus()
	{
		$id = $this->input->post('id');
		$perlengkapan_id = $this->input->post('perlengkapan_id');
		$jumlah = $this->input->post('jumlah');
		$this->peminjaman_detail_model->hapus($id);

		
		echo json_encode(['success'=>TRUE]);
	}

}

/* End of file peminjaman_detail.php */
/* Location: ./application/controllers/peminjaman_detail.php */