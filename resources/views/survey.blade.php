@extends('layout')

@section('title')
	survey
@endsection

@section('content')
	<h1>Anketa</h1>
	<div class="divPost">
		<div class="divRow">
			<div class="divBox">
				<p id="text">Text</p>
			</div>
			<div class="divBox">
				<p id="checkbox">CheckBox</p>
			</div>
			<div class="divBox">
				<p id="radio">Radio</p>
			</div>
			<div class="divBox">
				<p id="textarea">Textarea</p>
			</div>
		</div>
	</div>
	<div class="divPost">
		<div class="divSurvey">
		</div>
	</div>

	<div class="divRow100">
		<input type="text" name="name" id="name">
		<input type="number" name="year" id="year">
		<button onclick="fnAdd()">Add Person</button>
	</div>
	<div id="Added">
		<h1>List of Persons</h1>
	</div>

<script type="text/javascript">

$(document).ready(function(){
	$("#text").click(function(){
		$(".divSurvey").append('<input type="text" value="">');
	})

	$("#checkbox").click(function(){
		$(".divSurvey").append('<input type="text" value=""><input type="checkbox" value="">');
	})

	$("#radio").click(function(){
		$(".divSurvey").append('<input type="radio" value="">');
	})

	$("#textarea").click(function(){
		$(".divSurvey").append('<textarea value=""></textarea>');
	})

})

class Person {
	constructor(name,year){
		this.name = name;
		this.year = year;
	}

	age(){
		const date = new Date();
		const age = date.getFullYear() - this.year;
		return age;
	}

	adult(){
		if(this.age() >= 18){
			return 'Adult';
		}else{
			return 'Child';
		}
	}


}

function fnAdd(){
	let name = $('#name').val();
	let year = $('#year').val();
	if(name == ''){
		alert('vypln meno');
		return false;
	}
	if(year == ''){
		alert('vypln rok narodenia');
		return false;
	}
	myPerson = new Person(name,year);
	$('#Added').append('<p>Name: ' + myPerson.name + ' YearOfbirth: ' + myPerson.year + ' age: ' + myPerson.age() + ' child/adult: ' + myPerson.adult() +   '</p>');
	console.log(myPerson.age());

}

function test(){
	var arr = [1,2,3,4,5];
	var arr2 = ['a','b','c','d','e'];
	var arr3 = [];
	for(i=0;i<arr.length;i++){
		console.log(arr[i]);
		arr3.push([arr[i],arr2[i]]);

	}
	arr3.push([6,'f']);
	console.log(arr3);
	
}

	
</script>


@endsection

