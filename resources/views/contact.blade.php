@extends('layout')

@section ('title')
Contact

@endsection

@section ('content')
	<div class="divTitle">
		<h1>Kontakt</h1>
	</div>

	<div class="divPost">
		<br>
		<p class="center">Autor: PT</p>
		<p class="center">Email: pt@minimalizuj.sk</p>
	
		<div class="jsLogoContainer">
			@for($i = 1; $i < 101; $i++)
			<div class="jsLogoSqare" id="jsLogoSqare_{{$i}}"></div>
			@endfor
		</div>

		<div id="app">
			{{--@{{message}}

			<input type="text" v-model="message">--}}
		</div>

		<script type="text/javascript">
			var app = new Vue({
				el: '#app',
				data: {
					message: 'sewas'
				},

				mounted() {
					
				}
			})

			/*function fadeOutIn(){

				$('#jsLogoSqare_12').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_13').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_14').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_15').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_16').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_17').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_18').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_19').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_20').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_24').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_28').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_38').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_33').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_34').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_35').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_36').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_37').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_44').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_39').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_46').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_48').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_54').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_56').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_58').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_64').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_66').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_68').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_76').css('background-color','black').fadeOut().fadeIn();
				$('#jsLogoSqare_86').css('background-color','black').fadeOut().fadeIn();

			}
			fadeOutIn();
			fadeOutIn();
			*/
		</script>
		<img id="PT_logo_animated" width="100%" src="{{asset('/images/PT_logo_animated_whitebg.gif')}}">
		<div class="divRow">
			
		</div>
		<br>
	</div>
@endsection


