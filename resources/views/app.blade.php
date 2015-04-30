<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rungs</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

@yield('head')

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Pacifico|Amatic+SC:400,700|Open+Sans:400,300,600,700,800|Raleway:500,600,700,400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-app">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">Rungs</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<!-- <li><a href="{{ url('/') }}">Dashboard</a></li> -->
					<li><a href="{{ route('users.projects.index', Auth::user()->username) }}">Projects</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/users/') }}/{{Auth::user()->username}}">Your Profile</a></li>
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		@yield('pageHeader')
		<div class="row">
			<div class="col-md-12">
				@if (Session::has('message'))
					<div class="flash alert alert-info" id="success-alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<p>{{ Session::get('message') }}</p>
					</div>
				@endif
				@if ($errors->any())
					<div class="flash alert alert-danger">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						@foreach ( $errors->all() as $error )
							<p>{{ $error }}</p>
						@endforeach
					</div>
				@endif
				@yield('content')
			</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="{{ asset('/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/moment.js') }}"></script>
	<!-- <<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

	<script type="text/javascript">
		$('div.alert').delay(3000).slideUp(300);
	</script>

@yield('footer')

</body>
</html>
