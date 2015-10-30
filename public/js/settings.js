$(function(){

	$('.save button').on('click', function(e){
		e.preventDefault();
		var mydata = $(this).closest('form').serialize();
		$.ajax ({
			url: '/settings',
			type: 'POST',
			data: mydata,
			success: function(result) {
				console.log('setting saved');
			}
		})
	});



});