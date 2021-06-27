<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}
	// Data User 
	public function index()
	{	
		$user = $this->user_model->listing();

		$data = array(	'title'		=> 'Data Pengguna',
						'user'		=> $user,
						'isi'		=> 'admin/user/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// Data User 
	public function pelanggan()
	{	
		$pelanggan = $this->pelanggan_model->listing();


		$data = array(	'title'		=> 'Data Pengguna',
						'pelanggan'	=> $pelanggan,
						'isi'		=> 'admin/user/pelanggan'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// Status Pelanggan
	public function status($id_pelanggan)
	{
		$pelanggan = $this->pelanggan_model->detail($id_pelanggan);

		if($pelanggan->status_pelanggan =='Aktif') {
		$data = array ( 'id_pelanggan'		=> $id_pelanggan,
						'status_pelanggan'	=> 'Nonaktif');

		$this->pelanggan_model->edit($data);
		redirect(base_url('admin/user/pelanggan'),'refresh');
		}else {
		$data = array ( 'id_pelanggan'		=> $id_pelanggan,
						'status_pelanggan'	=> 'Aktif');

		$this->pelanggan_model->edit($data);
		redirect(base_url('admin/user/pelanggan'),'refresh');
		}
		
		

	}
	public function tambah()
	{	
		
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama lengkap', 'required', 
				array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('email', 'Email', 'required|valid_email', 
				array(	'required'		=> '%s harus diisi',
						'valid_email' 	=> '%s tidak valid'));

		$valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[32]|is_unique[users.username]', 
				array(	'required'		=> '%s harus diisi',
						'min_length'	=> '%s minimal 6 karakter',
						'max_length'	=> '%s maksimal 32 karakter',
						'is_unique'		=> '%s sudah ada, Buat username baru'));

		$valid->set_rules('password', 'Password', 'required', 
				array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE) {


		$data = array(	'title'		=> 'Tambah Pengguna',						
						'isi'		=> 'admin/user/tambah'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
	}else {
		$i = $this->input;
		$data = array(  'nama'			=> $i->post('nama'),
						'email'			=> $i->post('email'),
						'username'		=> $i->post('username'),
						'password'		=> SHA1($i->post('password')),
						'akses_level'	=> 'User'
					);
		$this->user_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
		redirect(base_url('admin/user'),'refresh');
	}
}
// Edit
public function edit($id_user)
	{	
		$user = $this->user_model->detail($id_user);
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama lengkap', 'required', 
				array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('email', 'Email', 'required|valid_email', 
				array(	'required'		=> '%s harus diisi',
						'valid_email' 	=> '%s tidak valid'));

		

		$valid->set_rules('password', 'Password', 'required', 
				array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE) {


		$data = array(	'title'		=> 'Edit Pengguna',	
						'user'		=>  $user,					
						'isi'		=> 'admin/user/edit'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
	}else {
		$i = $this->input;

		$data = array( 	'id_user'		=> $id_user,
						'nama'			=> $i->post('nama'),
						'email'			=> $i->post('email'),
						'username'		=> $i->post('username'),
						'password'		=> SHA1($i->post('password')),
						'akses_level'	=> $i->post('akses_level')	
					);
		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/user'),'refresh');
	}
}
	public function delete($id_user){
		$data = array('id_user' => $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}
	// end validasi
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */