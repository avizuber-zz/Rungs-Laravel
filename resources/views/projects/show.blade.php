@extends('app')
 
@section('content')
	
	<div class="project-header" style="background-image: url('../../../images/project-backgrounds/{{$project->picture}}')">

		<div class="project-header-edit-menu">
			<div class="project-buttons">
				<div class="dropdown">
					<button class="btn btn-white-invert-secondary-trans dropdown-toggle type="button" id="{{ $project->id }}" data-toggle="dropdown">
						<i class="fa fa-ellipsis-h"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu" aria-labelledby="{{ $project->id }}">
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

		<div class="text-center">
			<p class="faded kill-margin-bottom"> You're working on </p>
			<h2 class="capitalize clean thin white kill-margin-top">{{ $project->name }}</h2>
			<p class="faded">and have <strong> {{ $rightNow }}</strong> / <strong>{{ $project->days }} </strong> days left. You can do it!</p>
		</div>

		<!-- <div class="white">
			<p>Track your progress:</p>
		</div> -->

	</div>

	<div class="main">
	
	@if ( !$project->articles->count() )
		<div class="text-center">
			<h3 class="clean thin">Did you know you can document your progress by writing journal entries as you go?</h3>
			<p>You have not written any entries for <span class="capitalize strong"><strong>{{ $project->name }}</strong> </span> yet.</p>
			<p>
				<a href="{{ route('users.projects.articles.create', [Auth::user()->username, $project->slug]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Write Your First Entry</a>
			</p>
		</div>
	@else
	<div class="article-toolbar">
			<a href="{{ route('users.projects.articles.create', [Auth::user()->username, $project->slug]) }}" class="btn btn-black-invert-primary-trans"><i class="fa fa-plus"></i> Add Another Entry</a>
	</div>
	<div>
		<ul class="article-list">
			@foreach( $project->articles as $article )
				<li class="article-list-item">
					<a class="article-edit-link" href="{{ route('users.projects.articles.edit', [$user->username, $project->slug, $article->slug]) }}">
						<span class="fa-stack fa-lg">
							<i class="fa fa-square-o fa-stack-2x"></i>
							<i class="fa fa-pencil fa-stack-1x"></i>
						</span>
					</a>
					<h3 class="text-center">
						<a href="{{ route('users.projects.articles.show', [$user->username, $project->slug, $article->slug]) }}" class="article-title">
							{{ $article->title }}
						</a>
					</h3>
					<p class="article-body-blurb">
						{!! str_limit($article->body,150) !!}
						<p>
							<a href="{{ route('users.projects.articles.show', [$user->username, $project->slug, $article->slug]) }}" class="article-readmore">
								Read Entry
							</a>
						</p>
					</p>
				</li>
			@endforeach
		</ul>
	</div>
	@endif


	</div>

@endsection