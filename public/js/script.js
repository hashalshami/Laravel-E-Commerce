// import './bootstrap';
// import './script';

// import {Livewire,Alpine} from '../../vendor/livewire/livewire/dist/livewire.esm';

// public/js/app.js


const header = document.getElementById('header')

window.addEventListener('scroll', function () {
    if (window.scrollY > 10) {
        header.classList.add('active')
        goTopBtn.classList.add('active')
    } else {
        header.classList.remove('active')
        goTopBtn.classList.remove('active')
    }
})
let lastScrollTop = 0;
const body = document.body;



navToggleBtn.addEventListener('click', function () {
    elemToggleFunc(navToggleBtn)
    elemToggleFunc(navbar)
    elemToggleFunc(document.body)
});

userOptionBtn.addEventListener('click', function () {
    elemToggleFunc(userOptionNavBar)
    elemToggleFunc(userOptionBtn)
});


const elemToggleFunc = function (elem) {
    elem.classList.toggle('active')
}


window.addEventListener('scroll', function () {
    if (window.scrollY > 10) {
        header.classList.add('active')
        goTopBtn.classList.add('active')
    } else {
        header.classList.remove('active')
        goTopBtn.classList.remove('active')
    }
})


const navToggleBtn = document.querySelector('.nav-toggle-btn');
const navbar = document.querySelector('.navbar');

navToggleBtn.addEventListener('click', function () {
    elemToggleFunc(navToggleBtn)
    elemToggleFunc(navbar)
    elemToggleFunc(document.body)
});

const userOptionBtn = document.querySelector('.user-option-btn');
const userOptionNavBar = document.querySelector('.user-option-navbar');

userOptionBtn.addEventListener('click', function () {
    elemToggleFunc(userOptionNavBar)
    elemToggleFunc(userOptionBtn)
});
