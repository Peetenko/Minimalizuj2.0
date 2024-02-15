@foreach ($donations as $donation)
	<div class="divPost" >
		<div class="divRow">
			<div class="divColumnLeft">
				<div class="divGallery" >
					<a href="{{ URL::to('/donate/gallery/' . $donation->id)}}" >
						<img src="{{ URL::to('/images/' . $donation->image)}}"  height="100px" class="donateGallery" >
					</a>
				</div>
			</div>
			<div class="divColumnRight">
				<div class="divTitle2">
					<h2>{{$donation->title}}</h2>
				</div>
				<div class="divText">
					{{$donation->body}}<br><br>
				</div>
			</div>
		</div>

		<div class="divRow2">
			<div class="divName" style="display: inline-flex;" onclick="fnDetail(this, {{$donation->id}})">
				<img class="icons" src="{{asset('svg/userIcon.svg')}}" width="16px">
				 <h3>{{$donation->name}}</h3>
			</div>
			<div class="divTimestamp">
				<img class="icons" src="{{asset('svg/userTime.svg')}}" width="16px">
				<h3>{{$donation->created_at}}</h3>
			</div>
		</div>
		<div class="divRowDetail" id="detail{{$donation->id}}">
				<button style="position:absolute;right: 0;top:0" onclick="fnCloseDetail(detail{{$donation->id}})">X</button>

				<a class="aEmail" href="mailto:{{$donation->email}}?subject={{$donation->title}}"> 
					<p style="text-align:center; margin-top: 40px;font-size:14pt;color:#2E2E2E;">{{$donation->email}}</p></a>
				<h2 style="text-align:center;">{{$donation->phone}}</h2>

		</div>
	</div>
	
@endforeach