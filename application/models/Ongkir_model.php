<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Listing all kategori

	public function listing(){

		$this->db->select('*');
		$this->db->from('ongkir');
		$this->db->order_by('id_ongkir', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get($id_ongkir){

		$this->db->select('*');
		$this->db->from('ongkir');
		$this->db->where('id_ongkir', $id_ongkir);
		$this->db->order_by('id_ongkir', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Detail
	public function detail(){

		$this->db->order_by('kota', 'desc');
		return $this->db->get('ongkir')->result_array();
	}
	
		// Count table
	public function count()
	{   
    $query = $this->db->get('ongkir');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
	
	// Tambah
	public function tambah($data){
		$this->db->insert('ongkir', $data);
	}
	// Edit
	public function edit($data){
		$this->db->where('id_ongkir', $data['id_ongkir']);
		$this->db->update('ongkir', $data);
	}
	// Delete
	public function delete($data){
		$this->db->where('id_ongkir', $data['id_ongkir']);
		$this->db->delete('ongkir',$data);
	}
}

/* End of file Rekening_model.php */
/* Location: ./application/models/Rekening_model.php */