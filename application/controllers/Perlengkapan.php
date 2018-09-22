<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perlengkapan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['ruang_model','perlengkapan_model','penanggung_jawab_model','peminjam_model','peminjaman_detail_model','peminjaman_model']);
		$this->auth->is_logged_in();
	}

	public function index()
	{
		$data = [
					'perlengkapan'=>$this->perlengkapan_model->show()
				];
		$content = $this->load->view('perlengkapan/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function tambah()
	{
		$data =[
				'ruang'=>$this->ruang_model->show(),
				'penanggung_jawab' => $this->penanggung_jawab_model->show(),
				];
		$content = $this->load->view('perlengkapan/tambah', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function edit($id)
	{
		$data = [
					'perlengkapan'=>$this->perlengkapan_model->find($id),
					'ruang'=>$this->ruang_model->show(),
					'penanggung_jawab' => $this->penanggung_jawab_model->show(),
				];
		$content = $this->load->view('perlengkapan/edit', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nama_perlengkapan', 'Nama Perlengkapan', 'trim|required',['required'=>'%s harus diisi']);
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required',['required'=>'%s harus diisi']);
		// $this->form_validation->set_rules('ruang', 'Ruang', 'callback_cek_ruang');

		if ($this->form_validation->run()) {
			# code...
			$this->perlengkapan_model->save($this->input->post());
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
			redirect('perlengkapan');
		} else {
			$errors = validation_errors();
			$ruang = $this->ruang_model->show();
			$content = $this->load->view('perlengkapan/tambah', compact('errors','ruang'), TRUE);
			$this->load->view('template/index',compact('content'));
		}
		
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->perlengkapan_model->update($id,$this->input->post());
		$this->session->set_flashdata('success', 'Data Berhasil diupdate');
		redirect('perlengkapan');
	}

	public function delete($id)
	{
		$this->perlengkapan_model->delete($id);
		
		$this->session->set_flashdata('success', 'Data Berhasil dihapus');
		redirect('perlengkapan');

	}

	public function peminjaman()
	{
		if ($this->session->userdata('id_peminjaman')=='') {
			
			$this->session->set_userdata( ['id_peminjaman' => time()] );
		}
		$data =[
				'perlengkapan' => $this->perlengkapan_model->show(),
				'peminjam'=>$this->peminjam_model->show(),
				'penanggung_jawab' => $this->penanggung_jawab_model->show(),
				];
		$content = $this->load->view('perlengkapan/peminjaman', $data, TRUE);
		$this->load->view('template/index',compact('content'));

	}

	public function copy($id_peminjaman)
	{
		$peminjaman = $this->peminjaman_model->find($id_peminjaman);
		$detail = $this->peminjaman_detail_model->get_peminjaman_detail($id_peminjaman);
		$id = time();
		$data = [
					'id'=>$id,
					'peminjam_id'=>$peminjaman->peminjam_id,
					'tanggal_peminjaman'=>$peminjaman->tanggal_peminjaman,
					'status'=>$peminjaman->status,
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
		

		redirect('perlengkapan/daftar_peminjaman');
	}

	public function daftar_peminjaman()
	{
		$data = [
					'peminjaman'=>$this->peminjaman_model->perlengkapan(),
					'peminjaman_detail'=>$this->peminjaman_detail_model
				];
		$content = $this->load->view('perlengkapan/daftar_peminjaman', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function edit_peminjaman($id)
	{
		$data = [
					'peminjaman'=>$this->peminjaman_model->find($id),
					'peminjam'=>$this->peminjam_model->show(),
					'ruang'=>$this->ruang_model->show(),
					'penanggung_jawab' => $this->penanggung_jawab_model->show(),
					'perlengkapan'=>$this->perlengkapan_model->show(),	
					'detail'=>$this->peminjaman_detail_model->get_peminjaman_detail($id)
				];
		$content = $this->load->view('perlengkapan/edit_peminjaman', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function delete_peminjaman($id_peminjaman)
	{
		$this->peminjaman_model->delete($id_peminjaman);
		redirect('perlengkapan/daftar_peminjaman');
	}
}

/* End of file perlengkapan.php */
/* Location: ./application/controllers/perlengkapan.php */