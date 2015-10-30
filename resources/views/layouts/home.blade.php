<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The LineUp - @yield('page_title')</title>
	<link rel="stylesheet" href="css/home.css" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="pageContainer">
		<div>
			<div class ="hero">
				<header>
					@section('title')
					@show
				</header>
				<div>
					@section('heading')
					@show
				</div>
			</div>
		</div>
		<div>
			<div class="signUp">
				@section('signUp')
				@show
			</div>
			<div class="angle"></div>
			<div class="what panel">
				@section('about')
				@show
			</div>
		</div>
	</div>
	<div class="lightbox-tint">
		<div class="lightbox signup">
			@section('lightbox signup')
			@show
		</div>
		<div class="lightbox login">
			@section('lightbox login')
			@show
		</div>
		<div class="lightbox reset">
			@section('lightbox reset')
			@show
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="/js/home.js"></script>
</body>
</html>