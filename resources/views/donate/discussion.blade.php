
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
					<h2>{{$discussion->title}}</h2>
				</div>
				<div class="divText">

					{!!$discussion->description!!}<br><br>
					
				</div>
			</div>
			<div class="divRow2">
		    	<div class="divName">
		    		<img class="icons" src="{{asset('svg/userIcon.svg')}}" width="16px">
					<h3>{{$discussion->name}}</h3>
				</div>
				<div class="divTimestamp">
					<img class="icons" src="{{asset('svg/userTime.svg')}}" width="16px">
					<h3>{{$discussion->created_at}}</h3>
				</div>
			</div>
		</div>
		<br>
	<div class="divPostButtons">
		<button class="newPost" onclick="goBack()">Back</button>
		<button class="newPost">Next</button>
		<a href="/discussion/edit/{{$discussion->id}}">
			<button class="newPost">Edit</button>
		</a>
	</div>
	<br>

	
	@foreach ($comments as $comment)
	<div class="divComment">
		<div class="divRow">
			<div class="divText">
				<p>{{$comment->comment}}</p>	
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
	

	<form method="POST" action="/discussion/{{$discussion->id}}">
		{{csrf_field()}}
		<div class="divNewComment">
			<label>Meno</label>
			<input class="newPostInput" type="text" name="userComment" id="userName" onkeydown="fnNameLength()">
			<label>Komentár</label>
			<textarea class="newPostInput" name="textComment"></textarea>
			<div class="divPostButtons">
				<input  type="submit" id="newPost" value="Pridať komentár" name="submitComment" >
			</div>
		</div>
	</form>
@endsection
