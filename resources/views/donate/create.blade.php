@extends('layout')

@section ('title')
Donate NEW

@endsection

@section ('content')
    <div class="divTitle">
	    <h1>Darujem</h1>
    </div>

    <form name="formDonate" method="post" enctype="multipart/form-data" action="/donate" onsubmit="return fnNewDonation()">

        {{csrf_field()}}
        <div class="divRow100 shadow">
            <div class="divTitle2">Meno</div>
            <input class="newPostInput" type="text" name="name" id="name" value="">
        </div>
        <div class="divRow100 shadow">
            <div class="divTitle2">Email</div>
            <input class="newPostInput" type="text" name="email" id="email" value="">
        </div>
        <div class="divRow100 shadow">
            <div class="divTitle2">Telefon</div>
            <input class="newPostInput" type="text" name="phone" id="phone" value="">
        </div>
        <div class="divRow100 shadow">
            <div class="divTitle2">Nadpis</div>
            <input class="newPostInput" type="text" name="title" id="title" value="">
        </div>
        <div class="divRow250 shadow">
            <div class="divTitle2">Popis</div>
            <textarea class="textArea150" name="body" id="body"></textarea>
        </div>
        <div class="divRow100 shadow">
            <div class="divTitle2">Fotky</div>
            <input class="newPostInput" type="file" name="image[]" multiple="multiple" value="">
        </div>


        <div class="divPostButtons">
            <button id="newPost" type="submit" onsubmit="return fnNewDonation()">submit</button>
        </div>
    </form>

@endsection
