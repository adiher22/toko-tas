<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Listing all produk

	public function listing(){

		$this->db->select('produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) AS total_gambar'
							);
		$this->db->from('produk');
		// DB JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Listing home produk

	public function home(){

		$this->db->select('produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) AS total_gambar'
							);
		$this->db->from('produk');
		// DB JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}
	// Read Produk
	public function read($slug_produk){

		$this->db->select('produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) AS total_gambar'
							);
		$this->db->from('produk');
		// DB JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.slug_produk', $slug_produk);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		
		$query = $this->db->get();
		return $query->row();
	}
	// Produk
	public function produk($limit,$start){

		$this->db->select('produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) AS total_gambar'
							);
		$this->db->from('produk');
		// DB JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}
	// Total Produk
	public function total_produk()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}
		// Count table
	public function count()
	{   
    $query = $this->db->get('produk');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
	// Kategori produk
	public function kategori($id_kategori,$limit,$start){

		$this->db->select('produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) AS total_gambar'
							);
		$this->db->from('produk');
		// DB JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}
	public function kode_otomatis(){
		$this->db->select('right(id_produk,3) as kode', false);
		$this->db->order_by('id_produk','desc');
		$this->db->limit(1);
		$query=$this->db->get('produk');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		} 

		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='PRDK'.$kodemax;

		return $kodejadi;
	}
	// Total Kategori
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}
	// Listing kategori
	public function listing_kategori()
	{
		$this->db->select('produk.*,
							users.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) AS total_gambar'
							);
		$this->db->from('produk');
		// DB JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();

	}
	// Detail Produk
	public function detail($id_produk){

		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Detail
	public function get(){

		$this->db->select('*');
		$this->db->from('produk');
		$query_result = $this->db->get();
		$result = $query_result->result_array();
		return $result;
	}
	// Detail Gambar Produk
	public function detail_gambar($id_gambar){

		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Gambar
	public function gambar($id_produk){
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Tambah Gambar
	public function tambah_gambar($data){
		$this->db->insert('gambar', $data);
	}
	
	// Tambah
	public function tambah($data){
		$this->db->insert('produk', $data);
	}
	// Edit
	public function edit($data){
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}
	// Delete
	public function delete($data){
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk',$data);
	}
	// Delete gambar
	public function delete_gambar($data){
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar',$data);
	}
}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */