<?php 
   class PageController extends CI_Controller {

   	function __construct()
	{
	    parent::__construct();
	}
   	
   	public function index() { 
        $this->load->view('welcome_page.php');
    }

   	public function lessons(){
   		$this->load->view('lessons.php');	
   	}

   	public function test(){
   		$this->load->view('test.php');	
   	}


   } 
?>