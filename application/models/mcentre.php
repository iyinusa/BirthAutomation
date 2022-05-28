<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MCentre extends CI_Model {
	 
		public function reg_insert($data) {
			$this->db->insert('bz_centre', $data);
			return $this->db->insert_id();
		}
		
		public function query_centre() {
			$query = $this->db->order_by('id', 'desc');
			$query = $this->db->get('bz_centre');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_lga() {
			$query = $this->db->order_by('name', 'asc');
			$query = $this->db->get('bz_lga');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_centre_id($data) {
			$query = $this->db->where('id', $data);
			$query = $this->db->get('bz_centre');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function update_centre($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('bz_centre', $data);
			return $this->db->affected_rows();	
		}
		
		public function delete_centre($id) {
			$this->db->where('id', $id);
			$this->db->delete('bz_centre');
			return $this->db->affected_rows();
		}
	}