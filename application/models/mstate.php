<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MState extends CI_Model {
	 
		public function reg_insert($data) {
			$this->db->insert('bz_state', $data);
			return $this->db->insert_id();
		}
		
		public function query_state() {
			$query = $this->db->order_by('id', 'desc');
			$query = $this->db->get('bz_state');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_state_id($data) {
			$query = $this->db->where('id', $data);
			$query = $this->db->get('bz_state');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function update_state($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('bz_state', $data);
			return $this->db->affected_rows();	
		}
		
		public function delete_state($id) {
			$this->db->where('id', $id);
			$this->db->delete('bz_state');
			return $this->db->affected_rows();
		}
	}