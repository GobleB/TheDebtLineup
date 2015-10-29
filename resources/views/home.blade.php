@extends('layouts.home')

@section('title', 'Home')

@endsection

@section('hero')
	@parent

		<div>
			<div>
				<div class="nav">
					<div class="title">
						<h1><span>Debt</span>LineUp</h1>
					</div>
					<div>
						<button class="register">Sign Up</button>
						<button class="signIn">Login</button>
					</div>	
				</div>
			</div>

			<div class="mainHeading">
				<h2>The road to a stress free financial situation.</h2>
				<button class="register">Get Started Today.</button>
			</div>
		</div>

@endsection

@section('about')
	@parent

		<div class="heading">
			<h3>What Is The Debt LineUp</h3>
		</div>
		<div>
			<p>The Debt LineUp is a revolutionary finance app designed to help individuals get out of debt.  By providing the user a precise structure to follow, we make it easy to stick to the program. But most of all, we're making the world a better place.</p>
		</div>

@endsection

@section('lightbox signup')
	@parent

		<div>
			<h3>The Debt LineUp</h3>
		</div>
		<div>
			<form action="/auth/register" method="post">
				{!! csrf_field() !!}
				<label> Email:
					<input type="email" name="email" value="{{ old('email') }}" class="email">
				</label>
				<label> Confirm: 
					<input type="email" name="email_confirmation" class="email2">
				</label>
				<label> Password:
					<input type="password" name="password" class="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,15}$">
				</label>
				<label> Confirm:
					<input type="password" name="password_confirmation" class="password2" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,15}$">
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
			<form action="/auth/login" method="post">
				{!! csrf_field() !!}
    			<div>
       				Email
        			<input type="email" name="email" value="{{ old('email') }}">
    			</div>
    			<div>
        			Password
        			<input type="password" name="password" id="password">
    			</div>
				<div>
        			<input type="checkbox" name="remember"> Remember Me
  				</div>	
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
			<form method="post" action="/password/email">
    			{!! csrf_field() !!}
				<label>Enter your email to receive a password reset.
					<input type="email" name="email" value="{{ old('email') }}">
				</label>
				<div>
					<button>Send</button>
					<a href="/" class="cancel">Cancel</a>
				</div>
			</form>
		</div>

@endsection
