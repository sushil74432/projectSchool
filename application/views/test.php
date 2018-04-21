<?php 
    include_once("header.php");
    $user_id=$this->session->userdata('user_id');
    if(!$user_id){
      redirect('user/login_view');
    }

    if($_GET['chapter'] != "undefined")
    $chapter = $_GET['chapter'];
    
    $query = $this->db->get_where('test_details',array('chapter'=>$chapter));    
?>
    <h2>Test title</h2>
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
        $option_list_array = explode(",", $option_list);
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
                <button type="button" class="btn btn-info btn-lg" Onclick = "checkAnswer();">Get Result</button>
                <a href = "'.base_url().'page/lesson?chapter='.$chapter.'"><button type="button" class="btn btn-info btn-lg">View lesson</button></a>
            </div>';
    ?>
</div>


<!-- <div class="modal fade" id="marksheet" tabindex="-1" role="dialog" aria-labelledby="marksheetLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="marksheetLabel">Your marksheet for this test...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                    
                <script type="text/javascript">
                    function checkAnswer(){
                        var total_correct_answer = 0;
                        var total_wrong_answer = 0;
                        $('.test-block').each(function(){
                            var answer = $(this).find('input[name="answer"]:checked').val();
                            if(answer == 1){
                                total_correct_answer += 1
                                <!-- $(this).css("background-color","#b0c4de");
                                $(this).addClass("alert-success");
                            } else {
                                total_wrong_answer += 1;
                                <!-- $(this).css("background-color","red");
                                $(this).addClass("alert-danger");
                            }
                        });
                        $("#result").html("<p><b>Correct answers :"+total_correct_answer+"</b></p><p><b>Wrong answers :"+total_wrong_answer+"</b></p>");
                    }
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 -->
<script type="text/javascript">
                    function checkAnswer(){
                        var total_correct_answer = 0;
                        var total_wrong_answer = 0;
                        $('.test-block').each(function(){
                            var answer = $(this).find('input[name="answer"]:checked').val();
                            if(answer == 1){
                                total_correct_answer += 1
                                // $(this).css("background-color","#b0c4de");
                                $(this).removeClass("alert-danger");
                                $(this).addClass("alert-success");
                            } else {
                                total_wrong_answer += 1;
                                // $(this).css("background-color","red");
                                $(this).removeClass("alert-success");
                                $(this).addClass("alert-danger");
                            }
                        });
                        $("#result").html("<p><b>Correct answers :"+total_correct_answer+"</b></p><p><b>Wrong answers :"+total_wrong_answer+"</b></p>");
                    }
                </script>

                


<?php include_once("footer.php"); ?>