@extends('layout')

@section ('title')
Donate NEW

@endsection

@section ('content')
	<h1>Darujem</h1>
	
		<form name="formDonate" method="post" enctype="multipart/form-data" action="/donate" onsubmit="return fnNewDonation()">
		
			{{csrf_field()}}
			<div class="divRow100 shadow">
				<label>Name</label>
				<input class="newPostInput" type="text" name="name" id="name" value="">
			</div>
			<div class="divRow100 shadow">
				<label>Email</label>
				<input class="newPostInput" type="text" name="email" id="email" value="">
			</div>
			<div class="divRow100 shadow">
				<label>Phone</label>
				<input class="newPostInput" type="text" name="phone" id="phone" value="">
			</div>
			<div class="divRow100 shadow">
				<label>Title</label>
				<input class="newPostInput" type="text" name="title" id="title" value="">
			</div>
			<div class="divRow250 shadow">
				<label>Post</label>
				<textarea class="textArea150" name="body" id="body"></textarea>
			</div>
			<div class="divRow100 shadow">
				<label>Image</label>
				<input class="newPostInput" type="file" name="image[]" multiple="multiple" value="">
			</div>
	
			
			<div class="divPostButtons">
				<button id="newPost" type="submit" onsubmit="return fnNewDonation()">submit</button>
			</div>

	 		
			
		</form>
	



@endsection