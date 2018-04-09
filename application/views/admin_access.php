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

<div><a class="nav-link" href=<?php echo base_url()."page/ae_users"?>>Add/Edit Users</a></div>
<div><a class="nav-link" href=<?php echo base_url()."page/ae_questions"?>>Add/Edit Questions</a></div>
