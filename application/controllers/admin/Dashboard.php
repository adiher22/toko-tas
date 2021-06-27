<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	// load model
	public function __construct()
	{
		parent::__construct();
		// Load model 
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('kategori_model');
		$this->load->model('produk_model');
		$this->load->model('konfigurasi_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}
	// Halaman Utama Dashboard
	public function index()
	{
		$data = array (   'title'  				=>  'Halaman Administrator',
						  'site'				=> $this->konfigurasi_model->listing(),
						  'pelanggan'			=> $this->pelanggan_model->count(),
						  'transaksi'			=> $this->header_transaksi_model->count(),
						  'kategori'			=> $this->kategori_model->count(),
						  'produk'				=> $this->produk_model->count(),
						  'header_transaksi'	=> $this->header_transaksi_model->count(),
						  'isi'	   				=>  'admin/dashboard/list'
					  );

		 $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];


		$data['grafik_jual'] = [];

		 foreach ($bln as $b) {

           $data['grafik_jual'][] = $this->header_transaksi_model->chartPenjualan($b);
            
        }

		$this->load->view('admin/layout/wrapper', $data, FALSE);	


	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */