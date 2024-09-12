// Import des styles pour compilation.
import "./bootstrap.js";
import "./styles/app.css";

// Fonction pour attacher les événements aux boutons déroulants
function attachEventListeners() {
    const boutonsDeroulants = document.getElementsByClassName("boutonDeroulant");

    for (let index = 0; index < boutonsDeroulants.length; index++) {
        boutonsDeroulants[index].addEventListener("click", () => {
            const menuDeroulantDuBouton =
                boutonsDeroulants[index].getElementsByClassName("menuDeroulant");

            toggleMenuDeroulant(menuDeroulantDuBouton[0]);
        });
    }
}

// Fonction pour ouvrir/fermer les menus déroulants
function toggleMenuDeroulant(menu) {
    menu.classList.toggle("hidden");
}

// Appeler après chaque navigation via Turbo
document.addEventListener("turbo:load", () => {
    attachEventListeners();
});