import './bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;
// import '../sass/app.scss'

setTimeout(function () {
    $(".alert").fadeTo(2000, 0).slideUp(2000, function () {
        $(this).remove();
    });
}, 10000);

// document.addEventListener('DOMContentLoaded', () => { console.log('Hello World from app.js') });