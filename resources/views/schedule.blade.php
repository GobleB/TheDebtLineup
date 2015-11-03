@extends('layouts.dashboard')

@section('pageTitle', 'Payment Schedule')

@section('links')
	
	<link rel="stylesheet" href="/css/schedule.css" type="text/css">

@endsection

@section ('content')

	<div class="scheduleContainer">
		<div>
			<div class="heading">
				<h2>November Payments</h2>
				<h3>Make the below payments on the account due dates</h3>
			</div>
			<table>
				<tr>
					<td>Account Name</td>
					<td>Payment Amount</td>
				</tr>
				@foreach($accounts as $account)
				<tr>
					<td>{{$account->name}}</td>
					<td>{{$account->min_payment}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>

@endsection