<?php 

class AjaxController extends CI_Controller{

	function __construct()	{
	  parent::__construct();
	  $this->load->model('Ajax_model');
	}

	public function ajax_ae_user(){
		$new_user_id = $this->input->post('user_id');
		$new_user_name = $this->input->post('user_name');
		$new_user_email = $this->input->post('user_email');
		$new_user_age = $this->input->post('user_age');
		$new_user_roll = $this->input->post('user_roll');
		$new_region = $this->input->post('region');
		$new_is_admin = $this->input->post('is_admin');

		$data = array("user_id"=>$new_user_id, 
					"user_name"=>$new_user_name,
					"user_email"=>$new_user_email,
					"user_age"=>$new_user_age, 
					"user_roll"=>$new_user_roll, 
					"region"=>$new_region, 
					"is_admin"=>$new_is_admin
				);
		
		$update_users = $this->Ajax_model->update_user($data);

		echo $update_users;
    }

}
 ?>

