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
        <!-- Styles -->http://localhost:8000/images/donate/16/IMG_1891.jpg
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="{{asset('css/gallery.css')}}" >
        <link  rel="jquery" type="jquery"  href="{{asset('js/functions.js')}}" >
        
        
    </head>
    <body>
   
<!-- Slideshow container -->
<div id="slideshow" class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  @foreach ($fullpath as $file)
      <div class="mySlides fade">
        <div class="numbertext">{{$loop->iteration}} / {{$count}}</div>
        <div class="closeGallery" onclick="history.back()">x</div>
        <img src="{{url($file)}}" style="width:100%;" >
        {{--<div class="text">Caption Text</div>--}}
      </div>
  @endforeach
    
  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
    @foreach($fullpath as $file)
        <span class="dot" onclick="currentSlide({{$loop->iteration}})"></span>
    @endforeach
  
</div>
<script src="{{asset('js/gallery.js')}}"></script>
       
    </body>
</html>