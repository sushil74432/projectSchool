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
    shuffle($question); //randomize the questions appearance
    foreach ($question as $row){
        //echo $row->question;
        echo '  <div class="content p-3">
                    <div class="test-block">
                        <p>'.$row->question.'</p>

                        <form>';
        $option_list = $row->answers;
        $option_list_array = explode(",", $option_list);
        shuffle($option_list_array); //randomize the options
        foreach ($option_list_array as $option) {
            $value = 0;
            if($option == $row->correct_answer){
                $value = 1;
            }
            echo '<input type="radio" name="answer" value="'.$value.'"><span class="mr-5">'.$option.'</span>';
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

<script type="text/javascript">
    function checkAnswer(){
        var total_correct_answer = 0;
        var total_wrong_answer = 0;
        $('.test-block').each(function(){
            var answer = $(this).find('input[name="answer"]:checked').val();
            if(answer == 1){
                total_correct_answer += 1
                $(this).css("background-color","#b0c4de");
            } else {
                total_wrong_answer += 1;
                $(this).css("background-color","red");
            }
        });
        $("#result").html("<p><b>Correct answers :"+total_correct_answer+"</b></p><p><b>Wrong answers :"+total_wrong_answer+"</b></p>");
    }
</script>

<?php include_once("footer.php"); ?>