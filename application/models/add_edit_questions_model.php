<?php
	class add_edit_questions_model extends CI_model{

		public function get_chapters(){
			$this->db->select('*');
			$this->db->from('chapters');
			if($query=$this->db->get()){
			  	return $query->result();
			}
			else{
				return false;
			}
		}
	}

?>