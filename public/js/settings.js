$(function(){

	$('.save button').on('click', function(e) {
		e.preventDefault();
		var mydata = $(this).closest('form').serialize();
		$.ajax ({
			url: '/settings',
			type: 'POST',
			data: mydata,
			success: function(result) {
				console.log('setting saved');
				new_name = $('#name').val();
				old_name = $('.welcome strong').text();
				console.log(new_name);
				console.log(old_name);
				if(old_name != new_name) {
					$('.welcome strong').text(new_name);
				}
			}
		});
	});

	$('.password a').on('click', function(e) {
		e.preventDefault();
	});
});