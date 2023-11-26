// MENU BURGER

// récupére le bouton du menu hamburger et la liste des liens
const menuBtn = document.querySelector(".menu-toggle");
const menu = document.querySelector(".open_nav");

// quand l'utilisateur clique sur le bouton, la liste des liens s'ouvre ou se ferme
menuBtn.addEventListener("click", function () {
  menu.classList.toggle("open");
});

// fermeture du menu burger

function toggleMenu() {
  const navbar = document.querySelector(".main-navigation");
  const burger = document.querySelector(".menu-toggle");

  burger.addEventListener("click", () => {
    navbar.classList.toggle("closing");
  });
}
toggleMenu();

// Gestion de l'ouverture et fermeture modale contact
let modal = document.getElementById("myModal");

if (modal) {
  let btn = document.querySelectorAll(".modal-js");

  btn.forEach(function (item) {
    item.addEventListener("click", () => {
      modal.style.display = "block";
    });
  });
}

// fermeture de la modale
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

// Sélection du bouton et de la nav
let button = document.getElementById("myBtn");
let menuDiv = document.querySelector(".navbar");

// Déplacement du bouton dans l'ul
menuDiv.appendChild(button);

//Récupération de la ref du formulaire
jQuery(document).ready(function ($) {
  let champCf7 = $("#photo-ref");

  //Valeur transmise depuis PHP pour préremplir le champ
  champCf7.val(reference_data.reference_value);
});
