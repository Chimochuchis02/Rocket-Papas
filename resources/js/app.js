import './bootstrap';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import Alpine from 'alpinejs';


window.Alpine = Alpine;

Alpine.start();


document.addEventListener("DOMContentLoaded", function () {

    // ==========================================
    // 1. PUERTA TRASERA DEL LOGIN (OCULTA)
    // ==========================================
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