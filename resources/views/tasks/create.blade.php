@extends('app')

@section('content')
	<h2>Create Task for Project "{{ $project->name }}"</h2>

	{!! Form::model(new App\Task, ['route' => ['users.projects.tasks.store', $user->username, $project->slug], 'class'=>'']) !!}
		@include('tasks/partials/form', ['submit_text' => 'Create Task'])
	{!! Form::close() !!}
@endsection