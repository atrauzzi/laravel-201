<a href="{{ URL::route('image.show', $image->getKey()) }}">
	<img src="{{ @Imager::getPublicUri($image, Config::get('imager::filters.thumbnail')) }}" />
</a>