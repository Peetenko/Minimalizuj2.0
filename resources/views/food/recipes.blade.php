@extends('layout')

@section ('title')
	Food
@endsection

@section ('content')
	<div class="divTitle">
		<h1>Recepty</h1>
	</div>
	<div class="divPostButtons">
		<a href="{{asset('/recipes/create/new')}}" ><button name="divPostButtons" id="newPost">
			<span style="font-size: 18pt;color:#659e26;">+</span><span style="text-align: middle">
		</button> 
		</a><br>
	</div>
	<div class="divSections">
	{{$message}}
	</div>
@endsection