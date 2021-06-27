<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');

	}

	// Halaman registrasi 
	public function index()
	{
			// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Lengkap', "required|min_length[5]|max_length[50]|regex_match[/[a-zA-Z]+$/]", 
				array(	'required'		=> '%s harus diisi',
						'min_length'	=> '%s nama harus lebih dari 5 karakter',
						'max_length'	=> '%s nama harus kurang dari 50 karakter',
						'regex_match'	=> '%s harus diisi huruf'));

		$valid->set_rules('email', 'Email', 'required|valid_email|is_unique[pelanggan.email]', 
				array(	'required'		=> '%s harus diisi',
						'valid_email' 	=> '%s tidak valid',
						'is_unique'		=> '%s Sudah terdaftar'));

		$valid->set_rules('password', 'Password', 'required', 
				array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('telepon', 'Telepon', 'required|numeric|min_length[8]', 
				array(	'required'		=> '%s harus diisi',
						'numeric'		=> '%s harus diisi angka',
						'min_length'	=> '%s harus diisi minimal 8 angka'));

		$valid->set_rules('alamat', 'Alamat', 'required', 
				array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE) {
			// End validasi

			$data = array( 	'title'		=>	'Registrasi Pelanggan',
							'kode_otomatis' => $this->pelanggan_model->kode_otomatis(),
		 					'isi' 		=>	'registrasi/list'
		 				);
		$this->load->view('layout/wrapper', $data, FALSE);
		// Masuk database
	}else {
		$i = $this->input;
		$data = array( 	'id_pelanggan'		=> $i->post('id_pelanggan'),
						'status_pelanggan'	=> 'Baru',
						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
						'email'				=> $i->post('email'),
						'password'			=> SHA1($i->post('password')),
						'telepon'			=> $i->post('telepon'),	
						'alamat'			=> $i->post('alamat'),	
						'tanggal_daftar'	=> date('Y-m-d H:i:s')
					);
		$this->pelanggan_model->tambah($data);




		// End create session
		$this->session->set_flashdata('sukses', 'Registrasi Berhasil');
		redirect(base_url('registrasi/sukses'),'refresh');
		
	} 

}
public function city()
  {
    $prov = $this->input->post('prov', TRUE);

    $curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$prov",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: c1d917a4832808c1778afa2b35f686f9"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
     $data =json_decode($response, TRUE);

    echo '<option value="" selected disabled>--Kota/Kabupaten--</option>'; 

    for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
      echo '<option 
      value="'.$data['rajaongkir']['results'][$i]['city_id'].','.$data['rajaongkir']['results'][$i]['city_name'].'">'.$data['rajaongkir']['results'][$i]['city_name'].'</option>';
     }
  }
}

// Jika sudah registrasi 
public function sukses(){

	$data = array(		'title'		=> 'Registrasi Berhasil',
						'isi'		=> 'registrasi/sukses'
					);
	$this->load->view('layout/wrapper', $data, FALSE);
}
}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */