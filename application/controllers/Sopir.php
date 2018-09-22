<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sopir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sopir_model');
		$this->auth->is_logged_in();
	}

	public function index()
	{
		$data = [
					'sopir'=>$this->sopir_model->show()
				];
		$content = $this->load->view('sopir/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function tambah()
	{
		$content = $this->load->view('sopir/tambah', [], TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function edit($id)
	{
		$data = [
					'sopir'=>$this->sopir_model->find($id)
				];
		$content = $this->load->view('sopir/edit', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required',['required'=>'%s harus diisi']);
		$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required',['required'=>'%s harus diisi']);

		if ($this->form_validation->run()) {
			# code...
			$this->sopir_model->save($this->input->post());
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
			redirect('sopir');
		} else {
			$errors = validation_errors();
			$content = $this->load->view('sopir/tambah', compact('errors'), TRUE);
			$this->load->view('template/index',compact('content'));
		}
		
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->sopir_model->update($id,$this->input->post());
		$this->session->set_flashdata('success', 'Data Berhasil diupdate');
		redirect('sopir');
	}

	public function delete($id)
	{
		$this->sopir_model->delete($id);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus	');
		redirect('sopir');

	}

}

/* End of file sopir.php */
/* Location: ./application/controllers/sopir.php */