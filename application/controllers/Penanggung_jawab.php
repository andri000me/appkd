<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penanggung_jawab extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('penanggung_jawab_model');
		$this->auth->is_logged_in();
	}

	public function index()
	{
		$data = [
					'penanggung_jawab'=>$this->penanggung_jawab_model->show()
				];
		$content = $this->load->view('penanggung_jawab/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function tambah()
	{
		$content = $this->load->view('penanggung_jawab/tambah', [], TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function edit($id)
	{
		$data = [
					'penanggung_jawab'=>$this->penanggung_jawab_model->find($id)
				];
		$content = $this->load->view('penanggung_jawab/edit', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nama', 'Nama Penanggung Jawab', 'trim|required',['required'=>'%s harus diisi']);
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required',['required'=>'%s harus diisi']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',['required'=>'%s harus diisi']);
		$this->form_validation->set_rules('no_hp', 'No Hp', 'trim|required',['required'=>'%s harus diisi']);

		if ($this->form_validation->run()) {
			# code...
			$_POST['password'] = md5($this->input->post('password'));
			$this->penanggung_jawab_model->save($this->input->post());
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
			redirect('penanggung_jawab');
		} else {
			$errors = validation_errors();
			$content = $this->load->view('penanggung_jawab/tambah', compact('errors'), TRUE);
			$this->load->view('template/index',compact('content'));
		}
		
	}

	public function update()
	{
		$id = $this->input->post('id');
		$_POST['password'] = md5($this->input->post('password'));
		$this->penanggung_jawab_model->update($id,$this->input->post());
		$this->session->set_flashdata('success', 'Data Berhasil diupdate');
		redirect('penanggung_jawab');
	}

	public function delete($id)
	{
		$this->penanggung_jawab_model->delete($id);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus	');
		redirect('penanggung_jawab');

	}

}

/* End of file penanggung_jawab.php */
/* Location: ./application/controllers/penanggung_jawab.php */