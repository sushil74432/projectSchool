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
	<title>गृह पृष्ठ</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css')?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
</head>
<body>

	<div class=mascot></div>
	<div class="overlay index-overlay">
		<div class="index-title">
			<p><h1>	सजिलो गणित</h1></p>
		</div>
		<div class="index-chapters index-chapter1" onclick="redirectToTest('index-chapter1')">				
			<img src="<?php echo base_url('assets/images/book-icon.png')?>" class="book-ico">
			<div class="chapter-name">पाठ १ - ज्यामिती</div>
		</div>
		<div class="index-chapters index-chapter2" onclick="redirectToTest('index-chapter1')">				
			<img src="<?php echo base_url('assets/images/book-icon.png')?>" class="book-ico">
			<div class="chapter-name">पाठ २ - संख्या को ज्ञान</div>
		</div>
		<div class="index-chapters index-chapter3" onclick="redirectToTest('index-chapter1')">			
		<img src="<?php echo base_url('assets/images/book-icon.png')?>" class="book-ico">
			<div class="chapter-name">पाठ ३ - जोड</div>	
		</div>
		<div class="index-chapters index-chapter4" onclick="redirectToTest('index-chapter1')">			
		<img src="<?php echo base_url('assets/images/book-icon.png')?>" class="book-ico">
			<div class="chapter-name">पाठ ३ - घटाउ</div>	
		</div>
		<div class="index-chapters index-chapter5" onclick="redirectToTest('index-chapter1')">			
		<img src="<?php echo base_url('assets/images/book-icon.png')?>" class="book-ico">
			<div class="chapter-name">पाठ ५ - गुडन</div>	
		</div>
		<div class="index-chapters index-chapter6" onclick="redirectToTest('index-chapter1')">			
		<img src="<?php echo base_url('assets/images/book-icon.png')?>" class="book-ico">
			<div class="chapter-name">पाठ ६ - ज्यामिती</div>	
		</div>
		<div class="index-chapters index-chapter7" onclick="redirectToTest('index-chapter1')"> 			
		<img src="<?php echo base_url('assets/images/book-icon.png')?>" class="book-ico">
			<div class="chapter-name">पाठ ७ - ज्यामिती</div>	
		</div>
		<div class="index-chapters index-chapter8" onclick="redirectToTest('index-chapter1')">			
		<img src="<?php echo base_url('assets/images/book-icon.png')?>" class="book-ico">
			<div class="chapter-name">पाठ ८ - ज्यामिती</div>	
		</div>
		<div class="index-chapters index-chapter9" onclick="redirectToTest('index-chapter1')">			
		<img src="<?php echo base_url('assets/images/book-icon.png')?>" class="book-ico">
			<div class="chapter-name">पाठ ९ - ज्यामिती</div>	
		</div>
		<div class="index-chapters index-chapter10" onclick="redirectToTest('index-chapter1')">		
		<img src="<?php echo base_url('assets/images/book-icon.png')?>" class="book-ico">
			<div class="chapter-name">पाठ १० - ज्यामिती</div>		
		</div>
	</div>
	<input type="hidden" id="base" value="<?php echo base_url(); ?>">
	<input type="hidden" id="region" value="<?php echo $_SESSION['region']; ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/main.js')?>"></script>

</body>
</html>