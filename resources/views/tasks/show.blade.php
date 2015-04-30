@extends('app')

@section('content')
	<h2>
		{!! link_to_route('users.projects.show', $project->name, [$user->username, $project->slug]) !!} -
		{{ $task->name }}
	</h2>

	{{ $task->description }}
@endsection