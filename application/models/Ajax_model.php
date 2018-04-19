<?php 
	class Ajax_model extends CI_model{
		public function update_user($data){
			$this->db->set("user_id","user_name","user_email","user_age","user_roll","region","is_admin",false);
			$this->db->where('user_id',$data['user_id']);
			return $this->db->update('user',$data);

			// return $this->db->replace('user', $data);
		}
		public function update_question($data){

			if($data['correct_answer'] != "" || $data['answers'] != ""){
				$this->db->set("sn","question","question_images","chapter","answers","correct_answer","answer_type");
				$this->db->where('sn',$data['sn']);
				return $this->db->update('test_details',$data);
			} else if($data['correct_answer'] == ""){
				$this->db->set("sn","question","question_images","chapter","answers","answer_type");
				$this->db->where('sn',$data['sn']);
				return $this->db->update('test_details',$data);
			}
			else if($data['answers'] == ""){
				$this->db->set("sn","question","question_images","chapter","correct_answer","answer_type");
				$this->db->where('sn',$data['sn']);
				return $this->db->update('test_details',$data);
			}

			// return $this->db->replace('user', $data);
		}

		public function add_question($data){
			return $this->db->insert("test_details",$data);
		}
	}
 ?>