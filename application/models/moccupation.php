<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MOccupation extends CI_Model {
	 
		public function reg_insert($data) {
			$this->db->insert('bz_occupation', $data);
			return $this->db->insert_id();
		}
		
		public function query_occupation() {
			$query = $this->db->order_by('id', 'desc');
			$query = $this->db->get('bz_occupation');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_occupation_id($data) {
			$query = $this->db->where('id', $data);
			$query = $this->db->get('bz_occupation');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function update_occupation($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('bz_occupation', $data);
			return $this->db->affected_rows();	
		}
		
		public function delete_occupation($id) {
			$this->db->where('id', $id);
			$this->db->delete('bz_occupation');
			return $this->db->affected_rows();
		}
	}