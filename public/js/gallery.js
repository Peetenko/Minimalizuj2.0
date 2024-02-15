var slideIndex = 1;
showSlides(slideIndex);


function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  
  slides[slideIndex - 1].style.display = "block";  
  dots[slideIndex - 1].className += " active";
}

document.addEventListener('keydown', function(e) {
    switch (e.keyCode) {
        case 37:
            plusSlides(-1);
            break;
        case 39:
            plusSlides(1);
            break;

    }
});

var touchableElement = document.getElementById('slideshow');
touchableElement.addEventListener('touchstart', function (event) {
touchstartX = event.changedTouches[0].screenX;
touchstartY = event.changedTouches[0].screenY;
}, false);

touchableElement.addEventListener('touchend', function (event) {
touchendX = event.changedTouches[0].screenX;
touchendY = event.changedTouches[0].screenY;
handleGesture();
}, false);


function handleGesture() {
  var tolerance = 50;
if (touchendX < touchstartX + tolerance) {
    console.log('Swiped Left' +  touchendX );
    plusSlides(-1)
}

if (touchendX > touchstartX + tolerance) {
    console.log('Swiped Right');
    plusSlides(1)
}

if (touchendY + tolerance < touchstartY) {
    console.log('Swiped Up');
    history.back();
}

if (touchendY > touchstartY + tolerance) {
    console.log('Swiped Down');
    history.back();
}

if (touchendY === touchstartY) {
    console.log('Tap');
}
}
