
let moon = document.getElementById("moon");
let mountain = document.getElementById("mountain");
let road = document.getElementById("road");
let food = document.getElementById("food-text");

window.addEventListener('scroll', function(){
    var value = window.scrollY;

    bg.style.top = value * 0.1 + 'px';
    moon.style.top = value * 0.5 + 'px';
    moon.style.left = -value * 0.5 + 'px';
    mountain.style.top = -value * 0.15 + 'px';
    road.style.top = value * 0.15 + 'px';
    food.style.top = value * 1 + 'px';
});

