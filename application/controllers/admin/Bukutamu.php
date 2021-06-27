<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukutamu extends CI_Controller {
	// load model
	public function __construct()
	{
		parent::__construct();
		// Load model 
		$this->load->model('buku_model');
	}
	public function index()
	{
		$bukutamu = $this->buku_model->listing();

		$data = array(	'title'			=> 'Data Buku Tamu',
						'bukutamu'		=> $bukutamu,
						'isi'			=> 'admin/bukutamu/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function tambah(){
		$bukutamu = $this->buku_model->listing();
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_lengkap', 'Nama Lengkap', 'required', 
				array(	'required'		=> '%s harus diisi'	));

		$valid->set_rules('telepon', 'Nomor Telepon', 'required', 
				array(	'required'		=> '%s harus diisi'	));

		$valid->set_rules('email', 'Email', 'required|is_unique[bukutamu.email]', 
				array(	'required'		=> '%s harus diisi',
						'is_unique'		=> '%s sudah ada! Buat nomor rekening baru'
			));
		$valid->set_rules('pesan', 'Kritik dan saran', 'required', 
				array(	'required'		=> '%s harus diisi'	));
		if($valid->run()===FALSE) {


		$data = array(	'title'		=> 'Kritik dan saran',	
						'bukutamu'	=> $bukutamu,					
						'isi'		=> 'bukutamu/buku_tamu'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
		// Masuk database
	}else {
		$i 				= $this->input;
		

		$data = array(  'nama_lengkap'		=> $i->post('nama_lengkap'),
						'telepon'	     	=> $i->post('telepon'),
						'email'				=> $i->post('email'),
						'pesan'				=> $i->post('pesan')
					);
		$this->buku_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Kritik dan saran anda telah dikirim');
		redirect(base_url('admin/bukutamu/tambah'),'refresh');
	}
	}
	public function delete($id_bukutamu){
		$data = array('id_bukutamu' => $id_bukutamu);
		$this->buku_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/bukutamu'),'refresh');
	}


}

/* End of file Bukutamu.php */
/* Location: ./application/controllers/admin/Bukutamu.php */