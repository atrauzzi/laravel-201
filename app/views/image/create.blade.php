@extends('layout')

@section('title')
 - Submit an Image
@stop

@section('content')

	<form method="post" action="{{ URL::route('image.store') }}" id="create">
		<p>Provide the URI to an image here and it will be added to the system immediately.</p>

		<ul class="new-uri">
			<li>

				<label for="uri">URI</label>
				<input name="uri" id="uri" type="text" value="{{ $data['uri'] or '' }}" placeholder="http://goo.gl/XhqYpv" />

				@if(isset($data) and $uriMessages = $data->getErrorsFor('uri'))
				<ul class="validation-errors">
					@foreach($uriMessages as $uriMessage)
					<li>{{ $uriMessage }}</li>
					@endforeach
				</ul>
				@endif

			</li>
		</ul>
	</form>

@overwrite

@section('menu')
<li>
	<a href="javascript:document.getElementById('create').submit();">Save</a>
</li>
@append