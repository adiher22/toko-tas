<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {
public function __construct()
	{
	parent::__construct();
	$this->load->database();
	}
	// Listing
	public function listing()
	{
		$query = $this->db->get('slider');
		return $query->row();
	}
	// Detail
	public function detail(){

		$this->db->select('*');
		$this->db->from('slider');
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result;
	}
	// Edit
	public function edit($data)
	{
		$this->db->where('id_slider', $data['id_slider']);
		$this->db->update('slider', $data);
	}
	// Tambah Slider
	public function tambah_slider($data){
		$this->db->insert('slider', $data);
	}
	// Delete
	public function delete($data){
		$this->db->where('id_slider', $data['id_slider']);
		$this->db->delete('slider',$data);
	}
}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */