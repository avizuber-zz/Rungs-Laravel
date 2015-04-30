@extends('app')
 
@section('content')

<div class="col-md-4 col-md-offset-4 text-center profile-card">
	<div class="profile-card-header">
		<div class="avatar" title="Your User ID is {{$user->id}}, in case you need to know that.">
			<img src="../images/default-avatar-1.png" alt="Hey, YOU!" />
		</div>
	</div>
	<div class="thin fancy text-center">
		<h3>{{$user->name}}</h3>
	</div>
	<div class="thin clean text-center">
		<p>&#64;{{$user->username}}</p>
	</div>
</div>
<div class="col-md-12">
	<h3 class="text-center thin clean">Profile stats are coming soon. :) </h3>
</div>

@endsection