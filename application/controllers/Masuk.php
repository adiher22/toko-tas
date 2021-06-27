<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	// Login Pelanggan
	public function index()
	{
		// Validasi
		$this->form_validation->set_rules('email','Email/Username','required|valid_email',
				array(	'required'		=> '%s harus diisi',
						'valid_email'	=> '%s tidak valid'));
		$this->form_validation->set_rules('password','Password','required',
				array(	'required'		=> '%s harus diisi'));
		

		if($this->form_validation->run()){ 

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			
			// Proses
			$this->simple_pelanggan->login($email,$password);
			

		}		

		if($this->session->userdata('email') !="") {
		redirect(base_url('dashboard'),'refresh');
			}
		
		$data = array(		'title'		=> 'Login Pelanggan',
							'isi'		=> 'masuk/list',
							);
		$this->load->view('layout/wrapper', $data, FALSE);
	
	}
	public function logout()
	{	
		// Ambil fungsi logout dari simple pelanggan yang sudah di set di autoload library
		$this->simple_pelanggan->logout();

	}	
}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */