@extends('layout')

@section('title')
- Image {{ $image->getKey() }}
@stop

@section('content')
<img src="{{ Imager::getPublicUri($image, Config::get('imager::filters.image_show')) }}" />
@overwrite