$(function()
{
    let signUpbtn = document.getElementById("signUpbtn");
    let signInbtn = document.getElementById("signInbtn");
    let usernamefield = document.getElementById("usernamefield");
    let title = document.getElementById("title");
    signInbtn.onclick = function()
    {
        usernamefield.style.maxHeight = "0";
        title.innerHTML = "Sign In";
        signUpbtn.classList.add("disable");
        signInbtn.classList.remove("disable");
    }
    signUpbtn.onclick = function()
    {
        usernamefield.style.maxHeight = "60px";
        title.innerHTML = "Sign Up";
        signInbtn.classList.add("disable");
        signUpbtn.classList.remove("disable");
    }
})