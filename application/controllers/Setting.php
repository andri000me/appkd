<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_model');
		$this->auth->is_logged_in();
	}

	public function index()
	{
		$data = [
					'setting'=>$this->Setting_model->find(1)
				];
		$content = $this->load->view('setting/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	function update()
	{
		$logo = getColumn('setting', ['id'=>1])->logo;
		if (empty($_FILES['logo']['name'])) {
		    $_POST['logo'] = $logo;
		}elseif (!empty($_FILES['logo']['name'])) {
		    if (file_exists('uploads/'.$logo)) {
		        unlink('uploads/'.$logo);
		    }
		    $this->upload();
		}
		$this->Setting_model->update($this->input->post());
		$this->session->set_flashdata('success', 'Data Berhasil diupdate');
		redirect('setting');
	}

	public function upload()
	{
	    $config['upload_path']          = './uploads';
	    $config['allowed_types']        = 'gif|jpg|png|';
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('logo'))
	      {
	              $error = array('error' => $this->upload->display_errors());

	            $content = $this->load->view('setting/index', $error,TRUE);
	            $this->load->view('template/index',compact('content'));
	      }
	      else
	      {
	              // $data = array('upload_data' => $this->upload->data());

	              // $this->load->view('upload_success', $data);
	        $hasil = $this->upload->data();

	        $_POST['logo'] = $hasil['file_name'];
	      }
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */