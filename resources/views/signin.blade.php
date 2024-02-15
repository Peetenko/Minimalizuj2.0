@extends('layout')

@section('title')
	Sign in
@endsection

@section('content')
	<div class="divTitle">
		<h1>Prihlasit sa</h1>
	</div>
	<div class="divSellCreate">
		<form name="signForm" method="post" action="/auth">
			<meta name="csrf-token" content="{{ csrf_token() }}" />
			{{csrf_field()}}
			<input class="newPostInput" type="text" id="email" name="email" placeholder="Email">
			<input class="newPostInput" type="password" id="password" name="password" placeholder="Password">
			<div class="reg">
				<button type="submit" id="newPost" onclick="fnSignIn()">PRIHLÁSIŤ SA</button>
			</div>
			<div class="reg">
				<a href="{{asset('/registration')}}"  style="color:#659e26;">Registrácia</a>
			</div>
		</form>
	</div>
	<div class="divPost">
		<div class="divText"> 
			Minimalizuj.sk mozes pouzivat aj bez registracie a anonymne prispievat.
			Avsak pre vyuzitie vsetkych vyhod a sluzieb ako pouzivanie skladu, odporucanie a vytvaranie receptov,
			je potrebna registracia, pretoze dane ukony sa viazu na tvoj ucet.
		 </div>

	</div>
	@if(isset($message))
		<script type="text/javascript">
			alert({{$message}});
		</script>
	@endif
	


@endsection

