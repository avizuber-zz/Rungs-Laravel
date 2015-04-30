@section('head')
<link href="{{ asset('/css/medium-editor.css') }}" rel="stylesheet">
<link href="{{ asset('/css/medium-editor-default-theme.css') }}" rel="stylesheet">
@endsection

<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', $articleTitle, array('id' => 'titleField', 'placeholder' => 'Title', 'autocomplete' => 'off')) !!}
</div>

<div class="form-group">
	{!! Form::label('slug', 'Slug:') !!}
	{!! Form::text('slug', $articleSlug, array('id' => $slugField,'class' => 'hiddenField')) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', $articleBody, array('id' => 'bodyField','class' => 'body-editable')) !!}
</div>


<div class="form-group">
	{!! Form::submit($submit_text, ['class'=> $buttonClass, 'id' => 'form-submit' ]) !!}
	<span>or</span> <a class="btn btn-black-invert-danger-trans" href="{{ route('users.projects.show', [Auth::user()->username, $project->slug]) }}">Cancel</a>
</div>

@section('footer')
<script src="{{ asset('/js/medium-editor.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function () {

		var randomSlug = "";
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

		for( var i=0; i < 5; i++ )
			
		randomSlug += possible.charAt(Math.floor(Math.random() * possible.length));
		
		$('#titleField').keyup(function () {
			$('#slugField').val((this.value).replace(/[\.' ;",:-]+/g, '-').toLowerCase() + '-' + randomSlug);
		});

		var bodyEditor = new MediumEditor('.body-editable', {
			buttonLabels: 'fontawesome'
		});

		var articleBody = bodyEditor.serialize();

	});
</script>
@endsection