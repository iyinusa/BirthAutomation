<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MRelationship extends CI_Model {
	 
		public function reg_insert($data) {
			$this->db->insert('bz_relationship', $data);
			return $this->db->insert_id();
		}
		
		public function query_relationship() {
			$query = $this->db->order_by('id', 'desc');
			$query = $this->db->get('bz_relationship');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_relationship_id($data) {
			$query = $this->db->where('id', $data);
			$query = $this->db->get('bz_relationship');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function update_relationship($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('bz_relationship', $data);
			return $this->db->affected_rows();	
		}
		
		public function delete_relationship($id) {
			$this->db->where('id', $id);
			$this->db->delete('bz_relationship');
			return $this->db->affected_rows();
		}
	}