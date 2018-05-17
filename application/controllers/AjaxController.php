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
		$this->session->set_flashdata('message', 'Updated Successfully');
		echo $update_users;
    }

    public function ajax_question_edit(){
    	$i=1; $j=1; $k=1;
    	$id = $this->input->post('id', TRUE);
    	$question = $this->input->post('questions', TRUE);
    	$answer_type_code = $this->input->post('answer-type-'.$id, TRUE);
    	if ($answer_type_code == 'i') {
    		$answer_type = 'image';
    	} else if($answer_type_code == 't'){
    		$answer_type = 'text';
    	}
    	$option_text_var = "option-text-".$id;
    	$option_image_var = "option-image-".$id;
    	$options_text_list = array();

    	// Upload question images starts
    	
    	$this->load->helper('url');
	    	$question_image_list = array();
	    	$total = 0;
	    	if(isset($_FILES['question-image-'.$id]['name'])){
				$total = count($_FILES['question-image-'.$id]['name']);
			}
			$timestamp = round(microtime(true));
			for($j=0; $j<$total; $j++) {
			  $temp_file_path = $_FILES['question-image-'.$id]['tmp_name'][$j];
			  if ($temp_file_path != ""){
			  	$file_url = base_url()."uploads/".$timestamp."-".$_FILES['question-image-'.$id]['name'][$j];
			  	array_push($question_image_list, $file_url);
			    $new_file_path = "./uploads/".$timestamp.'-'.$_FILES['question-image-'.$id]['name'][$j];
			    if(move_uploaded_file($temp_file_path, $new_file_path)) {
			      //Handle other code here

			    }
			  }
			}
			$question_images = implode(',', $question_image_list);
			//var_dump($question_image_list);

		// Upload question images ends

    	if($answer_type == "text"){
	    	while($i<=4){
	    		$opt = trim($this->input->post($option_text_var.'['.($i-1).']', TRUE));
	    		array_push($options_text_list, $opt);
	    		$i++;
	    	}
	    	// var_dump($options_text_list);
	    	$answers = implode(',', $options_text_list);
	    	$correct_answer_text = trim($this->input->post('correct-answer-text-'.$id, TRUE));
	    	$correct_answer = $correct_answer_text;
	    	//var_dump($correct_answer_text);
	    }
    	if($answer_type == "image"){
	    	$this->load->helper('url');
	    	$options_image_list = array();
	    	$total = 0;
	    	if (isset($_FILES['option-image-'.$id]['name'])) {
	    		$total = count($_FILES['option-image-'.$id]['name']);
	    	}
			$timestamp = round(microtime(true));
			for($j=0; $j<$total; $j++) {
			  $temp_file_path = $_FILES['option-image-'.$id]['tmp_name'][$j];
			  if ($temp_file_path != ""){
			  	$file_url = base_url()."uploads/".$timestamp."-".$_FILES['option-image-'.$id]['name'][$j];
			  	array_push($options_image_list, $file_url);
			    $new_file_path = "./uploads/".$timestamp.'-'.$_FILES['option-image-'.$id]['name'][$j];
			    if(move_uploaded_file($temp_file_path, $new_file_path)) {
			      //Handle other code here

			    }
			  }
			}
			$answers = implode(',', $options_image_list);
			$correct_answer_image ="";
			if (isset($_FILES['correct-answer-image-'.$id]['name'])) {
				$correct_answer_image = base_url()."uploads/".$timestamp."-".$_FILES['correct-answer-image-'.$id]['name'];
			}
			$correct_answer = $correct_answer_image;
			//var_dump($options_image_list);
			//var_dump($correct_answer_image);
		}
		var_dump($answers);
		$data = array("sn"=>$id, 
					"question"=>$question,
					"question_images" =>$question_images,
					"chapter" =>$this->input->post('chapter'),
					"answers"=>$answers,
					"correct_answer"=>$correct_answer, 
					"answer_type"=>$answer_type_code, 
				);
		$update_question = $this->Ajax_model->update_question($data);
		$this->session->set_flashdata('message', 'Updated Successfully');
		echo $update_question;

		
		
    	// echo ($id." ::::".$question." ::::".$answer_type."::::".$option_image_1_1."::::".$option_image_1_2."::::".$option_image_1_3."::::".$option_image_1_4);
		    	
    }

    public function ajax_question_add(){
    	$question = $this->input->post('question', TRUE);

    	// Upload question logic starts here
    	$this->load->helper('url');
    	$question_image_list = array();
		$total = count($_FILES['question-image']['name']);
		$timestamp = round(microtime(true));
		for($j=0; $j<$total; $j++) {
		  $temp_file_path = $_FILES['question-image']['tmp_name'][$j];
		  if ($temp_file_path != ""){
		  	$file_url = base_url()."uploads/".$timestamp."-".$_FILES['question-image']['name'][$j];
		  	array_push($question_image_list, $file_url);
		    $new_file_path = "./uploads/".$timestamp.'-'.$_FILES['question-image']['name'][$j];
		    move_uploaded_file($temp_file_path, $new_file_path);
		  }
		}
		$question_images = implode(';;;', $question_image_list);
		// Upload question logic ends here
		
		$answer_type = $this->input->post('answer-type', TRUE);    	
    	if ($answer_type == 't') {    		
	    	$option_1 = $this->input->post('text-option-1', TRUE);
	    	$option_2 = $this->input->post('text-option-2', TRUE);
	    	$option_3 = $this->input->post('text-option-3', TRUE);
	    	$option_4 = $this->input->post('text-option-4', TRUE);
	    	$answers = $option_1.";;;".$option_2.";;;".$option_3.";;;".$option_4;
	    	$correct_answer = $this->input->post('corerct-answer-text', TRUE);
    	} else if($answer_type == 'i'){
    		$this->load->helper('url');
	    	$options_image_list = array();
			$total = count($_FILES['option-image']['name']);
			$timestamp = round(microtime(true));
			for($j=0; $j<$total; $j++) {
			  $temp_file_path = $_FILES['option-image']['tmp_name'][$j];
			  if ($temp_file_path != ""){
			  	$file_url = base_url()."uploads/".$timestamp."-".$_FILES['option-image']['name'][$j];
			  	array_push($options_image_list, $file_url);
			    $new_file_path = "./uploads/".$timestamp.'-'.$_FILES['option-image']['name'][$j];
			    move_uploaded_file($temp_file_path, $new_file_path);
			  }
			}
			$answers = implode(';;;', $options_image_list);
			$correct_answer_image = base_url()."uploads/".$timestamp."-".$_FILES['correct-answer-image']['name'];
			$correct_answer = $correct_answer_image;
    	}
    	$data = array("sn"=>NULL, 
					"question"=>$question,
					"question_images" =>$question_images,
					"chapter" =>$this->input->post('chapter',TRUE),
					"answers"=>$answers,
					"correct_answer"=>$correct_answer, 
					"answer_type"=>$answer_type, 
				);
		$update_question = $this->Ajax_model->add_question($data);
		$this->session->set_flashdata('message', 'Updated Successfully');
		echo $update_question;

    }
    public function ajax_user_delete(){
    	$id = $this->input->post('id', TRUE);
    	//var_dump($id);
    	$data = array("id"=>$id);
    	$delete_user = $this->Ajax_model->delete_user($data);
    	echo $delete_user;
    }
    public function ajax_question_delete(){
    	$id = $this->input->post('id', TRUE);
    	//var_dump($id);
    	$data = array("id"=>$id);
    	$delete_question = $this->Ajax_model->delete_question($data);
    	echo $delete_question;
    }

}
 ?>

