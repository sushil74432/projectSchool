<?php 
	include_once("header.php"); 
	$user_region = $this->session->userdata('region');
	if ($user_region == "pahad") {
		$imageFile = "teacher-pahad.png";
	} else if ($user_region == "himal") {
		$imageFile = "teacher-himal.png";
	}else if ($user_region == "terai") {
		$imageFile = "teacher-terai.png";
	} else{
		$imageFile = "teacher-nepal.png";
	}
	$user_id=$this->session->userdata('user_id');
    if(!$user_id){
      redirect('user/login_view');
    }

?>
     
            <div class="content">
                <div class="text-center">
                    <!-- <img src=<?php echo base_url()."assets/images/".$imageFile?> alt="Teacher" class="img-fluid"> -->

                    <video autoplay muted id="intoAnim" width="100%">
                    	<source src="<?php echo base_url().'assets/videos/intro_animation.mp4'?>" type="video/mp4">
                    </video>
                </div>

                <div class="text-center p-3">
                    <a href="<?php echo base_url().'page/lessons'?>"><button type="button" class="btn btn-primary btn-lg mx-3">पाठ पढ्नुहोस</button></a>
                    <!-- <button type="button" class="btn btn-secondary btn-lg mx-3">Take a test</button> -->
                </div>
            </div>

            
<?php include_once("footer.php"); ?>