// MENU BURGER

// récupérez le bouton du menu hamburger et la liste des liens
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
var button = document.getElementById("myBtn");
var menuDiv = document.querySelector(".navbar");

// Déplacement du bouton dans l'ul
menuDiv.appendChild(button);
