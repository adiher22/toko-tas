<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Listing all pelanggan

	public function listing(){

		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Detail User
	public function detail($id_pelanggan){

		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Count table
	public function count()
	{   
    $query = $this->db->get('pelanggan');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
	// Listing
	public function detail_user()
	{
		$query = $this->db->get('pelanggan');
		return $query->row();
	}
	public function kode_otomatis(){
		$this->db->select('right(id_pelanggan,3) as kode', false);
		$this->db->order_by('id_pelanggan','desc');
		$this->db->limit(1);
		$query=$this->db->get('pelanggan');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		} 

		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='PLGN'.$kodemax;

		return $kodejadi;
	}
	// Login User
	public function login($email,$password){

		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array(	'email' 	=> $email,
								'password'	=> SHA1($password)
							));
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Sudah Login
	public function sudah_login($email,$nama_pelanggan){

		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array(	'email' 			=> $email,
								'nama_pelanggan'	=> $nama_pelanggan
							));
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Tambah
	public function tambah($data){
		$this->db->insert('pelanggan', $data);
	}
	// Edit
	public function edit($data){
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('pelanggan', $data);
	}
	// Delete
	public function delete($data){
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('pelanggan',$data);
	}
}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */