<?php
$user_id=$this->session->userdata('user_id');

if(!$user_id){

  redirect('user/login_view');
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>पाठ १</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css')?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
</head>
<body>
	<div class="overlay index-overlay">
		<div class="index-title">
			<p><h1>	पाठ १ - ज्यामिती</h1></p>
		</div>
		<div class="question">				
			<div class="question_text q1" id="q1">१. तल को चित्र मध्ये त्रिकोण कुन हो?</div>
			<div class="answer">
				<img class="answer-images 1-1" src="<?php echo base_url('assets/images/circle.png')?>" onclick="answer(0,'1-1','1')">
				<img class="answer-images 1-2" src="<?php echo base_url('assets/images/triangle.png')?>" onclick="answer(1,'1-2','1')">
				<img class="answer-images 1-3" src="<?php echo base_url('assets/images/square.png')?>" onclick="answer(0,'1-3','1')">
				<img class="answer-images check check1" src="<?php echo base_url('assets/images/check.png')?>">
				<img class="answer-images cross cross1" src="<?php echo base_url('assets/images/cross.png')?>">
			</div>
			<div class="question_text q1" id="q1">२. तल को चित्र मध्ये बर्गाकर कुन हो?</div>
			<div class="answer">
				<img class="answer-images 2-1" src="<?php echo base_url('assets/images/triangle.png')?>" onclick="answer(0,'2-1','2')">
				<img class="answer-images 2-2" src="<?php echo base_url('assets/images/circle.png')?>" onclick="answer(0,'2-2','2')">
				<img class="answer-images 2-3" src="<?php echo base_url('assets/images/square.png')?>" onclick="answer(1,'2-3','2')">
				<img class="answer-images check check2" src="<?php echo base_url('assets/images/check.png')?>">
				<img class="answer-images cross cross2" src="<?php echo base_url('assets/images/cross.png')?>">
			</div>
						<div class="question_text q1" id="q1">३. तल को चित्र मध्ये गोलाकार कुन हो?</div>
			<div class="answer">
				<img class="answer-images 3-1" src="<?php echo base_url('assets/images/triangle.png')?>" onclick="answer(0,'3-1','3')">
				<img class="answer-images 3-2" src="<?php echo base_url('assets/images/circle.png')?>" onclick="answer(1,'3-2','3')">
				<img class="answer-images 3-3" src="<?php echo base_url('assets/images/square.png')?>" onclick="answer(0,'3-3','3')">
				<img class="answer-images check check3" src="<?php echo base_url('assets/images/check.png')?>">
				<img class="answer-images cross cross3" src="<?php echo base_url('assets/images/cross.png')?>">
			</div>
		</div>
	</div>
	<input type="hidden" id="base" value="<?php echo base_url(); ?>">
	<input type="hidden" id="region" value="<?php echo $_SESSION['region']; ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/main.js')?>"></script>
</body>
</html>