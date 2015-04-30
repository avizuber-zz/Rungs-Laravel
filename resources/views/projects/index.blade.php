@extends('app')
 
@section('content')

	@if ( !$projects->count() )
		<div class="text-center">
			<h1 class="fancy faded thin">You do not have any projects yet!</h1>
			<p>Click on the plus sign below to get started.</p>
		</div>
		<div class="popover left create-project-onboarding">
			<div class="arrow"></div>
			<div class="popover-content">
				<span>Click this button to create a project.</span>
		</div>
    </div>
    @else
		<ul class="project-list">
			@foreach( $projects as $project )
				<li class="project-list-item text-center">
					<div class="project-wrapper" style="background-image: url('../../../images/project-backgrounds/{{$project->picture}}')">
						<div>
							<a class="project-title capitalize" href="{{ route('users.projects.show', [Auth::user()->username, $project->slug]) }}">{{ $project->name }}</a>
						</div>
						<div>
							<p class="faded"><span id="daysLeft"> {{ $project->rightNow }} </span>/<span id="totalDays">{{ $project->days }}</span> days to go</p>
						</div>
						<div class="project-buttons">
							<div class="dropdown">
								<button class="btn btn-white-invert-secondary-trans dropdown-toggle type="button" id="{{ $project->id }}" data-toggle="dropdown">
									<i class="fa fa-ellipsis-h"></i>
								</button>
								<ul class="dropdown-menu" role="menu" aria-labelledby="{{ $project->id }}">
									<li>
										<a href="{{ route('users.projects.show', [Auth::user()->username, $project->slug]) }}">
											<i class="fa fa-eye"></i> View
										</a>
									</li>
									<li>
										<a href="{{ route('users.projects.edit', [Auth::user()->username, $project->slug]) }}">
											<i class="fa fa-pencil"></i> Edit
										</a>
									</li>
									<li>
										<a class="danger" href="javascript:void(0)" data-toggle="modal" data-target="#deleteProject-{{ $project->id }}">
											<i class="fa fa-trash"></i> Delete
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>				
				</li>
				<div class="modal fade" id="deleteProject-{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteProjectLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="deleteProjectLabel">Are you sure you want to delete <strong class="capitalize">{{ $project->name }}</strong>?</h4>
							</div>
							<div class="modal-body">
								{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('users.projects.destroy', Auth::user()->username, $project->slug))) !!}
										<p>You will not be able to undo this action. It will deleted forever and ever and <strong>ever</strong>.</p>
									{!! Form::submit('Yes, delete it.', array('class' => 'btn btn-danger')) !!}
									<button type="button" class="btn btn-default" data-dismiss="modal">No, I want to keep it.</button>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</ul>
	@endif

	<div class="mf-bottom-right">
		<a class="btn btn-round btn-primary" href="{{ route('users.projects.create', Auth::user()->username) }}">
			<i class="fa fa-plus"></i>
		</a>
	</div>

@endsection