@extends('app')

@section('content')
<div class="article-form-wrapper">
	
	{!! Form::model(new App\Article, ['route' => ['users.projects.articles.store', $user->username, $project->slug], 'class'=>'article-form']) !!}
		@include('articles/partials/form', 
		['buttonClass' => 'btn btn-primary',
		'submit_text' => 'Publish Entry',
		'slugField' => 'slugField',
		'articleTitle' => '',
		'articleBody' => '',
		'articleSlug' => ''])
	{!! Form::close() !!}

</div>
@endsection