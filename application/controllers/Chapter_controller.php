<?php 
class Chapter_controller extends CI_Controller {

	public function __construct(){

	        parent::__construct();
	  			$this->load->helper('url');
	  	 		$this->load->model('user_model');
	        $this->load->library('session');

	}

	public function index() { 
        echo("hello");
    } 
  
	public function chapter1()
	{	
		//echo "hello";
		$this->load->view('chapter1');
	}
}
 ?>