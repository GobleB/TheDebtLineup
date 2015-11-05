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
				var tExpense = expenses + savings + invest;
				var total = income - tExpense;
				$('#total').text(total);
				console.log('cash updated');
			}
		})
	});
});