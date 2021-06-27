<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Listing all kategori

	public function listing(){

		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Detail User
	public function detail($id_kategori){

		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function kode_otomatis(){
		$this->db->select('right(id_kategori,3) as kode', false);
		$this->db->order_by('id_kategori','desc');
		$this->db->limit(1);
		$query=$this->db->get('kategori');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		} 

		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='KTGR'.$kodemax;

		return $kodejadi;
	}
		// Count table
	public function count()
	{   
    $query = $this->db->get('kategori');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
	// Detail slug kategori
	public function read($slug_kategori){

		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('slug_kategori', $slug_kategori);
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Login kategori
	public function login($kategori,$password){

		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where(array('kategoriname' => $kategoriname,
								'password' => SHA1($password)));
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Tambah
	public function tambah($data){
		$this->db->insert('kategori', $data);
	}
	// Edit
	public function edit($data){
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('kategori', $data);
	}
	// Delete
	public function delete($data){
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('kategori',$data);
	}
}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */