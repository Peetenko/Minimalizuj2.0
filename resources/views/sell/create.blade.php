@extends('layout')

@section ('title')
Sell NEW

@endsection

@section ('content')
	<h1>Predám</h1>
	<form name="formSale" method="post" enctype="multipart/form-data" action="/sell">
		{{csrf_field()}}
	<div class="divSellCreate">
		<label>Name</label>
		<input class="newPostInput" type="text" name="name" value="">
		<label>Email</label>
		<input class="newPostInput" type="text" name="email" value="">
		<label>Phone</label>
		<input class="newPostInput" type="text" name="phone" value="">
		<label>Title</label>
		<input class="newPostInput" type="text" name="title" value="">
		<label>Post</label>
		<textarea class="newPostInput" name="body"></textarea>
		<label>Cena</label>
		<input class="newPostInput" type="text" name="price" value="">
		<div class="divRow100">
			<label>Image</label>
			<input class="newPostInput" type="file" name="image[]" multiple="multiple" value="">
		</div>
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