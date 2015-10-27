@extends('layouts.dashboard')

@section('pageTitle', 'Settings')

@section('links')

	<link rel="stylesheet" href="/css/settings.css">

@endsection

@section ('content')

	<form action="/" method="post">
		<div class="mainContainer">
			<div>
				<div class="field">
					<div>
						First Name :
					</div>
					<div>
						<input type="text">
					</div>
				</div>
				<div class="field">
					<div>
						Email :
					</div>
					<div>
						<input type="email">
					</div>
				</div>
			</div>
			<div>
				<div class="field">
					<div>
						Last Name :
					</div>
					<div>
						<input type="text">
					</div>
				</div>
				<div class="field">
					<div>
						Password :
					</div>
					<div>
						<input type="password">
					</div>
				</div>
			</div>
		</div>
		<div class="optional">
			<div>OPTIONAL (Used for statistical information only)</div>
		</div>
		<div class="streetContainer">
			<div>
				<div>
					Street Address :
				</div>
				<div>
					<input type="text">
				</div>
			</div>
		</div>
		<div class="additionalContainer">
			<div>
				<div class="field">
					<div>
						City :
					</div>
					<div>
						<input type="text">
					</div>
				</div>
				<div class="field">
					<div>
						State :
					</div>
					<div>
						<input type="text">
					</div>
				</div>
			</div>
			<div>
				<div class="field">
					<div>
						Zip Code :
					</div>
					<div>
						<input type="text">
					</div>
				</div>
				<div class="field">
					<div>Age Group :</div>
					<div>
						<select name="age">
							<option value="1">18-21 years</option>
							<option value="2">21-25 years</option>
							<option value="3">26-30 years</option>
							<option value="4">31-40 years</option>
							<option value="5">40+ years</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class ="save">
			<div>
				<button>Save</button>
			</div>
		</div>
	</form>

@endsection