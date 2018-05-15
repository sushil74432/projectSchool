<?php 
    include_once("header.php");
    $user_id=$this->session->userdata('user_id');
    $is_admin=$this->session->userdata('is_admin');

    if(!$user_id){
      redirect('user/login_view');
    } else if(!$is_admin){
    	echo "<h3><center>YOU DON'T HAVE ACCESS TO THIS PAGE<center></h3>";
    }
?>
<h2>Add Questions</h2>
<div class="content p-3">
    <div>
        <form name="add-questions" id="add-questions" class="add-questions" action="../ajax/add_questions" method="post">   
            <div><b>Select Chapter: </b>
                <select name="chapter" id="chapter" class="chapter">
                    <?php echo $select ?>
                </select>
            </div><hr>
            <div>
                <b>Question:</b><br/> 
                <textarea type="text" name="question" id="question" class="question question-field" rows="3" cols="120" required> </textarea></div><br/>
            <div>
                <b>Question Image: </b>
                <input type="file" name="question-image[]" id="question-image" multiple>
                <br/><br/><hr/>
            </div><br/>
            <div><b>Answer Type(Text or Image): </b>
                <select name = "answer-type" id = "answer-type" class = "answer-type" onchange="adjustOptionType(this)" required>
                    <option value="t">text</option>
                    <option value="i">image</option>
                </select>
                <br/>
            </div><br/>
            
            <!-- Show this block if text answer type is selected -->
            <div class = "text-options">
                <b>Add Options:</b>
                <input type="text" name="text-option-1">
                <input type="text" name="text-option-2">
                <input type="text" name="text-option-3">
                <input type="text" name="text-option-4">
            <br/><br/>
            <b>Correct Option:</b>
                <input type="text" name="corerct-answer-text">
            </div>

            <!-- Show this block if image answer type is selected -->
            <div class = "image-options" style="display:none">
                <b>Select Option Images:</b>
                <input type="file" name="option-image[]" id="option-image" multiple>
                <br/><br/>
                <div><b>Correct Answer(Must be one of the above image):</b>
                    <input type="file" name="correct-answer-image" id="correct-answer-image">
                </div>

            </div><br/><br/>
            <input type="submit" value="Submit" onclick="submitButton()">
            <a href="#" onclick="cancelEdit()">Cancel</a>
        </form>
    </div>
</div>



<script type="text/javascript">
    
    function cancelEdit(){
       if (confirm('All the data you entered will be cleared. Do you want to continue?')) {
            $('#add-questions').trigger("reset");
        }
    }
    function adjustOptionType(sel){
    	var textOptionListClass = ".text-options";
    	var imageOptionListClass = ".image-options";
    	var answer_type = $(".answer-type").val();
    	if(answer_type == 't'){
    		$(imageOptionListClass).css("display", "none");
        	$(textOptionListClass).css("display", "block");
    	}else if(answer_type == 'i'){
    		$(textOptionListClass).css("display", "none");
        	$(imageOptionListClass).css("display", "block");
    	}
    }
   	
    var submitButton= function(id){
    	//console.log(id);
	    $('#add-questions').ajaxForm(function() { 
	        console.log("form-"+id);
	        $.toast({
				text: "Added Successfully",
				bgColor : 'green'
			});
	    });
	};    
</script>

<?php include_once("footer.php"); ?>