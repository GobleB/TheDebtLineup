$(function(){

	var source   = $("#new_account_template").html();
	var template = Handlebars.compile(source);

	$('body').on('click', '.save', function(e) {
		e.preventDefault();
		var name = $(this).parent().siblings().children('#name').val();
		var type = $(this).parent().siblings().children('#type').val();
		var balance = parseFloat($(this).parent().siblings().children('#balance').val());
		var min_payment = parseFloat($(this).parent().siblings().children('#min_payment').val());
		var rate = parseFloat($(this).parent().siblings().children('#rate').val());
		var mydata = {"name":name, "type":type, "balance":balance, "min_payment":min_payment, "rate":rate};
		var parent_tr = $(this).parent().parent();
		$.ajax ({
			url: '/accounts',
			type: 'POST',
			data: mydata,
			success: function(result) {
				console.log('account added');
				var new_tr = template(mydata);
				if (parent_tr.hasClass('account_update')) {
					parent_tr.replaceWith(new_tr);
				} else {
					$(new_tr).insertBefore(parent_tr);
				}	
			}
		});
	});

	$('body').on('click', '.remove', function(e) {
		e.preventDefault();
		var name = $(this).parent().siblings('.name').text();
		var mydata = {"name":name};
		$.ajax ({
			url: '/accounts/delete',
			type: 'POST',
			data: mydata,
			success: function(result) {
				console.log('account deleted');
			}
		});
		$(this).parent().parent().remove();	
	});

	var source2 = $('#update_account_template').html();
	var template2 = Handlebars.compile(source2);

	$('body').on('click', '.update', function(e) {
		e.preventDefault();
		var name = $(this).parent().siblings('.name').text();
		var type = $(this).parent().siblings('.type').text();
		var balance = parseFloat($(this).parent().siblings('.balance').text());
		var min_payment = parseFloat($(this).parent().siblings('.min_payment').text());
		var rate = parseFloat($(this).parent().siblings('.rate').text());
		var mydata2 = {"name":name, "type":type, "balance":balance, "min_payment":min_payment, "rate":rate};
		var new_tr2 = template2(mydata2);
		var old_tr = $(this).closest('tr');
		old_tr.replaceWith(new_tr2);
		if(type == "mortgage") {
			$('#mortgage').prop('selected', 'selected');
		} else if(type == "card") {
			$('#card').prop('selected', 'selected');
		} else if(type == "student") {
			$('#student').prop('selected', 'selected');
		} else if(type == "auto") {
			$('#auto').prop('selected', 'selected');
		} else {
			$('#other').prop('selected', 'selected');
		}
	});
});