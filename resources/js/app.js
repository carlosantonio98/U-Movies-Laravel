import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// ScrollTop
function scrollTop() {
    const scrollTop = document.getElementById('scroll-top');
    if (this.scrollY >= 40) scrollTop.classList.add('scroll-top'); else scrollTop.classList.remove('scroll-top');
}
window.addEventListener('scroll', scrollTop);