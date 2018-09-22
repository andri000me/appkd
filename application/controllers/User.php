<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['penanggung_jawab_model','user_model']);
		$this->auth->is_logged_in();
	}

	public function index()
	{
		$data = [
					'user'=>$this->user_model->show()
				];
		$content = $this->load->view('user/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function tambah()
	{
		$data = [
					'penanggung_jawab'=>$this->penanggung_jawab_model->show(),
				];
		$content = $this->load->view('user/tambah', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function edit($id)
	{
		$data = [
					'user'=>$this->user_model->find($id),
					'penanggung_jawab'=>$this->penanggung_jawab_model->show()
				];
		$content = $this->load->view('user/edit', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function simpan()
	{
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|is_unique[user.email]',['required'=>'%s harus diisi','is_unique'=>'Email sudah terdaftar']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]',['required'=>'%s harus diisi','min_length'=>'Panjang Password Minimal 8 Karakter']);
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required|min_length[8]|matches[password]',['required'=>'%s harus diisi','min_length'=>'Panjang %s Minimal 8 Karakter','matches'=>'Konfirmasi Password Tidak Sama']);

		if ($this->form_validation->run()) {
			# code...
			$data = $this->input->post();
			$data['password']=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			unset($data['konfirmasi_password']);
			$this->user_model->save($data);
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
			redirect('user');
		} else {
			$errors = validation_errors();
			$penanggung_jawab = $this->penanggung_jawab_model->show();
			$content = $this->load->view('user/tambah', compact('errors','penanggung_jawab'), TRUE);
			$this->load->view('template/index',compact('content'));
		}
		
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->user_model->update($id,$this->input->post());
		$this->session->set_flashdata('success', 'Data Berhasil diupdate');
		redirect('user');
	}

	public function delete($id)
	{
		$this->user_model->delete($id);
		$this->session->set_flashdata('success', 'Data Berhasil dihapus	');
		redirect('user');

	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */