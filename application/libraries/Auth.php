<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function is_logged_in()
	{
		if(!$this->ci->session->userdata('login') ){
			redirect('login');
		}
	}

	

}

/* End of file Auth.php */
/* Location: ./application/libraries/Auth.php */
