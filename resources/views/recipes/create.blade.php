@extends('layout')

@section ('title')
	Recepty - Novy recept
@endsection

@section ('content')
	<div class="divTitle">
		<h1>Recepty</h1>
	</div>
	<div class="success h40">
		<span class="success"></span>
	</div>
	<div class="divPostButtons">
		<a href="{{asset('/recipes/create/new')}}" ><button name="divPostButtons" id="newPost">
			<span style="font-size: 18pt;color:#659e26;">+</span><span style="text-align: middle">
		</button> 
		</a><br>
	</div>
	<form name="formRecipe" id="formRecipe" method="post" enctype="multipart/form-data" action="/recipes/create/new" 
	onsubmit="return fnNewRecipe()">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	{{csrf_field()}}
	<div id="createNewRecipe">
		<div class="divRow100 shadow">	
			<div class="divTitle2">
				Nadpis
				<input class="newPostInput" type="text" name="title" id="title" value="">
			</div>
		</div>
		<div class="divRow100 shadow">	
			<div class="divTitle2">
				Ingrediencie
				<input class="newPostInput" type="text" name="searchIngredient" id="searchIngredient" value="" onkeyup="fnAddIngredient()">
			</div>
		</div>
		<div id="divIgredient">

		</div>
		<div class="divRow250 shadow">	
			<div class="divTitle2">
				Text
				<textarea class="textArea150" name="text1" id="text1"></textarea>
				<button type="button" id="smallPlusButton1" class="smallPlusButton" onclick="fnAddText(2)">+</button>
			</div>
		</div>
		<div class="divRow100 shadow">	
			<div class="divTitle2">
				Fotky
				<input type="file" name="image[]" id="image" value="" multiple>
			</div>
		</div>
	</div>
		<div class="divPostButtons">
			<button id="newPost" type="submit">submit</button>
		</div>
	</form>
	<div class="divSections">
	
	</div>
@endsection