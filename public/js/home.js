$(function(){
	
	$('.cancel').on('click', function(e){
			e.preventDefault();
			$(this).parents().removeClass('display');
	});

	$('.register').on('click', function(e){
		e.preventDefault();
		$('.signup').addClass('display');
		$('.login').removeClass('display');
	});

	$('.signIn').on('click', function(e) {
		e.preventDefault();
		$('.login').addClass('display');
		$('.signup').removeClass('display');
	});

	$('#reset').on('click', function(e){
		e.preventDefault();
		$('.lightbox').removeClass('display');
		$('.reset').addClass('display');
	});
});