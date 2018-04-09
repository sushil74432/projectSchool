<?php 
   class PageController extends CI_Controller {

   	function __construct()
	{
	    parent::__construct();
      $this->load->model('add_edit_users_model');
	}
   	
   	public function index() { 
        $this->load->view('welcome_page.php');
    }

   	public function lessons(){
   		$this->load->view('lessons.php');	
   	}

   	public function lesson(){
   		$this->load->view('lesson.php');	
   	}

   	public function test(){
   		$this->load->view('test.php');	
   	}
    public function admin(){
      $this->load->view('admin_access.php');  
    }
    public function ae_users(){
      $this->load->view('add_edit_users.php');  
    }
    public function ae_questions(){
      $this->load->view('add_edit_questions.php');  
    }


   } 
?>