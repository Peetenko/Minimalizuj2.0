@extends('layout')

@section ('title')
	Recepty
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
	@foreach($recipes as $recipe)
        <a href="/recipes/{{$recipe->recipeId}}" style="a:decoration:none">
            <div class="divPost shadow">
                <div class="divRecipeImage" style="background-image: url({{asset($recipe->thumbnail)}});">
                </div>
                <div class="divRow">
                    <div class="divTitle2">
                        <h2>{{$recipe->title}}</h2>
                    </div>
                    <div class="divText">
                        {!! Str::limit($recipe->body, 100) !!}

                    </div>
                </div>
            </div>
        </a>
	@endforeach
	<div class="divSections">

	</div>
    <script>
        addEventListener('resize',(event) => {
            resizePost();
        })

        function resizePost(){
            const postWidth = $('.divPost').width();
            const divCenterWidth = $('.divCenter').width();
            if(divCenterWidth < 500){
                $('.divPost').width(divCenterWidth);
            }
            if(divCenterWidth > 500){
                const newPostWidth = divCenterWidth / 2.02;
                $('.divPost').width(newPostWidth);
                $('.divPost').height('360');
            }
        }
        resizePost();


    </script>
@endsection

