$(document).ready(function () {
    jQuery(function ($) {
      var path = window.location.href;
      $('nav ul a').each(function () {
        if (this.href === path) {
          $(this).addClass('active');
        }
      });
    });
});

const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');

        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            }
            else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
            }
        })

        burger.classList.toggle('toggle');
    })
}

function change_show(){
    if(document.querySelector("#menu").classList.contains('show')) {document.querySelector("#menu").classList.remove('show');}
    else {document.querySelector("#menu").classList.add('show');}
}

navSlide();