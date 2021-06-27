<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {


	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ongkir_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}
	// Data Ongkir 
	public function index()
	{	
		$ongkir = $this->ongkir_model->listing();

		$data = array(	'title'			=> 'Data Ongkir',
						'ongkir'		=> $ongkir,
						'isi'			=> 'admin/ongkir/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{	
		
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kota', 'Nama Kota', 'required', 
				array(	'required'		=> '%s harus diisi'	));

		$valid->set_rules('ongkos_kirim', 'Ongkos Kirim', 'required', 
				array(	'required'		=> '%s harus diisi'		
			));
		if($valid->run()===FALSE) {


		$data = array(	'title'		=> 'Tambah Ongkir',						
						'isi'		=> 'admin/ongkir/tambah'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
	}else {
		$i 				= $this->input;
		

		$data = array(  'kota'			    => $i->post('nama_kota'),
						'ongkos_kirim'	    => $i->post('ongkos_kirim'),
						
					);
		$this->ongkir_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
		redirect(base_url('admin/ongkir'),'refresh');
	}
}
// Edit
public function edit($id_ongkir)
	{	
		$ongkir = $this->ongkir_model->get($id_ongkir);
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kota', 'Nama Ongkir', 'required', 
				array(	'required'		=> '%s harus diisi'));
		$valid->set_rules('ongkos_kirim', 'Ongkos Kirim', 'required', 
				array(	'required'		=> '%s harus diisi'));


		if($valid->run()===FALSE) {


		$data = array(	'title'		=> 'Edit Ongkir',	
						'ongkir'		=>  $ongkir,					
						'isi'		=> 'admin/ongkir/edit'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
	}else {
		$i 				= $this->input;

		$data = array( 	'id_ongkir'		    => $id_ongkir,
						'kota'			    => $i->post('nama_kota'),
						'ongkos_kirim'	    => $i->post('ongkos_kirim')
						
					);
		$this->ongkir_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/ongkir'),'refresh');
	}
}
	public function delete($id_ongkir){
		$data = array('id_ongkir' => $id_ongkir);
		$this->ongkir_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/ongkir'),'refresh');
	}
	// end validasi
}

/* End of file Ongkir.php */
/* Location: ./application/controllers/admin/Ongkir.php */