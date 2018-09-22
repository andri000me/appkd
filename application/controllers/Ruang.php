<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['ruang_model','penanggung_jawab_model']);
		$this->auth->is_logged_in();
	}

	public function index()
	{
		$data = [
					'ruang'=>$this->ruang_model->show()
				];
		$content = $this->load->view('ruang/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function tambah()
	{
		$data = [	
					'penanggung_jawab' => $this->penanggung_jawab_model->show(),
				];
		$content = $this->load->view('ruang/tambah', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function edit($id)
	{
		$data = [
					'penanggung_jawab' => $this->penanggung_jawab_model->show(),
					'ruang'=>$this->ruang_model->find($id)
				];
		$content = $this->load->view('ruang/edit', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nama_ruang', 'Nama Ruang', 'trim|required',['required'=>'%s harus diisi']);

		if ($this->form_validation->run()) {
			# code...
			$this->ruang_model->save($this->input->post());
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
			redirect('ruang');
		} else {
			$errors = validation_errors();
			$content = $this->load->view('ruang/tambah', compact('errors'), TRUE);
			$this->load->view('template/index',compact('content'));
		}
		
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->ruang_model->update($id,$this->input->post());
		$this->session->set_flashdata('success', 'Data Berhasil diupdate');
		redirect('ruang');
	}

	public function delete($id)
	{
		$this->ruang_model->delete($id);
		redirect('ruang');

	}

}

/* End of file ruang.php */
/* Location: ./application/controllers/ruang.php */