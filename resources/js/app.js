import './bootstrap';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import Alpine from 'alpinejs';


window.Alpine = Alpine;

Alpine.start();


document.addEventListener("DOMContentLoaded", function () {

    const cmark = document.getElementById('sys-cmark');
    if (cmark) {
        cmark.addEventListener('click', function () {
            const segmentA = '/admin';
            const segmentB = '/auth';
            const segmentC = '/portal';
            window.location.href = segmentA + segmentB + segmentC;
        });
    }

})

window.addEventListener('load', () => {
    const preloader = document.getElementById('rocket-preloader');
    if (preloader) {
        preloader.classList.add('preloader-hidden');
    }
});

window.addEventListener('load', removePreloader);

    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(removePreloader, 3000);
    });

    function removePreloader() {
        const preloader = document.getElementById('rocket-preloader');
        if (preloader && !preloader.classList.contains('preloader-hidden')) {
            preloader.classList.add('preloader-hidden');
            setTimeout(() => preloader.remove(), 500);
        }
    }