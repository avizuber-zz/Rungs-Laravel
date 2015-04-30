@extends('app')

@section('content')
<div class="nl-form-wrapper nl-form-edit">
	<div class="editProjectMenu">
		<a class="white" href="javascript:void(0)" data-toggle="modal" data-target="#editProjectPicture">
			<i class="fa fa-image"></i>
		</a>
	</div>
	{!! Form::model($project, ['method' => 'PATCH', 'class' => 'nl-form', 'id' => 'nl-form', 'route' => ['users.projects.update', Auth::user()->username, $project->slug]]) !!}
		<h3 class="thin black capitalize"><strong>Editing:</strong> {{ $project->name }}</h3>
		@include('projects/partials/form', 
		['buttonClass' => 'btn btn-secondary-invert nl-submit',
		'projectName' => $project->name,
		'projectSlug' => $project->slug, 
		'projectPicture' => $project->picture,
		'projectEndDay' => $project->endDay,
		'pictureField' => 'pictureFieldNoEdits',
		'slugField' => 'slugFieldNoEdits',
		'endDayField' => 'endDayField',
		'selected_days' => $project->days,
		'submit_text' => 'Save Changes'])
	{!! Form::close() !!}
</div>
	<div class="modal fade" id="editProjectPicture" tabindex="-1" role="dialog" aria-labelledby="editProjectPictureLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="editProjectPictureLabel">Choose a new image for <strong class="capitalize">{{ $project->name }}</strong>.</h4>
				</div>
				<div class="modal-body">
					<div id="projectPictureOptions">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" id="selectProjectPicture" class="btn btn-primary" data-dismiss="modal">Select Image</button>
				</div>
			</div>
		</div>
	</div>

@endsection