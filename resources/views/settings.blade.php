@extends('layouts.dashboard')

@section('pageTitle', 'Settings')

@section('links')

	<link rel="stylesheet" href="/css/settings.css">

@endsection

@section ('content')

	<form action="/settings" method="post">
		{!! csrf_field() !!}
		<div class="mainContainer">
			<div>
				<div class="field">
					<div>
						First Name :
					</div>
					<div>
						<input type="text" name="first_name" value="{{$user->first_name}}">
					</div>
				</div>
				<div class="field">
					<div>
						Email :
					</div>
					<div>
						<input type="email" name="email" value="{{$user->email}}">
					</div>
				</div>
			</div>
			<div>
				<div class="field">
					<div>
						Last Name :
					</div>
					<div>
						<input type="text" name="last_name" value="{{$user->last_name}}">
					</div>
				</div>
				<div class="field password">
					<div>
						Password :
					</div>
					<div>
						<a href="/">Change Password</a>
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
					<input type="text" name="street" value="{{$user->street}}">
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
						<input type="text" name="city" value="{{$user->city}}">
					</div>
				</div>
				<div class="field">
					<div>
						State :
					</div>
					<div>
						<input type="text" name="state" value="{{$user->state}}">
					</div>
				</div>
			</div>
			<div>
				<div class="field">
					<div>
						Zip Code :
					</div>
					<div>
						<input type="text" name="zip" value="{{$user->zip}}">
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
<script src="/js/settings.js"></script>

@endsection