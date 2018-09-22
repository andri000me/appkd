<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	function validate()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$valid_user = $this->user_model->is_valid($email);

		$this->form_validation->set_rules('email', 'E Mail', 'trim|required',['required'=>'E Mail tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',['required'=>'Password tidak boleh kosong']);

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			$this->load->view('login',compact('errors'));
		} else {
			# code...
			if ($valid_user) {
				if (password_verify($password,$valid_user->password)) {
					$array = array(
						'login' => TRUE,
						'id_user'=>$valid_user->id,
						'email'=>$valid_user->email,
						'hak_akses'=>$valid_user->hak_akses,
						'penangung_jawab'=>$valid_user->penanggung_jawab_id
					);
					
					$this->session->set_userdata( $array );
					redirect('home');
				}else{
					$this->session->set_flashdata('gagal', 'Password/Username Salah');
					redirect('login');
				}
			}else{
					$this->session->set_flashdata('gagal', 'Password/Username Salah');
					redirect('login');
			}
		}
	}

	function logout()
	{
		$this->session->unset_userdata(['login','id_user','hak_akses','penangung_jawab','email']);
		redirect('login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */