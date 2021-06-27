<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	// Load Model
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('ongkir_model');
		// Halaman di proteksi dengan simple pelanggan
		$this->simple_pelanggan->cek_login();
	}

	// Halaman Dashboard
	public function index()
	{

		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array(		'title'				=> 'Halaman Dashboard Pelanggan',
							'header_transaksi'	=> $header_transaksi,
							'isi'				=> 'dashboard/list' );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	// Belanja
	public function belanja()
	{
		// Ambil data login id_pelanggan dari session 

		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array(		'title'				=> 'Riwayat Belanja',
							'header_transaksi'	=> $header_transaksi,
							'isi'				=> 'dashboard/belanja' );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	// Status diterima
	public function status_diterima($kode_transaksi)
	{
		
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(		'title'				=> 'Update_Status',
							'header_transaksi'	=> $header_transaksi,
							'isi'				=> 'dashboard/list' 
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		$data =  array (	'id_header'		=> $header_transaksi->id_header,
							'status_bayar'	=> 'Diterima' 
						);	

		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data diupdate');
		redirect(base_url('dashboard/belanja'),'refresh');
	}
	// Detail
	public function detail($kode_transaksi)
	{
		$id_pelanggan 	  = $this->session->userdata('id_pelanggan');
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);

		// Pastikan bahwa pelanggan hanya mengakses transaksinya
		if($header_transaksi->id_pelanggan != $id_pelanggan){
			$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain!');
			$this->simple_pelanggan->logout();
			redirect(base_url('masuk'));

		}

		$data = array(		'title'				=> 'Detail Belanja',
							'header_transaksi'	=> $header_transaksi,
							'transaksi'			=> $transaksi,
							'isi'				=> 'dashboard/detail' 
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function profil()
	{
		// Ambil data login id_pelanggan dari session 
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$pelanggan    = $this->pelanggan_model->detail($id_pelanggan);

			// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama lengkap', 'required', 
				array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('alamat', 'Alamat', 'required', 
				array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('telepon', 'Nomor Telepon', 'required', 
				array(	'required'		=> '%s harus diisi'));
		if($valid->run()===FALSE) {
			// End validasi


		$data = array(		'title'		=> 'Profil Saya',
							'pelanggan'	=> $pelanggan,
							'isi'		=> 'dashboard/profil' 
						);
		$this->load->view('layout/wrapper', $data, FALSE);

		// Masuk database
	}else {
		$i = $this->input;
		// Jika password lebih dari 6 maka password diganti 
		if(strlen($i->post('password')) >= 6) {

		$data = array( 	'id_pelanggan'		=> $id_pelanggan,
						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
						'password'			=> SHA1($i->post('password')),
						'telepon'			=> $i->post('telepon'),	
						'alamat'			=> $i->post('alamat')	
						
					);
			}else{
				// Jika passwrod kurang dari 6 maka password tidak diganti 
				$data = array( 	'id_pelanggan'	=> $id_pelanggan,
						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
						'telepon'			=> $i->post('telepon'),	
						'alamat'			=> $i->post('alamat')	
					);
			}
		// End data update
		$this->pelanggan_model->edit($data);
		$this->session->set_flashdata('sukses', 'Update Profil Berhasil');
		redirect(base_url('dashboard/profil'),'refresh');
		
	}
	 //End masuk database 
	}

	public function konfirmasi($kode_transaksi)
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$rekening   =  $this->rekening_model->listing();

		if($header_transaksi->id_pelanggan != $id_pelanggan){
			$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain!');
			$this->simple_pelanggan->logout();
			redirect(base_url('masuk'));

		}
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank', 'Nama Bank', 'required', 
				array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('rekening_pembayaran', 'Nomor Rekening', 'required', 
				array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('rekening_pelanggan', 'Nama Pemilik Rekening', 'required', 
				array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('tanggal_bayar', 'Tanggal Pembayaran', 'required', 
				array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('jumlah_bayar', 'Jumlah Pembayaran', 'required', 
				array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) {
			// Check Jika gambar diganti
			if(!empty($_FILES['bukti_bayar']['name'])) {

		$config['upload_path']   = './assets/upload/image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2500';   // Dalam KB
		$config['max_width']     = '2024';
		$config['max_height']    = '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('bukti_bayar')){
			
		// End Validasi

		$data = array(	'title'				=> 'Konfirmasi Pembayaran',
						'header_transaksi'	=> $header_transaksi,
						'rekening'			=> $rekening,
						'error'				=> $this->upload->display_errors(),		
						'isi'				=> 'dashboard/konfirmasi'
					);
		$this->load->view('layout/wrapper', $data, FALSE);

		// Masuk database
	}else {
		$upload_gambar = array('upload_data' => $this->upload->data());

		// Create thumbnails
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbs
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250; // Pixels
			$config['height']       	= 250; // Pixels
			$config['thumb_marker']		= '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		// End create thumbnails
		$i = $this->input;

		$data = array(	'id_header'				=> $header_transaksi->id_header,
						'status_bayar'			=> 'Konfirmasi',
						'jumlah_bayar'			=> $i->post('jumlah_bayar'),
						'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),	
						'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
						'bukti_bayar'			=> $upload_gambar['upload_data']['file_name'],
						'id_rekening'			=> $i->post('id_rekening'),
						'tanggal_bayar'			=> $i->post('tanggal_bayar'),
						'nama_bank'				=> $i->post('nama_bank')
						
					);
		if($this->upload->data()=="") {
		echo  '<script type="text/javascript">alert("Anda belum mengupload bukti bayar..");</script>';
			redirect(base_url('dashboard'),'refresh');	
		}
		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
		redirect(base_url('dashboard'),'refresh');
	}}else {
		// Edit produk tanpa  ganti gambar
		$i = $this->input;

		$data = array(  'id_header'				=> $header_transaksi->id_header,
						'status_bayar'			=> 'Konfirmasi',
						'jumlah_bayar'			=> $i->post('jumlah_bayar'),
						'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),	
						'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
						// 'bukti_bayar'			=> $upload_gambar['upload_data']['file_name'],
						'id_rekening'			=> $i->post('id_rekening'),
						'tanggal_bayar'			=> $i->post('tanggal_bayar'),
						'nama_bank'				=> $i->post('nama_bank')
						
					);
		// if($upload_gambar['upload_data']['file_name']=="") {
		// echo '<script type="text/javascript">alert("Anda belum mengupload bukti bayar..");</script>';
		// 	redirect(base_url('dashboard'),'refresh');	
		// }
		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
		redirect(base_url('dashboard'),'refresh');
	}
}
		// End masuk database
		$data = array(	'title'				=> 'Konfirmasi Pembayaran',
						'header_transaksi'	=> $header_transaksi,
						'rekening'			=> $rekening,	
						'isi'				=> 'dashboard/konfirmasi'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}	

}
 
/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */