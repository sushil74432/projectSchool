<?php 
class Chapter_controller extends CI_Controller {

	public function __construct(){

	        parent::__construct();
	  			$this->load->helper('url');
	  	 		$this->load->model('user_model');
	        $this->load->library('session');

	}

	public function chapter1()
	{	
		$this->load->view('chapter1');
	}
}
 ?>