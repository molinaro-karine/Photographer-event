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

// When the user clicks anywhere outside of the modal, close it
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
