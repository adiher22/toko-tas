<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {
	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('slider_model');
	}

	// Konfigurasi Umum
	public function index()
	{
		$konfigurasi        = $this->konfigurasi_model->listing();


			// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb', 'Nama Website', 'required', 
				array(	'required'		=> '%s harus diisi'			
			));

		if($valid->run()===FALSE) {


		$data = array(	'title'			=> 'Konfigurasi Website',	
						'konfigurasi'	=> $konfigurasi,					
						'isi'			=> 'admin/konfigurasi/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
	}else {
		$i 				= $this->input;
		

		$data = array( 	'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
						'namaweb'				=> $i->post('namaweb'),
						'tagline'				=> $i->post('tagline'),
						'email'					=> $i->post('email'),
						'website'				=> $i->post('website'),
						'keywords'				=> $i->post('keywords'),
						'metatext'				=> $i->post('metatext'	),
						'telepon'				=> $i->post('telepon'),
						'alamat'				=> $i->post('alamat'),
						'facebook'				=> $i->post('facebook'),
						'instagram'				=> $i->post('instagram'),
						'deskripsi'				=> $i->post('deskripsi'),
						'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
						
					);
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/konfigurasi'),'refresh');
	}
	}
	// Konfigurasi logo website
	public function logo()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

				// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb', 'Nama Website', 'required', 
				array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) {
			// Check Jika gambar diganti
			if(!empty($_FILES['logo']['name'])) {

		$config['upload_path']   = './assets/upload/image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2500';   // Dalam KB
		$config['max_width']     = '2024';
		$config['max_height']    = '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('logo')){
			


		// End Validasi

		$data = array(	'title'			=> 'Konfigurasi Logo Website',
						'konfigurasi'	=> $konfigurasi,	
						'error'			=> $this->upload->display_errors(),						
						'isi'			=> 'admin/konfigurasi/logo'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
		
		

		$data = array(  'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
						'namaweb'			=> $i->post('namaweb'),
						// Disimpan file gambar
						'logo'				=> $upload_gambar['upload_data']['file_name'],		
					);
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/konfigurasi/logo'),'refresh');
	}}else {
		// Edit logo tanpa ganti logo
		$i = $this->input;
		
		

		$data = array(  'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
						'namaweb'			=> $i->post('namaweb'),
						// Disimpan file gambar
						//'logo'				=> $upload_gambar['upload_data']['file_name'],
					
						
					);
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/konfigurasi/logo'),'refresh');
	}}
	// End masuk database
	$data = array(		'title'			=> 'Konfigurasi Logo Website',
						'konfigurasi'	=> $konfigurasi,			
						'isi'			=> 'admin/konfigurasi/logo'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
}
	// Konfigurasi icon 
	public function icon()
	{
			$konfigurasi = $this->konfigurasi_model->listing();

				// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb', 'Nama Website', 'required', 
				array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) {
			// Check Jika gambar diganti
			if(!empty($_FILES['icon']['name'])) {

		$config['upload_path']   = './assets/upload/image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2500';   // Dalam KB
		$config['max_width']     = '2024';
		$config['max_height']    = '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('icon')){
			


		// End Validasi

		$data = array(	'title'			=> 'Konfigurasi Icon Website',
						'konfigurasi'	=> $konfigurasi,	
						'error'			=> $this->upload->display_errors(),						
						'isi'			=> 'admin/konfigurasi/icon'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
		
		

		$data = array(  'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
						'namaweb'			=> $i->post('namaweb'),
						// Disimpan file gambar
						'icon'				=> $upload_gambar['upload_data']['file_name'],		
					);
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/konfigurasi/icon'),'refresh');
	}}else {
		// Edit logo tanpa ganti logo
		$i = $this->input;
		
		

		$data = array(  'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
						'namaweb'			=> $i->post('namaweb'),
						// Disimpan file gambar
						//'logo'				=> $upload_gambar['upload_data']['file_name'],
					
						
					);
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/konfigurasi/icon'),'refresh');
	}}
	// End masuk database
	$data = array(		'title'			=> 'Konfigurasi Icon Website',
						'konfigurasi'	=> $konfigurasi,			
						'isi'			=> 'admin/konfigurasi/icon'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// Konfigurasi Banner Produk
	public function banner()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

				// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb', 'Nama Website', 'required', 
				array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) {
			// Check Jika gambar diganti
			if(!empty($_FILES['banner']['name'])) {

		$config['upload_path']   = './assets/upload/image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2500';   // Dalam KB
		$config['max_width']     = '2024';
		$config['max_height']    = '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('banner')){
			


		// End Validasi

		$data = array(	'title'			=> 'Konfigurasi Banner Produk',
						'konfigurasi'	=> $konfigurasi,	
						'error'			=> $this->upload->display_errors(),						
						'isi'			=> 'admin/konfigurasi/banner'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
		
		

		$data = array(  'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
						'namaweb'			=> $i->post('namaweb'),
						// Disimpan file gambar
						'banner'				=> $upload_gambar['upload_data']['file_name'],		
					);
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/konfigurasi/banner'),'refresh');
	}}else {
		// Edit logo tanpa ganti logo
		$i = $this->input;
		
		

		$data = array(  'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
						'namaweb'			=> $i->post('namaweb'),
						// Disimpan file gambar
						//'logo'				=> $upload_gambar['upload_data']['file_name'],
					
						
					);
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/konfigurasi/banner'),'refresh');
	}}
	// End masuk database
	$data = array(		'title'			=> 'Konfigurasi Banner Produk',
						'konfigurasi'	=> $konfigurasi,			
						'isi'			=> 'admin/konfigurasi/banner'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// Slider untuk edit
	public function slider()
	{
		$slider = $this->slider_model->detail();
		

				// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('judul_slider', 'Judul Slider', 'required', 
				array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) {
			// Check Jika gambar diganti
			if(!empty($_FILES['gambar']['name'])) {

		$config['upload_path']   = './assets/upload/image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2500';   // Dalam KB
		$config['max_width']     = '2024';
		$config['max_height']    = '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			


		// End Validasi

		$data = array(	'title'			=> 'Konfigurasi Slider',
						'slider'		=> $slider,	
						'error'			=> $this->upload->display_errors(),			
						'isi'			=> 'admin/konfigurasi/slider'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
		
		

		$data = array(  'id_slider'			=> $slider->id_slider,
						'judul_slider'		=> $i->post('judul_slider'),
						// Disimpan file gambar
						'gambar'				=> $upload_gambar['upload_data']['file_name']		
					);
		$this->slider_model->tambah_slider($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/konfigurasi/slider'),'refresh');
	}}else {
		// Edit logo tanpa ganti logo
		$i = $this->input;
		
		$data = array(  'id_slider'				=> $slider->id_slider,
						'judul_slider'			=> $i->post('judul_slider'),
						// Disimpan file gambar
						//'logo'				=> $upload_gambar['upload_data']['file_name'],
					
						
					);
		$this->slider_model->tambah_slider($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/konfigurasi/slider'),'refresh');
	}}
	// End masuk database
	$data = array(		'title'			=> 'Konfigurasi Slider',
						'slider'		=>  $slider,			
						'isi'			=> 'admin/konfigurasi/slider'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// Delete Slider
	public function delete_slider($id_slider){

		// Proses hapus gambar 
		$slider = $this->slider_model->listing();
		unlink('./assets/upload/image/'.$slider->gambar);
		unlink('./assets/upload/image/thumbs/'.$slider->gambar);
		// End Proses hapus
		$data = array('id_slider' => $id_slider);
		$this->slider_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/konfigurasi/slider'),'refresh');
	}
}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */