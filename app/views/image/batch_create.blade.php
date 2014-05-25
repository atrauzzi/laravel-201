@extends('layout')

@section('title')
- Submit an Image
@stop

@section('content')

<form method="post" action="{{ URL::route('image.batch_create') }}" id="batch-create">

	<p>Supply each URI you wish to have added here.</p>

	@if(!empty($errors))
	<ul class="errors">
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif

	<ul class="new-uris">

		@foreach(range(0,9) as $key)
		<li>
			<label for="uri-{{ $key }}">URI {{ $key + 1 }}</label>
			<input
				name="uris[]"
				id="uri-{{ $key }}"
				type="text"
				value="{{ !empty($data) ? $data->get('uris')[$key] : null }}"
				placeholder="http://goo.gl/XhqYpv"
			/>
		</li>
		@endforeach

	</ul>

</form>
@overwrite

@section('menu')
	<li>
		<a href="javascript:document.getElementById('batch-create').submit();">Save</a>
	</li>
@append