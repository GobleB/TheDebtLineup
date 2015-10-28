<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The LineUp - @yield('title')</title>
	<link rel="stylesheet" href="css/home.css" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Arvo:100,400,400italic,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="background-image"></div>
	<div class="pageContainer">
		<div>
			<div class="hero">
				@section('hero')
				@show
			</div>

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