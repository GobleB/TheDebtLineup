$(function(){

	$('.save button').on('click', function(e){
		e.preventDefault();
		var mydata = $(this).closest('form').serialize();

		$.ajax ({
			url: '/budget',
			type: 'POST',
			data: mydata,
			success: function(result) {
				console.log('budget saved');

				var expenses = parseInt($('#expenses').val());
				var savings = parseInt($('#savings').val());
				var invest = parseInt($('#invest').val());
				var income = parseInt($('#income').val());

				console.log(income);
				var tExpense = expenses + savings + invest;
				console.log(tExpense);
				var total = income - tExpense;
				console.log(total);
				$('#total').text(total);
				console.log('cash updated');
			}
		})
	});



});