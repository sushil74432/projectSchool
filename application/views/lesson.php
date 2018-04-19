<?php 
    include_once("header.php");
    $chapter= $this->input->get('chapter');
 ?>
     
            <div class="content p-3">
                <h2>Lesson title</h2>

                <div class="embed-responsive embed-responsive-16by9">
                    <!-- <video width="320" height="240" controls>
                        <source src="https://www.youtube.com/watch?v=hzYjE0qJJTY" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> -->
                    <iframe width="320" height="240" src="https://www.youtube.com/embed/egt57g5VXq8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>

                <p class="lead">Short description about the video/lesson</p>

                <div class="options mt-5">
                    <!-- <button type="button" class="btn btn-info btn-lg">Example Solutions</button> -->
                    <a href="<?php echo base_url().'page/test?chapter='.$chapter?>"><button type="button" class="btn btn-info btn-lg">Take a test</button></a>
                </div>
            </div>

<?php include_once("footer.php"); ?>