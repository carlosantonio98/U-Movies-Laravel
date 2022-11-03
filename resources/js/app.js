import './bootstrap';

import Alpine from 'alpinejs';
import jQuery from 'jquery';

window.Alpine = Alpine;
window.$ = jQuery;

Alpine.start();

// Loading
$(window).on('load', function() {
    setTimeout(removeLoader, 1000); //wait for page load PLUS two seconds.
})

function removeLoader(){
    $( "#loading" ).fadeOut(500, function() {
        $( "#loading" ).remove();
    });
}

// ScrollTop
function scrollTop() {
    const scrollTop = document.getElementById('scroll-top');
    if (this.scrollY >= 40) scrollTop.classList.add('scroll-top'); else scrollTop.classList.remove('scroll-top');
}
window.addEventListener('scroll', scrollTop);