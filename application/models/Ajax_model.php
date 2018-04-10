<?php 
	class Ajax_model extends CI_model{
		public function update_user($data){
			$this->db->set("user_id","user_name","user_email","user_age","user_roll","region","is_admin",false);
			$this->db->where('user_id',$data['user_id']);
			return $this->db->update('user',$data);

			// return $this->db->replace('user', $data);
		}
	}
 ?>