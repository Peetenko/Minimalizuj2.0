@extends('layout')

@section ('title')
	Recepty - Novy recept
@endsection

@section ('content')
	<div class="divTitle">
		<h1>Recepty - Uprava</h1>
	</div>
	<div class="success h40">
		<span class="success"></span>
	</div>
	<div class="divPostButtons">
		<a href="{{asset('/recipes/update/new')}}" ><button name="divPostButtons" id="newPost">
			<span style="font-size: 18pt;color:#659e26;">+</span><span style="text-align: middle">
		</button> 
		</a><br>
	</div>
	<form name="formRecipe" id="formRecipe" method="post" enctype="multipart/form-data" action="/recipes/update/{{$recipe[0]->recipeId}}" 
	onsubmit="return fnNewRecipe()">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	{{csrf_field()}}
	<div id="createNewRecipe">
		<div class="divRow100 shadow">	
			<div class="divTitle2">
				Nadpis
				<input class="newPostInput" type="text" name="title" id="title" value="{{$recipe[0]->title}}">
			</div>
		</div>
		<div class="divRow100 shadow">	
			<div class="divTitle2">
				Ingrediencie
				<input class="newPostInput" type="text" name="searchIngredient" id="searchIngredient" value="" onkeyup="fnAddIngredient()">
			</div>
		</div>
		<div id="divIgredient"></div>
		@foreach($ingredients as $product)
		<div id="product_{{$product->id}}" class="divRow50 shadow" >	
				<div class="foodProductSmall" style="background-image: url({{asset($product->icon)}});">
				</div>
				<div class="foodProductTextSmall">
						<span onclick="fnLineThrough({{$product->id}})" ondblclick="fnNormal({{$product->id}})" id="p_{{$product->id}}" class="spanProduct" style="text-decoration: none;">{{$product->name}}</span>
				</div>
				<div class="foodProductTextSmall2">
					<span class="spanAmount">{{$product->amount}} {{$product->measure}}</span>
					<div onclick="fnDelProductRecipe({{$product->id}},{{$recipe[0]->id}})" class="delProduct" >X</div>
				</div>
		</div>
		@endforeach
		
		<div class="divRow250 shadow">	
			<div class="divTitle2">
				Text
				<textarea class="textArea150" name="text1" id="text1">{{$recipe[0]->body}}</textarea>
				<button type="button" id="smallPlusButton1" class="smallPlusButton" onclick="fnAddText(2)">+</button>
			</div>
		</div>
		<div class="divRow250 shadow">	
			<div class="divTitle2">
				Fotky
				<br><br>
				<input type="file" name="image[]" id="image" value="" multiple >
			</div>
			<div class="divRow100">
				<img id="img{{$recipe[0]->id}}" src="{{asset($recipe[0]->thumbnail)}}" height="100px" style="float:left;display: block;border-radius: 10px;">
				<button id="button{{$recipe[0]->id}}" type="button" style="position:relative;right: 60px;top:0" onclick="fnDelImg('{{$recipe[0]->id}}')">X</button>
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