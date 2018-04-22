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
		public function get_lesson_video_url($chapter){
			$this->db->select('*');
			$this->db->from('chapters');
			$this->db->where('chapter_number',$chapter);
			if($query=$this->db->get()){
				return $query->row_array();
			}
			else {
				return false;
			}
		}
	}

?>