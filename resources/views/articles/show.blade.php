@extends('app')

@section('content')
	<div class="text-center">
		<a class="article-edit-link" href="{{ route('users.projects.articles.edit', [$user->username, $project->slug, $article->slug]) }}">
			<span class="fa-stack fa-lg">
				<i class="fa fa-square-o fa-stack-2x"></i>
				<i class="fa fa-pencil fa-stack-1x"></i>
			</span>
		</a>
		<h1 class="fancy thin">{{ $article->title }}</h1>
		<p class="faded">Written as part of the
			<strong><u>
				{!! link_to_route('users.projects.show', $project->name, [$user->username, $project->slug]) !!}
			</u></strong> project.
		</p>
	</div>
	<hr />
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				{!! $article->body !!}
			</div>
		</div>
	</div>
@endsection