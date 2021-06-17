const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container1 = document.querySelector(".container1");

var Page = "";
localStorage.setItem("Page", Page);
if(localStorage.getItem("Page") != "" || localStorage.getItem("Page") != null) {
    Page = localStorage.getItem("Page");
}

if (Page === "signUP") {
    container1.classList.add("sign-up-mode");
}

sign_up_btn.addEventListener('click', () => {
    container1.classList.add("sign-up-mode");
})

sign_in_btn.addEventListener('click', () => {
    container1.classList.remove("sign-up-mode");
})


function signUP() {
    localStorage.setItem("Page", "signUP");
} 