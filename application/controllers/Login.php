<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	// halaman login  
	public function index()
	{

		// Validasi
		$this->form_validation->set_rules('username','Username','required',
				array(	'required'		=> '%s harus diisi'));
		$this->form_validation->set_rules('password','Password','required',
				array(	'required'		=> '%s harus diisi'));

		if($this->form_validation->run()){


			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			// Proses
			$this->simple_login->login($username,$password);

	}
		if($this->session->userdata('username') !="") {
			redirect(base_url('admin/dashboard'),'refresh');
		}
		// End validasi
		$data = array( 	'title' 	=> 'Login Administrator');
		$this->load->view('login/list', $data, FALSE);
	}
	// funsi logout
	public function logout(){
		// ambil funsi logout dari simple login
		$this->simple_login->logout();
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */