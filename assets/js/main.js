var base_url = $('#base').val();
var region = $('#region').val();
console.log("1");
if (region == "himal") {
	console.log("2");
	$('body').css("background-image", "url(../assets/images/bg-mtn.png)");
	$('body').css("background-size", "contain");
 
} else if (region=="pahad") {
	console.log("3");
	$('body').css("background-image", "url(../assets/images/bg-hly.jpg)");  
} else if (region == "terai"){
	console.log("4");
	$('body').css("background-image", "url(../assets/images/bg-tri.jpg)");  
}


function redirectToTest(div){
	window.location = base_url+'chapter/chapter1';
}

function answer(answer,className,checkClass){
	console.log('called ::'+className);
	className = '.'+className;
	// checkClass = '.'+checkClass;
	if (answer) {
		$(className).siblings().css('background','none');
		$(className).css('background','rgba(0,255,0,0.6)');
		$('.cross'+checkClass).css('display','none');
		$('.check'+checkClass).css('display','inline-block');
	} else {
		$(className).siblings().css('background','none');
		$(className).css('background','rgba(255,0,0,0.6)');
		$('.check'+checkClass).css('display','none');
		$('.cross'+checkClass).css('display','inline-block');
	}
}