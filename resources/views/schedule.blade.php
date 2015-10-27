@extends('layouts.dashboard')

@section('pageTitle', 'Payment Schedule')

@section('links')
	
	<link rel="stylesheet" href="/css/schedule.css" type="text/css">

@endsection

@section ('content')
	
	<div class="options">
		<div>
			<label for="">Snowball</label>
			<input type="radio" name="schedule" value="snowball">
			<div> | </div>
			<label for="">Hybrid</label>
			<input type="radio" name="schedule" value="hybrid">
		</div>
	</div>
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
				{{-- INSERT LOOP FOR EACH ACCOUNT --}}
			</table>
		</div>
	</div>

@endsection