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
if (touchendX < touchstartX) {
    console.log('Swiped Left');
    plusSlides(-1)
}

if (touchendX > touchstartX) {
    console.log('Swiped Right');
    plusSlides(1)
}

if (touchendY < touchstartY) {
    console.log('Swiped Up');
}

if (touchendY > touchstartY) {
    console.log('Swiped Down');
}

if (touchendY === touchstartY) {
    console.log('Tap');
}
}