<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}
	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		$data = array(		'title'		=> 'Kontak Admin',
							'alamat'	=> $konfigurasi->alamat,
							'namaweb'	=> $konfigurasi->namaweb,
							'telepon'	=> $konfigurasi->telepon,
							'email'		=> $konfigurasi->email,
							'isi'		=> 'kontak/list'
							);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
		public function cara_pembelian()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		$data = array(		'title'		=> 'Cara Pembelian',
							'konfigurasi' => $konfigurasi,
							'isi'		=> 'kontak/pesan'
							);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */