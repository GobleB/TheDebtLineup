$(function(){
	
	$('.cancel').on('click', function(e){
			e.preventDefault();
			$(this).parents().removeClass('display');
	});

	// Registration lightbox items:

	$('.register').on('click', function(e){
		e.preventDefault();
		$('.signup').addClass('display');
		$('.login').removeClass('display');
	});

	// Registration lightbox items:
	$('.signIn').on('click', function(e) {
		e.preventDefault();
		$('.login').addClass('display');
		$('.signup').removeClass('display');
	});

	// Registration lightbox items:
	$('#reset').on('click', function(e){
		e.preventDefault();
		$('.lightbox').removeClass('display');
		$('.reset').addClass('display');
	});

	// Closes all lightboxes:


});