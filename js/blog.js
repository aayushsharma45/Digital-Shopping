

// owl carousel for blog

$(".owl-carousel").owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:4000,
    dots:false,
    autoplayHoverPause: true,
    nav:true,
    navText: [$('.owl-navigation .owl-nav-prev'),$('.owl-navigation .owl-nav-next')]
});

const loginPopup = document.querySelector(".login-popup");
const close = document.querySelector(".close-btn");

window.addEventListener("load",function(){
    showPopup();
})

function showPopup(){
    const timeLimit = 5 //seconds;
    let i=0;
    const timer = setInterval(function(){
        i++;
        if(i == timeLimit){
            clearInterval(timer);
            loginPopup.classList.add("show");
        }
        console.log(i)
    },1000);
}

close.addEventListener("click",function(){
    loginPopup.classList.remove("show");
})