@extends('layouts.dashboard')

@section('pageTitle', 'Budget')

@section('links')
	
	<link rel="stylesheet" href="/css/budget.css" type="text/css">

@endsection

@section ('content')

	<form action="">
		<div>
			<div>
				<div>Monthly Expenses (non-debt) :</div>
			</div>
			<div>
				<input type="number" name="expenses" value="{{$budget->expenses}}">
			</div>
		</div>
		<div>
			<div>
				<div>Monthly Savings Contribution :</div>
			</div>
			<div>
				<input type="number" name="savings" value="{{$budget->savings}}">
			</div>
		</div>
		<div>
			<div>
				<div>Other Investment Contributions :</div>
			</div>
			<div>
				<input type="number" name="invest" value="{{$budget->invest}}">
			</div>
		</div>
		<div>
			<div>
				<div>Monthly Income (post-taxes) :</div>
			</div>
			<div>
				<input type="number" name="income" value="{{$budget->income}}">
			</div>
		</div>
		<div class="save">
			<div>
				<button>Save</button>
			</div>		
		</div>
		<div>
			<div>
				<div>Total Monthly Available for Debt :</div>
			</div>
			<div>
				<div id="total">{{$budget->cash}}</div>
			</div>
		</div>
	</form>

@endsection

@section('scripts')


<script>
$(function(){
$.ajaxSetup({
   	headers: {
 	     'X-CSRF-TOKEN': '{!! csrf_token() !!}'
       }
   });
});
</script>
<script src="/js/budget.js"></script>

@endsection