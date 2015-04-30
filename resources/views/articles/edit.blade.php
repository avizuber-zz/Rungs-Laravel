@extends('app')

@section('content')
<div class="article-form-wrapper">

	{!! Form::model($article, ['method' => 'PATCH', 'route' => ['users.projects.articles.update', $user->username, $project->slug, $article->slug], 'class'=>'article-form']) !!}
		<h3 class="thin black capitalize"><strong>Editing:</strong> {{ $article->title }}</h3>
		<a class="delete-article-link danger" href="javascript:void(0)" data-toggle="modal" data-target="#delete-article">
			<span class="fa-stack fa-lg">
				<i class="fa fa-square-o fa-stack-2x"></i>
				<i class="fa fa-trash fa-stack-1x"></i>
			</span>
		</a>
		@include('articles/partials/form', 
		['buttonClass' => 'btn btn-primary',
		'submit_text' => 'Update Entry',
		'slugField' => 'slugFieldNoEdit',
		'articleTitle' => $article->title,
		'articleBody' => $article->body,
		'articleSlug' => $article->slug])
	{!! Form::close() !!}
</div>
<div class="modal fade" id="delete-article" tabindex="-1" role="dialog" aria-labelledby="delete-article-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="delete-article-label">Are you sure you want to delete <strong class="capitalize">{{ $article->title }}</strong>?</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('users.projects.articles.destroy', Auth::user()->username, $project->slug, $article->slug))) !!}
						<p>You will not be able to undo this action. It will deleted forever and ever and <strong>ever</strong>.</p>
					{!! Form::submit('Yes, delete it.', array('class' => 'btn btn-danger')) !!}
					<button type="button" class="btn btn-default" data-dismiss="modal">No, I want to keep it.</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection