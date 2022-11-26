import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Loading
$(window).on('load', function() {
    setTimeout(removeLoader, 400); //wait for page load PLUS two seconds.
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