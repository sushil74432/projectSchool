<?php 
    include_once("header.php");
    $user_id=$this->session->userdata('user_id');
    $is_admin=$this->session->userdata('is_admin');

    if(!$user_id){
      redirect('user/login_view');
    } else if(!$is_admin){
    	echo "<h3><center>YOU DON'T HAVE ACCESS TO THIS PAGE<center></h3>";
    }
    if($_GET['chapter'] != "")
    $chapter = $_GET['chapter'];
    
    $query = $this->db->get_where('test_details',array('chapter'=>$chapter));    
?>
<h2>Modify Questions</h2><hr>
    <b>Select Chapter : </b>
    <select name="chapter" id="chapter" class="chapter" onChange="selectChapter();">
        <?php echo $select ?>
    </select><hr>
    <?php 
    $question = $query->result();
    foreach ($question as $row){
    	$question_id = $row->sn;
    	$answer_type = $row->answer_type;
    	$option_list = $row->answers;
    	$correct_answer = $row->correct_answer;
    	$selected_text = '';
		$selected_image = '';
		$display_text_options = '';
		$display_image_options = '';
    	if($answer_type == "t") {
    		$selected_text = 'selected';
    		$display_text_options = "style='display:block'";
    		$display_image_options = "style='display:none'";
    	} else if($answer_type == "i") {
    		$selected_image = 'selected';
    		$display_text_options = "style='display:none'";
    		$display_image_options = "style='display:block'";
    	}
        //echo $row->question;
    ?>  
        <div class="content p-3 question-<?php echo $question_id ?>">
            <div class="test-block">
                <p><?php echo $row->question?></p>

                <button class = "btn btn-success" onclick="makeEditable(<?php echo $question_id?>)">Edit</button>&nbsp;&nbsp;&nbsp;
                <button class = "btn btn-danger" onClick = "deleteItem(<?php echo $question_id?>)">Delete</a>
            </div>
        </div>
       <div style="display:none" class="content p-3 editable editable-<?php echo $question_id ?>" id ="editable-<?php echo $question_id ?>">
                    <div class="test-block">
                        <form id = "form-<?php echo $question_id ?>" action="../ajax/edit_questions" method="post">
                        	<input type="hidden" name="id" value = "<?php echo $question_id ?>">
                        	<input type="hidden" name="chapter" value = "<?php echo $row->chapter ?>">
	                        <p><textarea type="text" name="questions" rows="3" cols="120"><?php echo $row->question?></textarea></p>
	                        <p><b>Question Image: </b>
	                        	<input type="file" name="question-image-<?php echo $question_id ?>[]" id="question-image-<?php echo $question_id ?>-1" multiple>
	                        </p>
	                        <p>Answer Type(Text or Image): 
	                        	<select name = "answer-type-<?php echo $question_id?>" data-question-id = "<?php echo $question_id?>" id = "answer-type" class = "answer-type answer-type-<?php echo $question_id?>" onchange="adjustOptionType(this)">
	                        		<option value="t" <?php echo $selected_text?>>text</option>
	                        		<option value="i" <?php echo $selected_image?>>image</option>
	                        	</select>
	                        </p>
	                            <p class= "option-list option-list-text option-list-text-<?php echo $question_id?>" <?php echo $display_text_options ?>><b>Enter Options:&nbsp;&nbsp;&nbsp;</b>
			                        <?php 
								        $option_list_array = explode(",", $option_list);
								        foreach ($option_list_array as $key=>$option) {
								            $key += 1;
								            $value = 0;
								            if($option == $row->correct_answer){
								                $value = 1;
								            }
							        ?>
							        	<input type="text" name="option-text-<?php echo $question_id.'[]' ?>" id="option-text-<?php echo $question_id.'-'.$key ?>" value="<?php echo $option?>">
							        <?php } ?>
							        <span class="correct-option"><br/><b>Correct Answer(Must Be From Option List):</b> 
							        	<input type="text" name="correct-answer-text-<?php echo $question_id?>"  value= "<?php echo $correct_answer?>">
							        </span>
						        </p>
						         <p class= "option-list option-list-image option-list-image-<?php echo $question_id?>" <?php echo $display_image_options ?>>
						        	<b>Select Option Images:</b></br>
						        	<input type="file" name="option-image-<?php echo $question_id ?>[]" id="option-image-<?php echo $question_id ?>-1" multiple>
						        	<br/>
						        	<span><b>Correct Answer(Must be one of the above image):</b>
						        		<input type="file" name="correct-answer-image-<?php echo $question_id ?>" id="correct-answer-image-<?php echo $question_id ?>">
						        	</span>
						        </p>

					         
	                        <input type="submit" value="Submit" onclick="submitButton(<?php echo $question_id ?>)">&nbsp;&nbsp;&nbsp;
	                        <a href = "#" onclick="cancelEdit(<?php echo $question_id ?>)">Cancel</a>&nbsp;&nbsp;&nbsp;
                    	</form>
                    </div>
                </div>
	<?php                
    }
    ?>
</div>

<script type="text/javascript">
    $(".chapter").val('<?php echo $chapter ?>');
    function makeEditable(id){
        var editableQuestionDiv = ".editable-"+id;
        var questionDiv = ".question-"+id;
        $(editableQuestionDiv).css("display", "block");
        $(questionDiv).css("display", "none");
    }
    function cancelEdit(id){
        var editableQuestionDiv = ".editable-"+id;
        var questionDiv = ".question-"+id;
        $(editableQuestionDiv).css("display", "none");
        $(questionDiv).css("display", "block");
    }
    function deleteItem(id){
        console.log("Delete Item Called");
        var id = {'id':id};
        $(document).ready(function() {
            jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "ajax/ajax_delete_question",
            dataType: "json",
            data: id,
            success: function(res) {
                console.log(res);
                if (res){

                    $.toast({
                        text: "Updated Successfully",
                        bgColor : 'green'
                    });
                } 
            }
            });
        });
    }
    function adjustOptionType(sel){
    	var id = sel.dataset.questionId;
    	var textOptionListClass = ".option-list-text-"+id;
    	var imageOptionListClass = ".option-list-image-"+id;
    	var answer_type = $(".answer-type-"+id).val();
    	if(answer_type == 't'){
    		$(imageOptionListClass).css("display", "none");
        	$(textOptionListClass).css("display", "block");
    	}else if(answer_type == 'i'){
    		$(textOptionListClass).css("display", "none");
        	$(imageOptionListClass).css("display", "block");
    	}
    }
    var selectChapter = function(){
        var chapter = $(".chapter").val();
        var url = "<?php echo base_url() ?>page/ae_questions?chapter="+chapter;
        location.replace(url);
    }
    var submitButton= function(id){
    	//console.log(id);
	    $('#form-'+id).ajaxForm(function() { 
	        console.log("form-"+id);
	        $.toast({
				text: "Updated Successfully",
				bgColor : 'green'
			});
	    });
	};    
</script>

<?php include_once("footer.php"); ?>