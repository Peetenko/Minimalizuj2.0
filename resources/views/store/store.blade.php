@extends('layout')

@section ('title')
Sklad

@endsection

@section ('content')
<form>
<meta name="csrf-token" content="{{ csrf_token() }}" />
	<div class="divTitle">
		<h1>Sklad</h1>
	</div>
	@if(count($store) != 0)
		@foreach($store as $product)
		<div id="product_{{$product->id}}" class="divRow50 shadow" >	
				<div class="foodProductSmall" style="background-image: url({{asset($product->icon)}});">
				</div>
				<div class="foodProductTextSmall">
						<span id="p_{{$product->product_id}}" class="spanProduct" style="text-decoration: none;">{{$product->name}}</span>
						@if($product->expiration == '')
							<span onclick="fnChangeExpiration({{$product->id}})" class="expirationText" id="expirationText{{$product->id}}">pridaj expiraciu</span>
						@else
							@if(strtotime($product->expiration) > strtotime($today))
								<span onclick="fnChangeExpiration({{$product->id}})" class="expirationText" id="expirationText{{$product->id}}">{{$product->expiration}}</span>
							@elseif(strtotime($product->expiration) == strtotime($today))
								<span onclick="fnChangeExpiration({{$product->id}})" class="expirationText orange" id="expirationText{{$product->id}}">{{$product->expiration}}</span>	
							@else
								<span onclick="fnChangeExpiration({{$product->id}})" class="expirationText red" id="expirationText{{$product->id}}">{{$product->expiration}}</span>
							@endif
						@endif
				</div>
				<div class="foodProductTextSmall2">
					<span class="spanAmount">{{$product->amount}} {{$product->measure}}</span>
					<div onclick="fnDelProductWarehouse('{{$product->id}}')" class="delProduct" >&#10008;</div>
				</div>
				<div class="divRowDetail" id="expiration{{$product->id}}" style="position: relative;">
					<input class="date80p" type="date" name="expiration" id="expDate{{$product->id}}" value="{{$product->expiration}}">
					<span class="tick" onclick="fnUpdateExpiration({{$product->id}})">&#10003;</span>
				</div>
		</div>

		@endforeach
		<div class="divPostButtons">
			<button id="newPost" type="button" onclick="window.history.back()">Naspat</button>
		</div>
	@else
		<div class="divRow50 shadow">	
			<div class="foodProductTextSmall">
				<span class="spanProduct">Sklad je prázdny</span>
			</div>
		</div>
	@endif
</form>
@endsection


