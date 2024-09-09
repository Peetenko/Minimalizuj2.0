@extends('layout')

@section ('title')
Discussion NEW

@endsection

@section ('content')
    <div class="divTitle">
	    <h1>Založ diskusiu</h1>
    </div>
	<form name="formPost" method="post" action="{{url('/discussion/create')}}">
		{{csrf_field()}}
		<label>Meno</label>
		<input class="newPostInput" type="text" name="name" value="">
		<label>Nadpis</label>
		<input class="newPostInput" type="text" name="title" value="">
		<label>Slug</label>
		<input class="newPostInput" type="text" name="slug" value="">
		<label>Post</label>
		<textarea class="newPostInput" name="description"></textarea>




		<div class="divPostButtons">
			<button id="newPost" type="submit">submit</button>
		</div>
		{{--<a href="#" id="filldetails" onclick="addFields()">Fill Details</a>
		<input type="text" id="member" name="member" value="">Number of members: (max. 10)<br />
		--}}
 		<div id="container"/>

	</form>



@endsection
