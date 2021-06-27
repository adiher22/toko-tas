<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Listing all bukutamu

	public function listing(){

		$this->db->select('*');
		$this->db->from('bukutamu');
		$this->db->order_by('id_bukutamu', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	// Detail User
	public function detail($id_bukutamu){

		$this->db->select('*');
		$this->db->from('bukutamu');
		$this->db->where('id_bukutamu', $id_bukutamu);
		$this->db->order_by('id_bukutamu', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Login bukutamu
	public function login($bukutamu,$password){

		$this->db->select('*');
		$this->db->from('bukutamu');
		$this->db->where(array('bukutamuname' => $bukutamuname,
								'password' => SHA1($password)));
		$this->db->order_by('id_bukutamu', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// Tambah
	public function tambah($data){
		$this->db->insert('bukutamu', $data);
	}
	// Edit
	public function edit($data){
		$this->db->where('id_bukutamu', $data['id_bukutamu']);
		$this->db->update('bukutamu', $data);
	}
	// Delete
	public function delete($data){
		$this->db->where('id_bukutamu', $data['id_bukutamu']);
		$this->db->delete('bukutamu',$data);
	}
}

/* End of file Rekening_model.php */
/* Location: ./application/models/Rekening_model.php */