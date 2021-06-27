<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Listing all transaksi

	public function listing(){

		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Listing all header 
	public function kode_transaksi($kode_transaksi){

		$this->db->select('transaksi.*,
							produk.nama_produk,
							produk.kode_produk');
		$this->db->from('transaksi');
		// Join dengan produk
		$this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
		// End Join
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function kode_otomatis(){

		 $q = $this->db->query("SELECT MAX(RIGHT(kode_transaksi,4)) AS kd_max FROM transaksi WHERE DATE(tanggal_transaksi)=CURDATE()");
        $kd = "";
        $ket = "TRK";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{

            $kd = "";
        }
        // date_default_timezone_set('Asia/Jakarta');
        return $ket.date('ymd').$kd;

	}
	// Detail User
	public function detail($id_transaksi){

		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
		// Count table
	public function count()
	{   
    $query = $this->db->get('transaksi');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
	// Detail slug transaksi
	public function read($slug_transaksi){

		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('slug_transaksi', $slug_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Login transaksi
	public function login($transaksi,$password){

		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where(array('transaksiname' => $transaksiname,
								'password' => SHA1($password)));
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Tambah
	public function tambah($data){
		$this->db->insert('transaksi', $data);
	}
	// Edit
	public function edit($data){
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi', $data);
	}
	// Delete
	public function delete($data){
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->delete('transaksi',$data);
	}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */