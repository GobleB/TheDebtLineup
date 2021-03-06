<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The LineUp - Dashboard</title>
	<link rel="stylesheet" href="/css/font-awesome.css">
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/dashboard.css" type="text/css">
	@section('links')
	@show
</head>
<body>
	<div class="pageContainer">
		<div>
			<div class="sidebar">
				<div class="welcome">
					<div><img src="/images/{{$user->image_path}}"></div>
					<div><h1><strong>{{$user->first_name}}</strong></h1></div>
				</div>
				<div class="mainViews">
					<div>
						<h3>Main</h3>
					</div>
					<div>
						<h2>
							<a href="/snapshot">
								<div><i class="fa fa-home"></i></div>
								<div>Home</div>
							</a>
						</h2>
					</div>
					<div>
						<h2>
							<a href="/schedule">
								<div><i class="fa fa-calendar"></i></div>
								<div>Schedule</div>
							</a>
						</h2>
					</div>
				</div>
				<div class="edits">
					<div>
						<h3>Admin</h3>
					</div>
					<div>
						<h2>
							<a href="/accounts">
								<div><i class="fa fa-university"></i></div>
								<div>Accounts</div>
							</a>
						</h2>
					</div>
					<div>
						<h2>
							<a href="/budget">
								<div><i class="fa fa-usd"></i></div>
								<div>Budget</div>
							</a>
						</h2>
					</div>
					<div>
						<h2>
							<a href="/settings">
								<div><i class="fa fa-wrench"></i></div>
								<div>Settings</div>
							</a>
						</h2>
					</div>
				</div>
			</div>
			<div class="contentContainer">
				<div>
					<div class="header">
						<a href="/snapshot">
							<div><i class="fa fa-home"></i></div>
						</a>
						<a href="/schedule">
							<div><i class="fa fa-calendar"></i></div>
						</a>
						<a href="/auth/logout">
							<div><i class="fa fa-eject"></i></div>
						</a>
					</div>
				</div>
				<div>
					<h1><strong>@yield('pageTitle')</strong></h1>
				</div>
				<div class="content">
					@section('content')
						@show
				</div>
				<div class="motivation">
					{{-- <h3>Keep On, Keepin On</h3> --}}
					<div>
						<div class="quote">"The pessimist complains about the wind; the optimist expects it to change; the realist adjusts the sails."</div>
						<div class="author">- William Arthur Ward</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="/js/jquery-1.11.3.min.js"></script>
	@section('scripts')
		@show
</body>
</html>