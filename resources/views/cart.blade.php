@extends('layout')

@section ('title')
Post

@endsection

@section ('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
	<div class="divTitle">
		<h1>Kosik</h1>
	</div>
	@if($cart != 0)
		@foreach($cart as $product)
			<div id="product_{{$product['id']}}" class="divRow50 shadow" >
					<div class="foodProductSmall" style="background-image: url({{asset($product['icon'])}});">
					</div>
					<div class="foodProductTextSmall">
						@if($product['crossed'] == 1)
							<span onclick="fnLineThrough({{$product['id']}})" ondblclick="fnNormal({{$product['id']}})" id="p_{{$product['id']}}" class="spanProduct" style="text-decoration: line-through;">{{$product['name']}}</span>
						@else
							<span onclick="fnLineThrough({{$product['id']}})" ondblclick="fnNormal({{$product['id']}})" id="p_{{$product['id']}}" class="spanProduct" style="text-decoration: none;">{{$product['name']}}</span>
						@endif

                        @if($product['dateExpired'] == '')
							<span onclick="fnChangeExpiration({{$product['id']}})" class="expirationText" id="expirationText{{$product['id']}}">pridaj expiraciu</span>
						@else
							<span onclick="fnChangeExpiration({{$product['id']}})" class="expirationText" id="expirationText{{$product['id']}}">{{$product['dateExpired']}}</span>
						@endif
					</div>
					<div class="foodProductTextSmall2">
						<span class="spanAmount">{{$product['amount']}} {{$product['measure']}}</span>
						<div onclick="fnDelProduct('{{$product['id']}}')" class="delProduct" >&#10008;</div>
					</div>
			</div>
		@endforeach

		<div class="divPostButtons">
			@if(Auth::user())
			<button id="newPost" type="submit" onclick="fnToWarehouse('normal')">DO SKLADU</button>
			<button id="newPost" type="submit" onclick="fnToWarehouse('crossed')">DO SKLADU Preciarknute</button>
			@else
			<button id="newPost" type="submit" onclick="alert('Prihlas sa pre pouzitie skladu')">DO SKLADU</button>
			<button id="newPost" type="submit" onclick="alert('Prihlas sa pre pouzitie skladu')">DO SKLADU Preciarknute</button>
			@endif

		</div>

	@else
		<div class="divRow50 shadow">
			<div class="foodProductTextSmall">
				<span class="spanProduct">Košík je prázdny</span>
			</div>

		</div>
		<br>
		<br>
	@endif

@endsection


