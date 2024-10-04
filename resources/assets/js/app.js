import './bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;
// import '../sass/app.scss'

setTimeout(function () {
    $(".alert").fadeTo(2000, 0).slideUp(2000, function () {
        $(this).remove();
    });
}, 10000);


let toggle = 0;
$(".view-password").on('click', function () {
    var eye = $(this).children();
    var toogleInput = $(this).siblings();
    eye.toggleClass("ri-eye-line ri-eye-off-line");
    if (toggle === 0) {
        toogleInput.attr('type', 'text');
        toggle = 1;
    } else {
        toogleInput.attr('type', 'password');
        toggle = 0;
    }
});

// document.addEventListener('DOMContentLoaded', () => { console.log('Hello World from app.js') });