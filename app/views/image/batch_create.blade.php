@extends('layout')

@section('title')
- Submit an Image
@stop

@section('content')

<form method="post" action="{{ URL::route('image.batch_create') }}" id="batch-create">
	<fieldset>

		<p>Supply each URI you wish to have added here.</p>

		@if(!empty($errors))
		<ul class="errors">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif

		<ul class="uris">
			@if(!empty($data) && count($data->get('uris')))
			@foreach($data->get('uris') as $key => $uri)
			<li>
				<label for="uri-{{ $key }}">URI {{ $key + 1 }}</label>
				<input
					name="uris[]"
					id="uri-{{ $key }}"
					type="text"
					value="{{ $uri }}"
					placeholder="http://goo.gl/XhqYpv"
				/>
			</li>
			@endforeach
			@else
				<?php $key = -1; ?>
			@endif

			<?php ++$key; ?>
			<li>
				<label for="uri{{ $key }}">URI {{ $key + 1 }}</label>
				<input
					name="uris[]"
					id="uri-{{ $key }}"
					type="text"
					value=""
					placeholder="http://goo.gl/XhqYpv"
				/>
			</li>

		</ul>

	</fieldset>
	<fieldset>

		<button>Save</button>

	</fieldset>
</form>

@overwrite