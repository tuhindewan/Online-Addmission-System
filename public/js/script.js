$(document).ready(function(){
	
	$(".pass").click(function(){
		$(".ifpassed").slideDown();
	});
	$(".fail").click(function(){
		$(".ifpassed").slideUp();
	});
});