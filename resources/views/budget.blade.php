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
				<input type="number">
			</div>
		</div>
		<div>
			<div>
				<div>Monthly Savings Contribution :</div>
			</div>
			<div>
				<input type="number">
			</div>
		</div>
		<div>
			<div>
				<div>Other Investment Contributions :</div>
			</div>
			<div>
				<input type="number">
			</div>
		</div>
		<div>
			<div>
				<div>Monthly Income (post-taxes) :</div>
			</div>
			<div>
				<input type="number">
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
				<div id="total">$X,XXX.XX</div>
			</div>
		</div>
	</form>

@endsection