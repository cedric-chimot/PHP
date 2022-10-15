let navbar = document.querySelector('.header .navbar');
let account = document.querySelector('.header .account-box');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    account.classList.remove('active');
}
 
document.querySelector('#user-btn').onclick = () =>{
    account.classList.toggle('active');
    navbar.classList.remove('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    account.classList.remove('active');
}