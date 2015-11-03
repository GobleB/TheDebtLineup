$(function(){

	var source   = $("#new_account_template").html();
	var template = Handlebars.compile(source);

	var source2 = $('#update_account_template').html();
	var template2 = Handlebars.compile(source);

	$('.save').on('click', function(e) {
		e.preventDefault();
		var name = $('#name').val();
		var type = $('#type').val();
		var balance = parseFloat($('#balance').val());
		var min_payment = parseFloat($('#min_payment').val());
		var rate = parseFloat($('#rate').val());
		var mydata = {"name":name, "type":type, "balance":balance, "min_payment":min_payment, "rate":rate};
		$.ajax ({
			url: '/accounts',
			type: 'POST',
			data: mydata,
			success: function(result) {
				console.log('account added');
				var new_tr = template(mydata);
				$(new_tr).insertBefore('.newAccount');
			}
		});
	});

	$('.remove').on('click', function(e) {
		e.preventDefault();
		var name = $(this).parent().siblings('.name').text();
		var mydata = {"name":name};
		console.log(mydata);
		$.ajax ({
			url: '/accounts/delete',
			type: 'POST',
			data: mydata,
			success: function(result) {
				console.log(mydata);
				console.log('account deleted');
			}
		});
		$(this).parent().parent().remove();	
	});

	// $('.update').on('click', function(e) {
	// 	e.preventDefault();
	// 	var name = $(this).parent().siblings('.name').text();
	// 	var type = $(this).parent().siblings('.type').text();
	// 	var balance = parseInt($(this).parent().siblings('.balance').text());
	// 	var min_payment = parseInt($(this).parent().siblings('.min_payment').text());
	// 	var rate = parseInt($(this).parent().siblings('.rate').text());
	// 	var mydata2 = {"name":name, "type":type, "balance":balance, "min_payment":min_payment, "rate":rate};
	// 	var new_tr2 = template2(mydata2);
	// 	var old_tr = $(this).parent().parent();
	// 	$(new_tr2).insertBefore(old_tr);
	// 	$(old_tr).remove();
	// 	// $(this).parent().parent('tr').replaceWith($(new_tr2));
	// 	$(this).parent().siblings('td .save').on('click', function(e) {
	// 		e.preventDefault();
	// 		var name = $('#name').val();
	// 		var type = $('#type').val();
	// 		var balance = parseInt($('#balance').val());
	// 		var min_payment = parseInt($('#min_payment').val());
	// 		var rate = parseInt($('#rate').val());
	// 		var mydata = {"name":name, "type":type, "balance":balance, "min_payment":min_payment, "rate":rate};
	// 		$.ajax ({
	// 			url: '/accounts',
	// 			type: 'POST',
	// 			data: mydata,
	// 			success: function(result) {
	// 				console.log('account added');
	// 				var new_tr = template(mydata);
	// 				$(new_tr).insertBefore('.newAccount');
	// 			}
	// 		});
	// 	});
	// });


});