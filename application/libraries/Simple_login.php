<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load data model user
        $this->CI->load->model('user_model');

	}

	//Fungsi Login
	public function login($username,$password) {
		$check = $this->CI->user_model->login($username,$password);
		// Jika ada data user, maka create session
		
        

		if($check) {
			$id_user	 	= $check->id_user;
			$nama		 	= $check->nama;
			$akses_level 	= $check->akses_level;
			// Create session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			// Redirect ke halaman yang di proteksi
			redirect(base_url('admin/dashboard'),'refresh');

		}else{
			// Kalau tidakada(username atau password salah) maka suruh login lagi
			$this->CI->session->set_flashdata('warning', 'Username atau password salah..!');
			redirect(base_url('login'),'refresh');
		}



	}
	

	// Cek login
	public function cek_login(){
		// Memeriksa session sudah ada atau belum
		if($this->CI->session->userdata('username') == ""){
			$this->CI->session->set_flashdata('warning', 'Anda Belum login!');
			redirect(base_url('login'),'refresh');
		}
	}
	// Logout
	public function logout(){
		// Membuang session yang telah di save
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		// Redirect ke login
		$this->CI->session->set_flashdata('sukses', 'Anda Berhasil logout');
			redirect(base_url('login'),'refresh');
	}
	

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
