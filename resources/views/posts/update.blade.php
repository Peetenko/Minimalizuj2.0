@extends('layout')

@section ('title')
Post Update

@endsection

@section ('content')
	<h1>Edit</h1>
	<form name="formPost" method="POST" action="/post/{{$post->slug}}">
		{{csrf_field()}}
		@method('PUT')
		<label class="padleft10">Name</label>
		<input class="newPostInput" type="text" name="name" value="{{$post->name}}">
		<label class="padleft10">Title</label>
		<input class="newPostInput" type="text" name="title" value="{{$post->title}}">
		<label class="padleft10">Slug</label>
		<input class="newPostInput" type="text" name="slug" value="{{$post->slug}}">
		<label class="padleft10">Post</label>
		<textarea class="newPostInput" name="description" onfocus="fnFocusBorder()">{{$post->description}}</textarea>
		<div class="divPostButtons">
			<button id="newPost" type="submit">submit</button>
 		</div>
		
	</form>



@endsection