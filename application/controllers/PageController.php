<?php 
   class PageController extends CI_Controller {

   	function __construct()
	{
	    parent::__construct();
      $this->load->model('add_edit_users_model');
      $this->load->model('add_edit_questions_model');
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
      $data = $this->add_edit_questions_model->get_chapters();
      $select_string = "";
      if($data != "" || $data != NULL){
        foreach ($data as $chapter) {
            $select_string .= "<option value='".$chapter->chapter_number."'>".$chapter->chapter_name."</option>";
        }
      }
      $select["select"] = $select_string;
      $this->load->view('add_edit_questions.php',$select); 
    }
    public function add_questions(){
      $data = $this->add_edit_questions_model->get_chapters();
      $select_string = "";
      if($data != "" || $data != NULL){
        foreach ($data as $chapter) {
            $select_string .= "<option value='".$chapter->chapter_number."'>".$chapter->chapter_name."</option>";
        }
      }
      $select["select"] = $select_string;
      $this->load->view('add_questions.php',$select);
    }


   } 
?>