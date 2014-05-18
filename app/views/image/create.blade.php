@extends('layout')

@section('title')
 - Submit an Image
@stop

@section('content')

	<form method="post" action="{{ URL::route('image.store') }}">
		<fieldset>

			<p>Provide an URI to an image here and it will be added to the system immediately.</p>

			<ul>
				<li>

					<label for="uri">URI</label>
					<input name="uri" id="uri" type="text" value="{{{ $data['uri'] }}}" placeholder="http://goo.gl/XhqYpv" />

					@if($uriMessages = @$data->errors->get('uri'))
						<ul class="validation-errors">
						@foreach($uriMessages as $uriMessage)
							<li>{{ $uriMessage }}</li>
						@endforeach
						</ul>
					@endif

				</li>
			</ul>

		</fieldset>
		<fieldset>

			<button>Save</button>

		</fieldset>
	</form>

@overwrite