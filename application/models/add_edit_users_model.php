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
	}
 ?>