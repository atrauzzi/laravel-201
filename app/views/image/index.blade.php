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

@section('menu')

	@if($images->getCurrentPage() < $images->getLastPage())
	<li><a href="{{ $images->getUrl($images->getCurrentPage() + 1) }}">Next</a></li>
	@endif

	@if($images->getCurrentPage() > 1)
	<li><a href="{{ $images->getUrl($images->getCurrentPage() - 1) }}">Previous</a></li>
	@endif

@append