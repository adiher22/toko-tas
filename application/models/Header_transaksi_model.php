<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Listing all header_transaksi

	public function listing(){

		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		// End Join
		$this->db->group_by('header_transaksi.id_header');
		$this->db->order_by('id_header', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// List dari Pelanggan
	public function pelanggan($id_pelanggan){

		$this->db->select('header_transaksi.*,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		$this->db->where('header_transaksi.id_pelanggan', $id_pelanggan);
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		// End Join
		$this->db->group_by('header_transaksi.id_header');
		$this->db->order_by('id_header', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Detail Transaksi
	public function kode_transaksi($kode_transaksi){

		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							rekening.nama_bank AS bank,
							rekening.nomor_rekening,
							rekening.nama_pemilik,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('rekening', 'rekening.id_rekening = header_transaksi.id_rekening', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		// End Join
		$this->db->group_by('header_transaksi.id_header');
		$this->db->where('transaksi.kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_header', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Detail User
	public function detail($id_header){

		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_header', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function grafikchart($bulan)
    {
        $this->db->like('kode_transaksi', $bulan, 'after');
        return count($this->db->get('header_transaksi')->result_array());
    }
		// Count table
	public function count()
	{   
    $query = $this->db->get('header_transaksi');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
	public function chartPenjualan($bulan)
    {
        $like = 'TRK' . date('y') . $bulan;
        $this->db->like('id_header', $like, 'after');
        return count($this->db->get('header_transaksi')->result_array());
    }
	public function report($where = '')
	{
		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		// End Join
		$this->db->where($where);
		$this->db->group_by('header_transaksi.id_header');
		return $this->db->get();
		
	}
	// Status
	public function status(){

		$this->db->select('*');
		$this->db->from('slider');
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result;
	}

	// Tambah
	public function tambah($data){
		$this->db->insert('header_transaksi', $data);
	}
	// Edit
	public function edit($data){
		$this->db->where('id_header', $data['id_header']);
		$this->db->update('header_transaksi', $data);
	}
	// Delete
	public function delete($data){
		$this->db->where('id_header', $data['id_header']);
		$this->db->delete('header_transaksi',$data);
	}
}

/* End of file Header_transaksi_model.php */
/* Location: ./application/models/Header_transaksi_model.php */