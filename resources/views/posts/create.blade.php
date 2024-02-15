@extends('layout')

@section ('title')
Post NEW

@endsection

@section ('content')
	<h1>Novy Názor</h1>
	<form name="formPost" method="post" action="/post">
		{{csrf_field()}}
		<div class="divRow100 shadow">	
			<div class="divTitle2">Name</div>
			<input class="newPostInput" type="text" name="name" value="">
		</div>
		<div class="divRow100 shadow">	
			<div class="divTitle2">Title</div>
			<input class="newPostInput" type="text" name="title" value="">
		</div>
		<div class="divRow100 shadow">	
			<div class="divTitle2">Slug</div>
			<input class="newPostInput" type="text" name="slug" value="">
		</div>	
		<div class="divRow250 shadow">	
			<div class="divTitle2">Post</div>
			<textarea class="textArea150" name="description"></textarea>
		</div>
		
		

		
		<div class="divPostButtons">
			<button id="newPost" type="submit">submit</button>
		</div>
		{{--<a href="#" id="filldetails" onclick="addFields()">Fill Details</a>
		<input type="text" id="member" name="member" value="">Number of members: (max. 10)<br />
		--}}
 		<div id="container"/>
		
	</form>



@endsection