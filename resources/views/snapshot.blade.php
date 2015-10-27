@extends('layouts.dashboard')

@section('pageTitle', 'Account Snapshot')

@section('links')
	
	<link rel="stylesheet" href="/css/snapshot.css" type="text/css">

@endsection

@section('content')
	<div class="subContent">
		<div>
			<div>Total Debt as of Today:</div>
			<div> {insert Total Debt}</div>
		</div>
		<div>
			<div>Estimated Payoff Date :</div>
			<div> {Insert Payoff Date}</div>
		</div>
	</div>
	<div class="graphContainer">
		<div>
			<div>Insert Graph here</div>
		</div>
		<div>
			<div>Insert Statistical Data here</div>
		</div>
	</div>
	

@endsection