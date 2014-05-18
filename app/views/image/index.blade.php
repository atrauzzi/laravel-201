@extends('layout')

@section('content')

	@if($images->count())

	<ul class="images">
		@foreach($images as $image)
		<li>
			@include('image/_tile', ['image' => $image])
		</li>
		@endforeach
	</ul>

	@else

	<p>No images have been submitted yet!</p>

	@endif

@overwrite