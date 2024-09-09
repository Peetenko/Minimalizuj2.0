@extends('layout')

@section ('title')
Sell NEW

@endsection

@section ('content')
    <div class="divTitle">
	    <h1>Predám</h1>
    </div>
	<form name="formSale" method="post" enctype="multipart/form-data" action="/sell">
		{{csrf_field()}}
        <div class="divRow100 shadow">
            <div class="divTitle2">Name</div>
		    <input class="newPostInput" type="text" name="name" value="">
        </div>
		<div class="divRow100 shadow">
            <div class="divTitle2">Email</div>
		    <input class="newPostInput" type="text" name="email" value="">
        </div>
		<div class="divRow100 shadow">
            <div class="divTitle2">Phone</div>
		    <input class="newPostInput" type="text" name="phone" value="">
        </div>
		<div class="divRow100 shadow">
            <div class="divTitle2">Nadpis</div>
		    <input class="newPostInput" type="text" name="title" value="">
        </div>
		<div class="divRow250 shadow">
            <div class="divTitle2">Popis</div>
		    <textarea class="textArea150" name="body"></textarea>
        </div>
		<div class="divRow100 shadow">
            <div class="divTitle2">Cena</div>
		    <input class="newPostInput" type="text" name="price" value="">
        </div>
		<div class="divRow100 shadow">
            <div class="divTitle2">Fotky</div>
			<input class="newPostInput" type="file" name="image[]" multiple="multiple" value="">
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
