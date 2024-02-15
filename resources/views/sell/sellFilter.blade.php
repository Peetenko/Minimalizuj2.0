@foreach ($sales as $sale)
	<div class="divPost" >

		<div class="divColumnLeft">
			<div class="divGallery">
				<a href="{{ URL::to('/sell/gallery/' . $sale->id)}}" >
					<img src="{{ URL::to('/images/' . $sale->image)}}"  height="100px" class="donateGallery" >
				</a>
			</div>
		
			{{--<div class="divEmail">
				<h3>{{$sale->email}}</h3>
			</div>
			<div class="divPhone">
				<h3>{{$sale->phone}}</h3>
			</div>--}}
		</div>
		

		<div class="divColumnRight">
			<div class="divTitle2">
				<h2>{{$sale->title}}</h2>
			</div>
			<div class="divText">

				{{$sale->body}}<br><br>
				
			</div>

		</div>
		<div class="divRow2">
			<div class="divName" style="display: inline-flex;" onclick="fnDetail(this, {{$sale->id}})">
	    		<img class="icons" src="{{asset('svg/userIcon.svg')}}" width="16px" >
				 <h3>{{$sale->name}}</h3>
			</div>
			<div class="divPrice" >
				<h3>Cena: <span style="font-weight: 700; color: black;">{{$sale->price}} $</span></h3>
			</div>

			<div class="divTimestamp" >
				<img class="icons" src="{{asset('svg/userTime.svg')}}" width="16px">
				<h3>{{$sale->created_at}}</h3>
			</div>
			<div class="divRowDetail" id="detail{{$sale->id}}">
				<button style="position:absolute;right: 0;top:0" onclick="fnCloseDetail(detail{{$sale->id}})">X</button>
				<a class="aEmail" href="mailto:{{$sale->email}}?subject={{$sale->title}}"> 
					<h2 style="text-align:center; margin-top: 40px">{{$sale->email}}</h2></a>
				<h2 style="text-align:center;">{{$sale->phone}}</h2>
		
			</div>
		
		</div>
	</div>
	
@endforeach

		