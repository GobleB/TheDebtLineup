@extends('layouts.home')

@section('page_title', 'Home')

@endsection

@section('title')

	<div>
		<div class="title">
			<h1>debt<span>lineup</span></h1>
		</div>
		<div class="nav">
			<button class="register">Sign Up</button>
			<button class="signIn">Login</button>
		</div>	
	</div>

@endsection

@section('heading')

		<div class="mainHeading">
			<div>
				<h2>Your path to a stress free financial situation.</h2>
			</div>
		</div>

@endsection

@section('signUp')

	<div>
		<button class="register">SIGN UP</button>
	</div>

@endsection

@section('about')

		<div class="heading">
			<h3>What Is The Debt LineUp</h3>
		</div>
		<div>
			<p>The Debt LineUp is a revolutionary finance app designed to help individuals get out of debt.  By providing the user a precise structure to follow, we make it easy to stick to the program. But most of all, we're making the world a better place.</p>
		</div>

@endsection

@section('lightbox signup')

		<div>
			<h3>The Debt LineUp</h3>
		</div>
		<div>
			<form action="/auth/register" method="post">
				{!! csrf_field() !!}
				<div>
					<input type="email" name="email" value="{{ old('email') }}" class="email" placeholder="Email Address">
				</div>	
				<div>
					<input type="email" name="email_confirmation" class="email2" placeholder="Confirm Address">
				</div>
				<div>
					<input type="password" name="password" class="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,15}$" placeholder="Enter Password">
				</div>
				<div>
					<input type="password" name="password_confirmation" class="password2" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,15}$" placeholder="Confirm Password">
				</div>
				<div>
					<button>Create</button>
					<a href="" class="cancel">Cancel</a>
				</div>
			</form>
		</div>

@endsection

@section('lightbox login')

		<div>
			<h3>The Debt LineUp</h3>
		</div>
		<div>
			<form action="/auth/login" method="post">
				{!! csrf_field() !!}
    			<div>
        			<input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
    			</div>
    			<div>
        			<input type="password" name="password" id="password" placeholder="Password">
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
