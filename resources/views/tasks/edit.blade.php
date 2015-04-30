@extends('app')

@section('content')
	<h2>Edit Task "{{ $task->name }}"</h2>

	{!! Form::model($task, ['method' => 'PATCH', 'route' => ['users.projects.tasks.update', $user->username, $project->slug, $task->slug]]) !!}
		@include('tasks/partials/form', ['submit_text' => 'Edit Task'])
	{!! Form::close() !!}

	{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('users.projects.tasks.destroy', $user->username, $project->slug, $task->slug))) !!}
		{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
	{!! Form::close() !!}

@endsection