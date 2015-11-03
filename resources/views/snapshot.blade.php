
@extends('layouts.dashboard')

@section('pageTitle', 'Account Snapshot')

@section('links')
	
	<link rel="stylesheet" href="/css/snapshot.css" type="text/css">

@endsection

@section('content')
	<div class="subContent">
		<div>
			<div>Total Debt :</div>
			<div>${{$current_balance}}</div>
		</div>
		<div>
			<div>Estimated Payoff Date :</div>
			<div>{{$payoff_date}}</div>
		</div>
	</div>
	<div class="graphContainer">
		<div id="monthly_graph"></div>
		<div id="types_graph"></div>
	</div>

@endsection

@section('scripts')

	<script>
		var type_totals = {!! $type_totals !!};
		var monthly_balance = {!! $monthly_balance !!};

		$(function(){
		$.ajaxSetup({
		   	headers: {
		 	     'X-CSRF-TOKEN': '{!! csrf_token() !!}'
		       }
		   });
		});
	</script>
	<script src="/js/highcharts.js"></script>
	<script src="/js/snapshot.js"></script>

@endsection