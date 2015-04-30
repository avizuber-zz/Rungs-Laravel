<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rungs</title>

	<link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">

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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="logo white">Rungs</h1>
				<h3 class="intro white">Reach Your Goals. Form Better Habits.</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4 text-center welcome-buttons">
				<a class="btn btn-primary-invert btn-lg" href="{{ url('/auth/login') }}">Log In</a>
				<i class="fa fa-asterisk white"></i>
				<a class="btn btn-primary btn-lg" href="{{ url('/auth/register') }}">Register</a>
			</div>
		</div>
	</div>
</body>
</html>
