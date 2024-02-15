
@extends('layout')

@section ('title')
Post

@endsection

@section ('content')
<div class="divTitle">
	<h1>BLOG</h1>
</div>
	
	
		<div class="divPost" >
			<div class="divRow">
				<div class="divTitle2">
					<h2>{{$post->title}}</h2>
				</div>
				<div class="divText">
					@if(isset($image) && $image != '')
					<img src="{{ asset('/images/posts/'. $post->id. '/' . $post->id . '.jpg') }}" style="width: 100%;border-radius: 10px;"  >
					@endif
					{!!$post->description!!}<br><br>
					
				</div>
			</div>
			<div class="divRow2">
		    	<div class="divName">
		    		<img class="icons" src="{{asset('svg/userIcon.svg')}}" width="16px">
					<h3>{{$post->name}}</h3>
				</div>
				<div class="divTimestamp">
					<img class="icons" src="{{asset('svg/userTime.svg')}}" width="16px">
					<h3>{{$post->created_at}}</h3>
				</div>
			</div>
		</div>
		<br>
	<div class="divPostButtons">
		<button class="newPost" onclick="goBack()">Back</button>
		<button class="newPost">Next</button>
		@if(isset(Auth::user()->id) && (Auth::user()->id == 2 || Auth::user()->id == 1))
		<a href="/post/edit/{{$post->slug}}">
			<button class="newPost">Edit</button>
		</a>
		@endif
	</div>
	<br>

	
	@foreach ($comments as $comment)
	<div class="divComment">
		<div class="divRow">
			<div class="divText">
				<p>
				{{$comment->comment}}<br>
				</p>
			</div>
		</div>
		<div class="divRow">
	    	<div class="divName" style="display: inline-flex;">
	    		<img class="icons" src="{{asset('svg/userIcon.svg')}}" width="16px">
				 <h3>{{$comment->name}}</h3>
			</div>
			<div class="divTimestamp">
				<img class="icons" src="{{asset('svg/userTime.svg')}}" width="16px">
				<h3>{{$comment->created_at}}</h3>
			</div>
		</div>
	</div>
	@endforeach
	

	<form method="POST" action="/post/{{$post->slug}}">
		{{csrf_field()}}
		<div class="divNewComment">
			<label>Meno</label>
			@if(Auth::user('name'))
				<input class="newPostInput" value="{{Auth::user()->name}}" type="text" name="userComment" id="userName" onkeydown="fnNameLength()">
				<input type="hidden" value="{{Auth::user()->id}}" name="userId">
			@else
			<input class="newPostInput" type="text" name="userComment" id="userName" onkeydown="fnNameLength()">
			@endif
			<label>Komentár</label>
			<textarea class="newPostInput" name="textComment"></textarea>
			<div class="divPostButtons">
				<input  type="submit" id="newPost" value="Pridať komentár" name="submitComment" >
			</div>
		</div>
	</form>
@endsection
