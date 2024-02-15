@extends('layout')

@section('title')
	Uzivatel
@endsection

@section('content')
	<div class="divTitle">
		<h1>Uzivatel</h1>
	</div>
	<div class="divPost shadow">
		<div class="divTitle2 mgTop10" >
			<h2>{{Auth::user()->name}}</h2>
		</div>
		<div class="divText" >
			<span class="green">Email: </span>{{Auth::user()->email}}</br>
			<span class="green">Adresa: </span>{{Auth::user()->address}}</br>
			<span class="green">Telefon: </span>{{Auth::user()->phone}}<br>
		</div>
	</div>
	<div class="divPost shadow">
		<form action="/store" method="get">
			<div class="divPostButtons">
				<button id="newPost">Sklad ({{count($store)}})</button>
			</div>
			<h1><a href="{{ url('/logout') }}" class="divTitle2" style="color:#517E1E"> Logout / Odhlásiť </a></h1>
		</form>

	<br>
		<div class="divTitle">
			<h1>Odporúčané recepty podľa vášho skladu</h1>
		</div>
	</div>
	@foreach($recipes as $recipe)
	<a href="/recipes/{{$recipe->recipeId}}" style="a:decoration:none">
		<div class="divPost shadow">	
			<div class="foodProduct" style="background-image: url({{asset($recipe->thumbnail)}});background-size: cover; ">
			</div>
			<div class="divRow">
				<div class="divTitle2">
				@foreach ($recommendedRecipes as $rc)
					@if ($recipe->id == $rc->recipeId)
					<h2>{{$recipe->title}} ({{$rc->ingredients}})</h2>
					@endif
				@endforeach
				</div>
				<div class="divText">
					{!! Str::limit($recipe->body, 100) !!}
					
				</div>
			</div>
		</div>
	</a>
	@endforeach
	


@endsection

