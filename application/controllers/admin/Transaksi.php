<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('konfigurasi_model');
	}
	// Load data transaksi
	public function index()
	{
		$header_transaksi = $this->header_transaksi_model->listing();

		$data = array( 		'title'				=> 'Data Transaksi',
							'header_transaksi'	=> $header_transaksi,
							'isi'				=> 'admin/transaksi/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// Status proses
	public function status_diproses($kode_transaksi)
	{
		
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(		'title'				=> 'Update_Status',
							'header_transaksi'	=> $header_transaksi,
							'isi'				=> 'admin/transaksi/list' 
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		$data =  array (	'id_header'		=> $header_transaksi->id_header,
							'status_bayar'	=> 'Diproses' 
						);	

		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data diupdate');
		redirect(base_url('admin/transaksi'),'refresh');
	}
	// Status dikirim
	public function status_dikirim($kode_transaksi)
	{
		
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(		'title'				=> 'Update_Status',
							'header_transaksi'	=> $header_transaksi,
							'isi'				=> 'admin/transaksi/list' 
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		$data =  array (	'id_header'		=> $header_transaksi->id_header,
							'status_bayar'	=> 'Dikirim' 
						);	

		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data diupdate');
		redirect(base_url('admin/transaksi'),'refresh');
	}
	// Status dikirim
	public function status_selesai($kode_transaksi)
	{
		
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(		'title'				=> 'Update_Status',
							'header_transaksi'	=> $header_transaksi,
							'isi'				=> 'admin/transaksi/list' 
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		$data =  array (	'id_header'		=> $header_transaksi->id_header,
							'status_bayar'	=> 'Selesai' 
						);	

		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data diupdate');
		redirect(base_url('admin/transaksi'),'refresh');
	}

	// Detail
	public function detail($kode_transaksi)
	{
		
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(		'title'				=> 'Detail Transaksi',
							'header_transaksi'	=> $header_transaksi,
							'transaksi'			=> $transaksi,
							'isi'				=> 'admin/transaksi/detail' 
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Cetak
	public function cetak($kode_transaksi)
	{
		
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site = $this->konfigurasi_model->listing();

		$data = array(		'title'				=> 'Cetak Transaksi',
							'header_transaksi'	=> $header_transaksi,
							'transaksi'			=> $transaksi,
							'site'				=> $site,
							
						);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}
	// Cetak pdf
	public function pdf($kode_transaksi)
	{
		
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site = $this->konfigurasi_model->listing();

		$data = array(		'title'				=> 'Cetak Transaksi',
							'header_transaksi'	=> $header_transaksi,
							'transaksi'			=> $transaksi,
							'site'				=> $site			
						);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);

		$html = $this->load->view('admin/transaksi/cetak', $data, TRUE);
		// Create an instance of the class:
		$mpdf = new \Mpdf\Mpdf();

		// Write some HTML code:
		$mpdf->WriteHTML($html);

		// Output tampil nama baru
		$nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$kode_transaksi.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}
	// Pengiriman
 	public function kirim($kode_transaksi)
	{
		
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site = $this->konfigurasi_model->listing();

		$data = array(		'title'				=> 'Cetak Pengiriman',
							'header_transaksi'	=> $header_transaksi,
							'transaksi'			=> $transaksi,
							'site'				=> $site			
						);
		// $this->load->view('admin/transaksi/kirim', $data, FALSE);

		$html = $this->load->view('admin/transaksi/kirim', $data, true);
		// load fungsi mpdf
		$mpdf = new \Mpdf\Mpdf();
		// Set header & footer pdf
		$mpdf->SetHTMLHeader('
		<div style="text-align: left; font-weight: bold;">
			<img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height: 50px; width: auto;">
		</div>');
		$mpdf->SetHTMLFooter('
			<div style="padding: 10px 20px; background-color: black; color: white; font-size: 12px;">
			Alamat: '.$site->namaweb.' ('.$site->alamat.')<br>
			Telepon: '.$site->telepon.'
			</div>');
		// Write some HTML code:
		$mpdf->WriteHTML($html);

		// Output tampil nama baru
		$nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$kode_transaksi.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}
	public function delete_transaksi($id_header){
		$data = array('id_header' => $id_header);
		$this->header_transaksi_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/transaksi'),'refresh');
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */