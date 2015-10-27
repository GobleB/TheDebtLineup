@extends('layouts.home')

@section('title', 'Home')

@endsection

@section('hero')
	@parent

		<div>
			<div class="nav">
				<div>
					<button class="register">Sign Up</button>
					<button class="signIn">Login</button>
				</div>
			</div>
			<div class="title">
				<h1>The Debt LineUp</h1>
			</div>
			<div class="mainHeading">
				<h2>The road to a stress free financial situation.</h2>
			</div>
			<div class="mainSignUp">
				<button class="register">Get Started Today.</button>
			</div>
		</div>

@endsection

@section('about')
	@parent

		<div class="heading">
			<h3>What is The Debt LineUp?</h3>
		</div>
		<div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto quis porro fugiat possimus, vero eaque non provident inventore nobis veritatis adipisci impedit quas molestiae dolor obcaecati vel quibusdam reprehenderit sapiente!</p>
		</div>

@endsection

@section('lightbox signup')
	@parent

		<div>
			<h3>The Debt LineUp</h3>
		</div>
		<div>
			<form action="/signUp" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label> Email:
					<input type="email" name="email" class="email">
				</label>
				<label> Confirm: 
					<input type="email" name="email2" class="email2">
				</label>
				<label> Password:
					<input type="password" name="password" class="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,15}$">
				</label>
				<label> Confirm:
					<input type="password" name="password2" class="password2" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,15}$">
				</label>
				<div>
					<button>Create</button>
					<a href="" class="cancel">Cancel</a>
				</div>
			</form>
		</div>

@endsection

@section('lightbox login')
	@parent

		<div>
			<h3>The Debt LineUp</h3>
		</div>
		<div>
			<form action="/login" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label> Email:
					<input type="text">
				</label>
				<label> Password:
					<input type="text">
				</label>
				<div>
					<button>Login</button>
					<a href="/" class="cancel">Cancel</a>
				</div>
				<div>
					<a href="/" id="reset">Reset Password</a>
				</div>
			</form>
		</div>


@endsection

@section('lightbox reset')
	@parent

		<div>
			<h3>The Debt LineUp</h3>
		</div>
		<div>
			<form action="/" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label>Enter your email to receive a password reset.
					<input type="email" name="email">
				</label>
				<div>
					<button>Send</button>
					<a href="/" class="cancel">Cancel</a>
				</div>
			</form>
		</div>

@endsection
