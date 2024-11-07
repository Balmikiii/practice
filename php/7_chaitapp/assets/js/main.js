let login_form = document.querySelector(".login_form");
let signup_form = document.querySelector(".signup_form");
let login_btn = document.querySelector("#login_btn");
let sign_btn = document.querySelector("#sign_btn");
let alert_msg = document.querySelector(".alert_msg");


login_btn.addEventListener("click",function(){
    login_form.style.display = "block";
    signup_form.style.display = "none";
});

sign_btn.addEventListener("click",function(){
    signup_form.style.display = "block";
    login_form.style.display = "none";
});



