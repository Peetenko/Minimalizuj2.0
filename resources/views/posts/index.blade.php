@extends('layout')

@section ('title')
Post

@endsection

@section ('content')
<div class="divTitle">
	<h1>Minimalizmus - BLOG</h1>
</div>
	<div class="divPostButtons">
		<a href="/create" ><button name="divPostButtons" id="newPost">
			<span style="font-size: 18pt;color:#659e26;">+</span><span style="text-align: middle">
		</button> 
		</a><br>
	</div>
	@foreach ($posts as $post)
	<a href="/post/{{$post->slug}}">
		<div class="divPost" >
			<div class="divRow">
				<div class="divTitle2">
					<h2>{{$post->title}}</h2>
				</div>
				<div class="divText">
					

					{!! Str::limit($post->description, 300) !!}<br>
					
				</div>
			</div>
			<div class="divRow2">
		    	<div class="divName">
		    		<img class="icons" src="{{asset('svg/userIcon.svg')}}" width="18px">
					 <h3>{{$post->name}}</h3>
				</div>
				<div class="divTimestamp">
					<img class="icons" src="{{asset('svg/userTime.svg')}}" width="18px">
					<h3>{{$post->created_at}}</h3>
				</div>
			</div>
		</div>
	</a>
		<br>
	@endforeach


@endsection


