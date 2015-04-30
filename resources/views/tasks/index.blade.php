@extends('app')
 
@section('content')
	<h2>Projects</h2>
		
		@if ( !$projects->count() )

			<h2>You have no projects!</h2>

		@else	

			<ul>
				@foreach ($projects as $project)
						<li>
							<a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a>
						</li>
				@endforeach
			</ul>
		@endif
@endsection