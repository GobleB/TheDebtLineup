@extends('layouts.dashboard')

@section('pageTitle', 'Budget')

@section('links')
	
	<link rel="stylesheet" href="/css/budget.css" type="text/css">

@endsection

@section ('content')

	<form action="/" method="post">
		{!! csrf_field() !!}
		<div>
			<div>
				<div>Monthly Expenses (non-debt) :</div>
			</div>
			<div>
				<input type="number" name="expenses" id="expenses" value="{{$budget->expenses}}">
			</div>
		</div>
		<div>
			<div>
				<div>Monthly Savings Contribution :</div>
			</div>
			<div>
				<input type="number" name="savings" id="savings" value="{{$budget->savings}}">
			</div>
		</div>
		<div>
			<div>
				<div>Other Investment Contributions :</div>
			</div>
			<div>
				<input type="number" name="invest" id="invest" value="{{$budget->invest}}">
			</div>
		</div>
		<div>
			<div>
				<div>Monthly Income (post-taxes) :</div>
			</div>
			<div>
				<input type="number" name="income" id="income" value="{{$budget->income}}">
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