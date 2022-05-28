<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MEducation extends CI_Model {
	 
		public function reg_insert($data) {
			$this->db->insert('bz_education', $data);
			return $this->db->insert_id();
		}
		
		public function query_education() {
			$query = $this->db->order_by('id', 'desc');
			$query = $this->db->get('bz_education');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_education_id($data) {
			$query = $this->db->where('id', $data);
			$query = $this->db->get('bz_education');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function update_education($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('bz_education', $data);
			return $this->db->affected_rows();	
		}
		
		public function delete_education($id) {
			$this->db->where('id', $id);
			$this->db->delete('bz_education');
			return $this->db->affected_rows();
		}
	}