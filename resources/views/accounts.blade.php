@extends('layouts.dashboard')

@section('pageTitle', 'Accounts')

@section('links')
	
	<link rel="stylesheet" href="/css/accounts.css" type="text/css">

@endsection

@section ('content')

	<table>
		<tr class="titles">
			<td>Name</td>
			<td>Type</td>
			<td>Balance</td>
			<td>Min. Payment</td>
			<td>Interest Rate</td>
			<td></td>
			<td></td>
		</tr>
		@foreach ($accounts as $account)
			<tr>
				<td class="name">{{$account->name}}</td>
				<td class="type">{{$account->type}}</td>
				<td class="balance">{{$account->balance}}</td>
				<td class="min_payment">{{$account->min_payment}}</td>
				<td class="rate">{{$account->rate}}%</td>
				<td>
					<button class="update"><i class="fa fa-pencil-square-o"></i></button>
				</td>
				<td>
					<button class="remove"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		@endforeach
			<tr class="newAccount">
				<td>
					<input type="text" id="name" class="name" placeholder="ex. Black Card">
				</td>
				<td>
					<select id="type" class="type">
						<option value="mortgage">Home Loan</option>
						<option value="card">Credit Card</option>
						<option value="student">Student Loan</option>
						<option value="auto">Auto Loan</option>
						<option value="other">Other</option>
					</select>
				</td>
				<td>
					<input type="number" id="balance" class="balance" placeholder="ex 5000.00" step="any">
				</td>
				<td>
					<input type="number" id="min_payment" class="min_payment" placeholder="ex 250.00" step="any">
				</td>
				<td>
					<input type="number" id="rate" class="rate" placeholder="ex 12.99" step="any">
				</td>
				<td>
					<button class="save"><i class="fa fa-floppy-o"></i></button>
				</td>
			</tr>		
	</table>

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
	<script src="/js/handlebars-v4.0.4.js"></script>
	<script src="/js/account.js"></script>
	<script id="new_account_template" type="text/x-handlebars-template">
		<tr>
			<td class="name">@{{name}}</td>
			<td class="type">@{{type}}</td>
			<td class="balance">@{{balance}}</td>
			<td class="min_payment">@{{min_payment}}</td>
			<td class="rate">@{{rate}}%</td>
			<td>
				<button class="update"><i class="fa fa-pencil-square-o"></i></button>
			</td>
			<td>
				<button class="remove"><i class="fa fa-trash"></i></button>
			</td>
		</tr>
	</script>
	<script id="update_account_template" type="text/x-handlebars-template">
		<tr class="account_update">
			<td>
				<input type="text" id="name" class="name" value="@{{name}}">
			</td>
			<td>
				<select id="type" class="type">
					<option id="mortgage" value="mortgage">Home Loan</option>
					<option id="card" value="card">Credit Card</option>
					<option id="student" value="student">Student Loan</option>
					<option id="auto" value="auto">Auto Loan</option>
					<option id="other" value="other">Other</option>
				</select>
			</td>
			<td>
				<input type="number" id="balance" class="balance" value="@{{balance}}" step="any">
			</td>
			<td>
				<input type="number" id="min_payment" class="min_payment" value="@{{min_payment}}" step="any">
			</td>
			<td>
				<input type="number" id="rate" class="rate" value="@{{rate}}" step="any">
			</td>
			<td>
				<button class="save"><i class="fa fa-floppy-o"></i></button>
			</td>
		</tr>
	</script>


@endsection