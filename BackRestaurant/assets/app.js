import './bootstrap.js';

document.addEventListener('DOMContentLoaded', () => {
    const boutonDeroulant = document.getElementById('boutonDeroulant');
    const menuDeroulant = document.getElementById('menuDeroulant');
    const menuButton = document.getElementById('menuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    boutonDeroulant.addEventListener('click', () => {
        menuDeroulant.classList.toggle('hidden');
    });





    menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
});

import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
