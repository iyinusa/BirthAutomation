<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MCountry extends CI_Model {
	 
		public function reg_insert($data) {
			$this->db->insert('bz_country', $data);
			return $this->db->insert_id();
		}
		
		public function query_country() {
			$query = $this->db->order_by('id', 'desc');
			$query = $this->db->get('bz_country');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_country_id($data) {
			$query = $this->db->where('id', $data);
			$query = $this->db->get('bz_country');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function update_country($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('bz_country', $data);
			return $this->db->affected_rows();	
		}
		
		public function delete_country($id) {
			$this->db->where('id', $id);
			$this->db->delete('bz_country');
			return $this->db->affected_rows();
		}
	}