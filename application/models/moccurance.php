<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MOccurance extends CI_Model {
	 
		public function reg_insert($data) {
			$this->db->insert('bz_occurance', $data);
			return $this->db->insert_id();
		}
		
		public function query_occurance() {
			$query = $this->db->order_by('id', 'desc');
			$query = $this->db->get('bz_occurance');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_occurance_id($data) {
			$query = $this->db->where('id', $data);
			$query = $this->db->get('bz_occurance');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function update_occurance($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('bz_occurance', $data);
			return $this->db->affected_rows();	
		}
		
		public function delete_occurance($id) {
			$this->db->where('id', $id);
			$this->db->delete('bz_occurance');
			return $this->db->affected_rows();
		}
	}