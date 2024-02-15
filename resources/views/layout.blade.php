<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!--<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Styles -->
        <script src="{{asset('js/functions.js')}}"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
       
        
        <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" >
        <link  rel="jquery" type="jquery"  href="{{asset('js/functions.js')}}" >
        
    </head>
    <body>
        <div class="divNav">
            <div style="width:33%;display: inline-block;float: left;"> 
                <a href="/cart">
                    @php
                        if(Session::get('product')){
                            $itemsCount = count(Session::get('product'));
                        }
                           
                        else{
                            $itemsCount = count([]);
                        }
                            
                        
                    @endphp
                    <img class="icons cart" src="{{asset('svg/cart.png')}}" width="16px"><p id="cartCount">@if($itemsCount != 0) {{$itemsCount}} @endif</p>
                </a>
             </div>
            <div style="width:33%;display: inline-block; float: left;" >
                <button id="btnMenu">
                    <img id="logoDots" src="{{asset('svg/logoDots.png')}}">
                </button>
            </div>
            <div style="width:33%;display: inline-block;float: right;">
                @if(isset(Auth::user()->id))
                <a href="{{asset('/user')}}">
                    <img class="icons signin" src="{{asset('svg/signInIcon.svg')}}" width="16px">
                </a>
                @else
                <a href="{{asset('/auth')}}">
                    <img class="icons signin" src="{{asset('svg/signInIcon.svg')}}" width="16px">
                </a>
                @endif
            </div>
        </div>
        <nav id="horizontalNav">
            <a class="navLinks font10pt" href="{{asset('/')}}">DOMOV</a> 
            <a class="navLinks font10pt" href="{{asset('/post')}}">BLOG</a>
            <a class="navLinks font10pt" href="{{asset('/donate')}}">DARUJEM</a>
            <a class="navLinks font10pt" href="{{asset('/sell')}}">PREDÁM</a>
            <a class="navLinks font10pt" href="{{asset('/recipes')}}">RECEPTY</a>
            <a class="navLinks font10pt" href="{{asset('/food')}}">JEDLO</a>
            <a class="navLinks font10pt" href="{{asset('/question')}}">OTÁZKA</a>
            <a class="navLinks font10pt" href="{{asset('/discussion')}}">DISKUSIA</a>
            <a class="navLinks font10pt" href="{{asset('/survey')}}">ANKETA</a>
            <a class="navLinks font10pt" href="{{asset('/contact')}}">KONTAKT</a>  
        </nav>
         <nav id="navigation">
            <div class="divLink">
                {{--<img class="menuIcon" src="{{asset('svg/home.png')}}">--}}
                <a class="navLinks" href="/">DOMOV</a>
            </div>
            <div class="divLink">
               {{--}} <img class="menuIcon" src="{{asset('svg/blog.png')}}">--}}
                <a class="navLinks" href="{{asset('/post')}}">BLOG</a>
            </div>
            <div class="divLink">
                <a class="navLinks" href="/donate">DARUJEM</a>
            </div>
            <div class="divLink">
                <a class="navLinks" href="/sell">PREDÁM</a>
            </div>
            <div class="divLink">
                <a class="navLinks" href="{{asset('/recipes')}}">RECEPTY</a>
            </div>
            <div class="divLink">
                <a class="navLinks" href="{{asset('/food')}}">JEDLO</a>
            </div>
            <div class="divLink">
                <a class="navLinks" href="/question">OTÁZKA</a>
            </div>
            <div class="divLink">
                <a class="navLinks" href="/discussion">DISKUSIA</a>
            </div>
            <div class="divLink">
                <a class="navLinks" href="/survey">ANKETA</a>
            </div>
            <div class="divLink">
                <a class="navLinks" href="/contact">KONTAKT</a>
            </div>

        </nav>


        <div class="container">
             <div class="divCenter">
                @yield('content') 
            </div>
            <div class="footer">
                <div title="Created by PT on 2021. All rights reserved." class="ptLogo" style="padding-top: 5px;">
                    <img title="Created by PT on 2021. All rights reserved." style="width: 40px;display: inline-block;" src="{{asset('images/PT.png')}}">
                </div>
            </div>
        </div>
    </body>
</html>