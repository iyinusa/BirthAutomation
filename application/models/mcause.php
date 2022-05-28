<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MCause extends CI_Model {
	 
		public function reg_insert($data) {
			$this->db->insert('bz_cause', $data);
			return $this->db->insert_id();
		}
		
		public function query_cause() {
			$query = $this->db->order_by('id', 'desc');
			$query = $this->db->get('bz_cause');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_cause_id($data) {
			$query = $this->db->where('id', $data);
			$query = $this->db->get('bz_cause');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function update_cause($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('bz_cause', $data);
			return $this->db->affected_rows();	
		}
		
		public function delete_cause($id) {
			$this->db->where('id', $id);
			$this->db->delete('bz_cause');
			return $this->db->affected_rows();
		}
	}