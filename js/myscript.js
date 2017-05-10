$(function(){

   // jQuery methods go here...
	$('header').append("<button id='toggleMenu'>Toggle Menu</button>");

	$('#toggleMenu').on('click', function(){
		$('#TOC').toggleClass("invisible");
		$('header h1').toggleClass("invisible");
		$('article').toggleClass("full_width");
		
	});
});