@extends('app')

@section('content')
<div class="nl-form-wrapper">

	{!! Form::model(new App\Project, ['class' => 'nl-form', 'id' => 'nl-form', 'route' => ['users.projects.store']]) !!}
		@include('projects/partials/form', 
		['buttonClass' => 'btn btn-primary-invert nl-submit', 
		'projectName' => '',
		'projectSlug' => '',
		'projectPicture' => '',
		'projectEndDay' => '',
		'slugField' => 'slugField',
		'pictureField' => 'pictureField',
		'endDayField' => 'endDayField',
		'selected_days' => '30', 
		'submit_text' => 'Create Project'])
	{!! Form::close() !!}

</div>

@endsection