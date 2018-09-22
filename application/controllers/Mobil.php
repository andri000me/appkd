<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['mobil_model','penanggung_jawab_model']);
		$this->auth->is_logged_in();
	}

	public function index()
	{
		$data = [
					'mobil'=>$this->mobil_model->show()
				];
		$content = $this->load->view('mobil/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function tambah()
	{
		$data = [
					'penanggung_jawab' => $this->penanggung_jawab_model->show(),
				];
		$content = $this->load->view('mobil/tambah', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function edit($id)
	{
		$data = [
					'mobil'=>$this->mobil_model->find($id),
					'penanggung_jawab' => $this->penanggung_jawab_model->show(),
				];
		$content = $this->load->view('mobil/edit', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nopol', 'No Polisi', 'trim|required|max_length[9]',['required'=>'%s harus diisi','max_length'=>'Maksimal 9 Karakter']);
		$this->form_validation->set_rules('merk', 'Merk', 'trim|required',['required'=>'%s harus diisi']);

		if ($this->form_validation->run()) {
			# code...
			$this->mobil_model->save($this->input->post());
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
			redirect('mobil');
		} else {
			$errors = validation_errors();
			$content = $this->load->view('mobil/tambah', compact('errors'), TRUE);
			$this->load->view('template/index',compact('content'));
		}
		
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->mobil_model->update($id,$this->input->post());
		$this->session->set_flashdata('success', 'Data Berhasil diupdate');
		redirect('mobil');
	}

	public function delete($id)
	{
		$this->mobil_model->delete($id);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus	');
		redirect('mobil');

	}

}

/* End of file Mobil.php */
/* Location: ./application/controllers/Mobil.php */