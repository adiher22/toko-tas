<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('header_transaksi_model');
	}
	// Load data transaksi
	public function index()
	{
		$i = $this->input;

		$dari = $i->post('dari');
		$sampai = $i->post('sampai');	
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('dari', 'Dari', 'required', 
				array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('sampai', 'Sampai', 'required', 
				array(	'required'		=> '%s harus diisi'));


		if($valid->run()!=FALSE) {

		$where = ['header_transaksi.tanggal_transaksi >=' => $dari, 'status_bayar' =>'selesai'];
        
	   	$data = array( 		'title'				=> 'Laporan Transaksi',
						    'laporan'	        => $this->header_transaksi_model->report($where),
							'dari'				=> $dari,
							'sampai'			=> $sampai,
							'isi'				=> 'admin/laporan/list' 
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	

	
	    }
	   $data = array( 		'title'				=> 'Laporan Transaksi',
							'isi'				=> 'admin/laporan/lap'
							);
			$this->load->view('admin/layout/wrapper',$data);	
  }
	// Cetak
	public function cetak()
	{
		$i = $this->input;

		$dari = $i->get('dari');
		$sampai = $i->get('sampai');	

        $site = $this->konfigurasi_model->listing();

        if($dari != "" && $sampai != ""){
		$where = ['header_transaksi.tanggal_transaksi >=' => $dari, 'status_bayar' =>'selesai'];
        
	   	$data = array( 		'title'				=> 'Laporan Transaksi',
						    'laporan'	        => $this->header_transaksi_model->report($where),
							'dari'				=> $dari,
							'sampai'			=> $sampai,
							'site'				=> $site,
							'isi'				=> 'admin/laporan/cetak'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
		} else {

			redirect(base_url('admin/laporan','refresh'));
		}
	}
	// Cetak pdf
	public function pdf()
	{
	    $i = $this->input;

		$dari = $i->get('dari');
		$sampai = $i->get('sampai');	

        $site = $this->konfigurasi_model->listing();

        if($dari != "" && $sampai != ""){
		$where = ['header_transaksi.tanggal_transaksi >=' => $dari, 'status_bayar' =>'selesai'];
        
	   	$data = array( 		'title'				=> 'Laporan Transaksi',
						    'laporan'	        => $this->header_transaksi_model->report($where),
							'dari'				=> $dari,
							'sampai'			=> $sampai,
							'site'				=> $site
						);
		}	
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);

		$html = $this->load->view('admin/laporan/cetak', $data, TRUE);
		// Create an instance of the class:
		$mpdf = new \Mpdf\Mpdf();

		// Write some HTML code:
		$mpdf->WriteHTML($html);

		// Output tampil nama baru
		$nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$kode_transaksi.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */