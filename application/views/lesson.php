<?php 
    include_once("header.php");
    $chapter= $this->input->get('chapter');
    $data = $this->add_edit_questions_model->get_lesson_video_url($chapter);
    $video_url = $data['video_url'];
 ?>
     
            <div class="content p-3">
                <h2>Lesson title</h2>

                <div class="embed-responsive embed-responsive-16by9">
                    <!-- <video width="320" height="240" controls>
                        <source src="https://www.youtube.com/watch?v=hzYjE0qJJTY" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> -->
                    <iframe width="320" height="240" src="<?php echo $video_url ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>

                <p class="lead"></p>

                <div class="options mt-5">
                    <!-- <button type="button" class="btn btn-info btn-lg">Example Solutions</button> -->
                    <a href="<?php echo base_url().'page/test?chapter='.$chapter?>"><button type="button" class="btn btn-info btn-lg">परीक्षा दिनुहोस</button></a>
                </div>
            </div>

<?php include_once("footer.php"); ?>