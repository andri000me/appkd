<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peminjam_model');
		$this->auth->is_logged_in();
	}

	public function index()
	{
		$data = [
					'peminjam'=>$this->peminjam_model->show()
				];
		$content = $this->load->view('peminjam/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function tambah()
	{
		

		$content = $this->load->view('peminjam/tambah', compact('jenis'), TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function edit($id)
	{
		$data = [
					'peminjam'=>$this->peminjam_model->find($id)
				];
		$content = $this->load->view('peminjam/edit', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function simpan()
	{
		$this->form_validation->set_rules('no_surat', 'No Surat', 'trim|required|is_unique[peminjam.no_surat]',['required'=>'%s harus diisi','is_unique'=>'No Surat sudah ada']);
		$this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'trim|required',['required'=>'%s harus diisi']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',['required'=>'%s harus diisi']);
		$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required',['required'=>'%s harus diisi']);
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required',['required'=>'%s harus diisi']);

		if ($this->form_validation->run()) {
			# code...
			$this->peminjam_model->save($this->input->post());
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
			redirect('peminjam');
		} else {
			$errors = validation_errors();
			$content = $this->load->view('peminjam/tambah', compact('errors'), TRUE);
			$this->load->view('template/index',compact('content'));
		}
		
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->peminjam_model->update($id,$this->input->post());
		$this->session->set_flashdata('success', 'Data Berhasil diupdate');
		redirect('peminjam');
	}

	public function delete($id)
	{
		$this->peminjam_model->delete($id);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus	');
		redirect('peminjam');

	}

	function numeric_hp($str)
	{
		return preg_match('/^[0-9,]+$/', $str);
		$this->form_validation->set_message('numeric_hp','bukan angka');
	}

}

/* End of file peminjam.php */
/* Location: ./application/controllers/peminjam.php */