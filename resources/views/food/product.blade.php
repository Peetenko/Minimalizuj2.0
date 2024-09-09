@extends('layout')

@section ('title')
	Food - Products
@endsection

@section ('content')
	<div class="divTitle">
		<h1>Produkty ({{$sectionName->name}})</h1>
	</div>
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<div class="success h40">
		<span class="success"></span>
	</div>

	@foreach($products as $product)
	<div class="divRow100 shadow">
			<div class="foodProduct" style="background-image: url({{asset($product->icon)}})">
			</div>
			<div class="foodProductText">

				<span class="spanProduct">{{$product->name}}</span>
                <div class="divProductAttributeWrap">
                    <div class="divMeasureWrap">
                        <input class="productAmount" type="number" id="amount{{$product->id}}" name="amount{{$product->id}}" maxlength="7" value="{{$product->weight}}">
                        <select class="measure" name="measure" id="measure{{$product->id}}">
                            @foreach ($measures as $measure)
                                @if ($measure->name == $product->measure)
                                    <option selected="selected" value="{{$measure->name}}">{{$measure->name}}</option>
                                @else
                                    <option value="{{$measure->name}}">{{$measure->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="divExpired">
                        <input type="date" name="dateExpired{{$product->id}}" id="dateExpired{{$product->id}}" value="" placeholder="Expire" class="dateExpired">
                    </div>
                </div>
			</div>
			<div class="divAmount">
				<button class="btnAddProduct" value="+" onclick="fnAddProduct({{$product->id}})">+</button>
			</div>
	</div>

	@endforeach
	<div class="divPostButtons">
		<button id="newPost" type="button" onclick="window.history.back()">Naspat</button>
	</div>
@endsection
