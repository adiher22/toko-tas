<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load data model user
        $this->CI->load->model('pelanggan_model');

	}

	//Fungsi Login
	public function login($email,$password) {

		$check = $this->CI->pelanggan_model->login($email,$password);

		// Jika ada data user, maka create session
		if($check) {
			$id_pelanggan		= $check->id_pelanggan;
			$nama_pelanggan		= $check->nama_pelanggan;
			// Cek status aktif atau tidak
		   if($check->status_pelanggan != 'Baru' && $check->status_pelanggan != 'Aktif') {
			$this->CI->session->set_flashdata('warning', 'Pelanggan Tidak Aktif..Silahkan hubungi admin..!');
			redirect(base_url('masuk'),'refresh');
		    }else {
			// Create session
			$datapelanggan = array ( 
									'id_pelanggan'		=> $id_pelanggan,
									'nama_pelanggan'	=> $nama_pelanggan,
									'email'				=> $email
								);

				$this->CI->session->set_userdata($datapelanggan);

			// Redirect ke halaman yang di proteksi
			redirect(base_url('dashboard'),'refresh');
			}
			
		}else{
			// Kalau tidakada(username atau password salah) maka suruh login lagi
			$this->CI->session->set_flashdata('warning', 'Username atau password salah..!');
			redirect(base_url('masuk'),'refresh');
		}

		
	}
	// Cek login
	public function cek_login(){
		// Memeriksa session sudah ada atau belum
		if($this->CI->session->userdata('email') == ""){
			$this->CI->session->set_flashdata('warning', 'Anda Belum login!');
			redirect(base_url('masuk'),'refresh');
		}
	}
	// Logout
	public function logout(){
		// Membuang session yang telah di save
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('email');
	
		// Redirect ke login
		$this->CI->session->set_flashdata('sukses', 'Anda Berhasil logout');
			redirect(base_url('masuk'),'refresh');
	}
	

}

/* End of file Simple_pelanggan.php */
/* Location: ./application/libraries/Simple_pelanggan.php */
