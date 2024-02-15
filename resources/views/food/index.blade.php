@extends('layout')

@section ('title')
	Food
@endsection

@section ('content')
	<div class="divTitle">
		<h1>Jedlo</h1>
	</div>
	
	<div class="divTitle">
		<a href="/recipes"><h1>Recepty</h1></a>
	</div>
	<div class="divPostButtons">
		<a href="{{asset('/food/product/create/new')}}" ><button name="divPostButtons" id="newPost">
			<span style="font-size: 18pt;color:#659e26;">+</span><span style="text-align: middle">
		</button> 
		</a><br>
	</div>
	<form name="formRecipe" id="formRecipe" method="post" enctype="multipart/form-data" action="/recipes/create/new" 
	onsubmit="return fnNewRecipe()">
		{{csrf_field()}}
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<div class="divPost shadow">	
			<div class="foodProductText">
				<h2>Ingrediencie</h2>
				<input class="newPostInput mgLeft5" type="text" placeholder="Hladaj Ingrediencie" name="searchIngredient" id="searchIngredient" value="" onkeyup="fnAddIngredient()" style="padding-left:0px">
			</div>
			<div class="divAmount">
				<button type="button" onclick="fnClearInput()" class="btnClear"><span style="font-size: 20pt;">&#10008;</span></button>
			</div>
		</div>
		<div id="divIgredient">

		</div>
	</form>
	<div class="divPost">
		<br>
		<div class="divSections">
		@foreach($sections as $section)
			<a href="{{asset('/food/'.$section->id)}}">
				<div class="foodSection"  style="background-image: url({{asset($section->icon)}})">
					<h1 style="text-align: center; color: white; font-weight: 600; font-size: 15px;text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black; text-align: center; margin: 0 auto ">{{$section->name}}</h1>
				</div>
			</a>
		@endforeach
		</div>
	</div>
	<div class="divPostButtons">
		<button id="newPost" type="button" onclick="window.history.back()">Naspat</button>
	</div>
@endsection