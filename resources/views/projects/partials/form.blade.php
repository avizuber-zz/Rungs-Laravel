<div class="form-group">
	{!! Form::label('name', 'Name:') !!}
	I want to work on {!! Form::text('name', $projectName, array('id' => 'nameField', 'placeholder' => 'e.g. push-ups')) !!}
</div>
<div class="form-group">
	{!! Form::label('days', 'Days:') !!}
	for the next {!! Form::select('days', array('14' => '14', '30' => '30', '45' => '45'), $selected_days) !!} days.
</div>
<div class="form-group">
	{!! Form::label('slug', 'Slug:') !!}
	{!! Form::text('slug', $projectSlug, array('id' => $slugField,'class' => 'hiddenField')) !!}
</div>
<div class="form-group">
	{!! Form::label('picture', 'Picture:') !!}
	{!! Form::text('picture', $projectPicture, array('id' => $pictureField,'class' => 'hiddenField')) !!}
</div>
<div class="form-group">
	{!! Form::label('endDay', 'End Day:') !!}
	{!! Form::text('endDay', $projectEndDay, array('id' => $endDayField,'class' => 'hiddenField')) !!}
</div>
<div class="form-group nl-submit-wrap">
	{!! Form::submit($submit_text, ['class'=> $buttonClass ]) !!}
	<span class="text-small">or</span> <a class="btn btn-black-invert-danger-trans nl-submit" href="{{ route('users.projects.index', Auth::user()->username) }}">Cancel</a>
</div>

@if ($errors->any())
	<div class='flash alert alert-danger'>
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		@foreach ( $errors->all() as $error )
			<p>{{ $error }}</p>
		@endforeach
	</div>
@endif

@section('footer')
<script type="text/javascript">
	$(document).ready(function () {
		
		$('#days').change(function() {
			var daysToAdd = $('#days').val();
			
			function addDays(theDate, days) {
				
				return new Date(theDate.getTime() + days*24*60*60*1000);
			}

			var endDate = addDays(new Date(), daysToAdd);

			var endYear = endDate.getFullYear();
			var endMonth = ((endDate.getMonth() + 1) < 10 ? '0' : '') + (endDate.getMonth() + 1);
			var endDay = endDate.getDate();
			var endHours = endDate.getHours();
			var endMinutes = endDate.getMinutes();
			var endMinutesDouble = ("0" + endMinutes).slice(-2);
			var endSeconds = endDate.getSeconds();
			var endSecondsDouble = ("0" + endSeconds).slice(-2);

			var endDate = endYear + '-' + endMonth + '-' + endDay + ' ' + endHours + ':' + endMinutesDouble + ':' + endSecondsDouble;
			
			$('#endDayField').val(endDate);

		}).change();

		var randomSlug = "";
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

		for( var i=0; i < 5; i++ )
			
		randomSlug += possible.charAt(Math.floor(Math.random() * possible.length));
		$('#nameField').keyup(function () {
			$('#slugField').val((this.value).replace(/[\.' ;",:-]+/g, '-').toLowerCase() + '-' + randomSlug);
		});
		
		var nlInputs = $('#nameField');

		for(i=0; i<nlInputs.length; i++){
			nlInputs[i].setAttribute('size',nlInputs[i].getAttribute('placeholder').length-1);
		}

		var pictures = [
		'project-image-1.png', 
		'project-image-2.png', 
		'project-image-3.png', 
		'project-image-4.png', 
		'project-image-5.png',
		'project-image-6.png',
		'project-image-7.png'
		];

		$('#pictureField').val(pictures[Math.floor(Math.random() * pictures.length)]);

		var $projectPictureLinks = $("#projectPictureLinks");
		var $projectPictureOptions = $("#projectPictureOptions");

		$.each(pictures, function(i, val) {
			$("<img />").attr(
				{
					src: '../../../../images/project-backgrounds/' + val,
					class: 'projectPictureOptionImg',
					id: 'projectPictureOptionImg'
				}
				).appendTo($projectPictureOptions).wrap('<a class=' + 'editProjectImage' +' href=' + 'javascript:void(0)' + '> </a>');

			$('a').click(function(){
				var imageId = $('img', this).attr('src').substring(39);
				$('a').removeClass('editProjectImageSelected');
        		$(this).addClass('editProjectImageSelected');

        		$('#selectProjectPicture').click(function(){
        			$('#pictureFieldNoEdits').val(imageId);
        		});
			
			});

		});

	});
</script>
@endsection