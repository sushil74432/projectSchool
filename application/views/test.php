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
    foreach ($query->result() as $row){
        //echo $row->question;
        echo '  <div class="content p-3">
                    <div class="test-block">
                        <p>'.$row->question.'</p>

                        <form>
                            <input type="radio" name="answer" value="Option 1"><span class="mr-5">Option 1</span>
                            <input type="radio" name="answer" value="Option 2"><span class="mr-5">Option 2</span>
                            <input type="radio" name="answer" value="Option 3"><span class="mr-5">Option 3</span>
                            <input type="radio" name="answer" value="Option 4"><span class="mr-5">Option 4</span>
                        </form>
                    </div>
                </div>';
    }
        echo' <div class="options mt-5">
                <button type="button" class="btn btn-info btn-lg">View lesson</button>
                <button type="button" class="btn btn-info btn-lg">View Marks</button>
            </div>';
    ?>
</div>

<?php include_once("footer.php"); ?>