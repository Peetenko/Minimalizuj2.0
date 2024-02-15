@extends('layout')

@section('title')
	question
@endsection

@section('content')
	<h1>Otázka</h1>
	<div class="divRow">
		<form name="formQuestion" method="post" action="/question/create">
			{{csrf_field()}}
			<label>Name</label>
			<input class="newPostInput" type="text" name="name" value="">
			<label>Title</label>
			<input class="newPostInput" type="text" name="title" value="">
			<label>Otázka</label>
			<textarea class="newPostInput" name="description"></textarea>
			<div class="divPostButtons">
				<button id="newPost" type="submit">Odoslať</button>
			</div>
		</form>
	</div>

@endsection

