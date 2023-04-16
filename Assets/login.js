var loginElem = document.getElementById("login-form");
var signupElem = document.getElementById("signup-form");
var buttonElem = document.getElementById("button");

function login() {
    loginElem.style.left = "55px";
    signupElem.style.left = "450px";
    buttonElem.style.left = "55px";
}

function register() {
    loginElem.style.left = "-450px";
    signupElem.style.left = "55px";
    buttonElem.style.left = "205px";
}