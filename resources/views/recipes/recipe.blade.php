
@extends('layout')

@section ('title')
Recepty

@endsection

@section ('content')
	{{csrf_field()}}
	<div class="divTitle">
		<h1>Recepty</h1>
	</div>
	<div class="divPost" >
		<div class="divTitle2 mgTop10">
			<h2>{{$recipe[0]->title}}</h2>
		</div>
		<div class="divImage">
			<img src="{{asset($recipe[0]->image)}}" class="recipeImage">
		</div>
		<div class="divTitle2">
			<h2>Ingrediencie:</h2>
		</div>
		@foreach($ingredients as $i)
		<div class="divRow50" >	
			<div class="foodProductSmall" style="background-image: url({{asset($i->icon)}});">
			</div>
			<div class="foodProductTextSmall">
				<span class="spanProduct" style="text-decoration: none;">{{$i->productName}}</span>
			</div>
			<div class="foodProductTextSmall2">
				<span class="spanAmount rightFloat">{{$i->amount}} {{$i->measure}}</span>	
				
			</div>
		</div>
		@endforeach
		<br>
		<div class="divTitle2">
			<h2>Postup:</h2>
		</div>
		<div class="divText">
			{!! $recipe[0]->body!!}<br><br>
		</div>
		
		<div class="divRow2">
	    	<div class="divName">
	    		<img class="icons" src="{{asset('svg/userIcon.svg')}}" width="16px">
				<h3>{{$recipe[0]->name}}</h3>
			</div>
			<div class="divTimestamp">
				<img class="icons" src="{{asset('svg/userTime.svg')}}" width="16px">
				<h3>{{$recipe[0]->created_at}}</h3>
			</div>
		</div>
	</div>
	<br>
	<div class="divPostButtons">
		<button class="newPost" onclick="goBack()">Back</button>
		<a href="/recipes/{{$nextRecipe}}" >
			<button class="newPost" >Next</button>
		</a>
		@if(isset(Auth::user()->id) && Auth::user()->id == $recipe[0]->user_id)
		<a href="/recipes/edit/{{$recipe[0]->recipeId}}" >
			<button class="newPost" >Edit</button>
		</a>
		@endif
	</div>
	<br>
	@include('components.shareButton')
	

@endsection
