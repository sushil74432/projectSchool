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
                <div class="p-3 text-center">
                    <img src=<?php echo base_url()."assets/images/".$imageFile?> alt="Teacher" class="img-fluid">
                </div>

                <div class="text-center p-3">
                    <a href="<?php echo base_url().'page/lessons'?>"><button type="button" class="btn btn-primary btn-lg mx-3">Take a lesson</button></a>
                    <!-- <button type="button" class="btn btn-secondary btn-lg mx-3">Take a test</button> -->
                </div>
            </div>

            
<?php include_once("footer.php"); ?>