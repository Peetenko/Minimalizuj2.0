@extends('layout')

@section ('title')
Post

@endsection

@section ('content')

	<div class="divTitle">
		<h1>Produkt</h1>
	</div>
<div class="pd-mg-10">
	@foreach($parameters as $parameter)
		<div class="divRow">
			<label>{{$parameter->name}}</label>
			@if($parameter->type == 'select')
				<select name="{{$parameter->name}}" id="{{$parameter->name}}" class="{{$parameter->class}}" >
					@if($parameter->name == 'measure')
						@foreach($measures as $measure)
						<option>{{$measure->name}}</option>
						@endforeach
					@endif
					@if($parameter->name == 'section')
						@foreach($sections as $section)
						<option>{{$section->name}}</option>
						@endforeach
					@endif
				</select>

			@elseif ($parameter->type == 'file')
				<input type="{{$parameter->type}}" name="{{$parameter->name}}" id="{{$parameter->name}}" class="{{$parameter->class}}">	
			@else

			<input type="{{$parameter->type}}" name="{{$parameter->name}}" id="{{$parameter->name}}" class="{{$parameter->class}}">
			@endif
		</div>
	@endforeach
</div>
@endsection