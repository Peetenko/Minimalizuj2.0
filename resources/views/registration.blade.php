@extends('layout')

@section ('title')
Registration

@endsection

@section ('content')
	<h1>Registracia</h1>
	<div class="divCenter">
		<form name="formDonate" method="post" enctype="multipart/form-data" action="/registration" onsubmit="return fnRegistration()">
		
			{{csrf_field()}}
			<div class="divRow100 shadow">
				<label>Meno</label>
				<input class="newPostInput" type="text" name="name" id="name" value="">
			</div>
			<div class="divRow100 shadow">
				<label>Email</label>
				<input class="newPostInput" type="text" name="email" id="email" value="">
			</div>
			<div class="divRow100 shadow">
				<label>Telefon</label>
				<input class="newPostInput" type="text" name="phone" id="phone" value="">
			</div>
			<div class="divRow100 shadow">
				<label>Adresa</label>
				<input class="newPostInput" type="text" name="address" id="address" value="">
			</div>
			<div class="divRow100 shadow">
				<label>Password</label>
				<input class="newPostInput" type="password" name="password" id="password"></textarea>
			</div>
			<div class="divRow100 shadow">
				<label>Avatar</label>
				<input class="newPostInput" type="file" name="image[]" multiple="multiple" value="">
			</div>
	
			
			<div class="divPostButtons">
				<button id="newPost" type="submit" onsubmit="">submit</button>
			</div>

	 		
			
		</form>
	</div>



@endsection