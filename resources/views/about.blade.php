@extends('layout')

@section('title')
	about
@endsection

@section('content')
<h1>about</h1>

	@foreach ($comments as $comment)
		this is first: {{$comment}}<br>
	@endforeach

@endsection

