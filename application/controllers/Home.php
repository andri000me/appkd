<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('peminjaman_model');
	}

	public function index()
	{
		$data = [
					'ruang'=>$this->peminjaman_model->ruang(),
					'mobil'=>$this->peminjaman_model->mobil()
				];
		$content = $this->load->view('home/index', $data, TRUE);
		$this->load->view('template/index',compact('content'));
	}

	public function book($dir)
	{
		$content = $this->load->view('home/book', compact('dir'), TRUE);
		$this->load->view('template/index',compact('content'));
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */