<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MStillbirth extends CI_Model {
	 
		public function reg_insert($data) {
			$this->db->insert('bz_stillbirth', $data);
			return $this->db->insert_id();
		}
		
		public function query_stillbirth() {
			$query = $this->db->order_by('id', 'desc');
			$query = $this->db->get('bz_stillbirth');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_centre() {
			$query = $this->db->order_by('name', 'asc');
			$query = $this->db->get('bz_centre');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_occur() {
			$query = $this->db->order_by('name', 'asc');
			$query = $this->db->get('bz_occurance');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_state() {
			$query = $this->db->order_by('name', 'asc');
			$query = $this->db->get('bz_state');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_country() {
			$query = $this->db->order_by('name', 'asc');
			$query = $this->db->get('bz_country');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_occupation() {
			$query = $this->db->order_by('name', 'asc');
			$query = $this->db->get('bz_occupation');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_education() {
			$query = $this->db->order_by('name', 'asc');
			$query = $this->db->get('bz_education');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_relation() {
			$query = $this->db->order_by('name', 'asc');
			$query = $this->db->get('bz_relationship');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_stillbirth_id($data) {
			$query = $this->db->where('id', $data);
			$query = $this->db->get('bz_stillbirth');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function count_stillbirth_centre($data) {
			$query = $this->db->where('centre_id', $data);
			$query = $this->db->get('bz_stillbirth');
			return $query->num_rows();
		}
		
		public function update_stillbirth($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('bz_stillbirth', $data);
			return $this->db->affected_rows();	
		}
		
		public function delete_stillbirth($id) {
			$this->db->where('id', $id);
			$this->db->delete('bz_stillbirth');
			return $this->db->affected_rows();
		}
	}