<?php 
	class add_edit_users_model extends CI_model{
		public function get_users(){
			$this->db->select('*');
  			$this->db->from('user');
  			$this->db->order_by('user_id', 'ASC');  
			if($query=$this->db->get()){
			    return $query->result();
			}else{
			    return false;
			}
		}

		public function get_user($user_id){
			$this->db->select('*');
  			$this->db->from('user');
  			$this->db->where('user_id', $user_id);  
			if($query=$this->db->get()){
			    return $query->row_array();
			}else{
			    return false;
			}	
		}
	}
 ?>