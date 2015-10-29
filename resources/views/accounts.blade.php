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
		<tr>
			<td>
				<input type="text" name="name">
			</td>
			<td>
				<select name="type">
					<option value="mortgage">Home Loan</option>
					<option value="credit card">Credit Card</option>
					<option value="student loan">Student Loan</option>
					<option value="auto loan">Auto Loan</option>
					<option value="other">Other</option>
				</select>
			</td>
			<td>
				<input type="number" name="balance">
			</td>
			<td>
				<input type="number" name="payment">
			</td>
			<td>
				<input type="number" name="rate">
			</td>

		</tr>
	</table>

@endsection