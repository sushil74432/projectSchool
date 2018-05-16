<?php 
    include_once("header.php");
    $user_id=$this->session->userdata('user_id');
    if(!$user_id){
      redirect('user/login_view');
    }

    if($_GET['chapter'] != "undefined")
    $chapter = $_GET['chapter'];

    $data = $this->add_edit_questions_model->get_lesson_video_url($chapter);
    $lesson_title = $data['chapter_name'];

    $query = $this->db->get_where('test_details',array('chapter'=>$chapter));    
?>
<h1 class="m-3"><?php echo $lesson_title ?></h1>
    <?php 
    $question = $query->result();
    $answer_type = "";

    shuffle($question); //randomize the questions appearance
    foreach ($question as $row){
        $question_images = $row->question_images;
        $question_images_array = explode(",", $question_images);
        //echo $row->question;
        echo '  <div class="content">
                    <div class="test-block alert" role="alert">
                        <p>'.$row->question.'</p>';
                        if($question_images !="" || $question_images != NULL){
                            foreach ($question_images_array as $image) {
                                echo "<span><img src=".$image."></span>";
                            }
                        }
        echo '<form>';
        $answer_type = $row->answer_type;                        
        $option_list = $row->answers;
        $option_list_array = explode(";;;", $option_list);
        shuffle($option_list_array); //randomize the options
        foreach ($option_list_array as $option) {
            $value = 0;
            if($option == $row->correct_answer){
                $value = 1;
            }
            if($answer_type == 't' || $answer_type == '' || $answer_type == NULL ){
                echo '<input type="radio" name="answer" value="'.$value.'"><span class="mr-5">'.$option.'</span>';
            } else if($answer_type == 'i'){
                echo '<input type="radio" name="answer" value="'.$value.'"><span class="mr-5"><img src="'.$option.'"></span>';
            }
        }
        echo                '</form>
                    </div>
                </div>';
    }
        echo'<div class = "result" id = "result"></div> 
            <div class="options mt-5">
                <button type="button" class="btn btn-info btn-lg" Onclick = "checkAnswer();">नतिजा हेर्नुहोस</button>
                <a href = "'.base_url().'page/lesson?chapter='.$chapter.'"><button type="button" class="btn btn-info btn-lg">पाठ हेर्नुहोस</button></a>
            </div>';
    ?>
</div>



<script type="text/javascript">
                    function checkAnswer(){
                        var total_correct_answer = 0;
                        var total_wrong_answer = 0;
                        $('.test-block').each(function(){
                            var answer = $(this).find('input[name="answer"]:checked').val();
                            if(answer == 1){
                                total_correct_answer += 1
                                $(this).removeClass("alert-danger");
                                $(this).addClass("alert-success");
                            } else {
                                total_wrong_answer += 1;
                                $(this).removeClass("alert-success");
                                $(this).addClass("alert-danger");
                            }
                        });
                        $("#result").html("<p><b>Correct answers :"+total_correct_answer+"</b></p><p><b>Wrong answers :"+total_wrong_answer+"</b></p>");
                    }
                </script>

                


<?php include_once("footer.php"); ?>