//slides

document.addEventListener("DOMContentLoaded", function () {
  // Récupérer tous les éléments du slider
  let sliderItems = document.querySelectorAll(".slider-item");
  console.log(sliderItems);

  // Initialiser le compteur de slider
  let currentSlide = 0;

  // Afficher le premier élément du slider
  showSlide(currentSlide);

  // Ajouter un gestionnaire d'événements pour le bouton suivant
  document.getElementById("nextBtn").addEventListener("click", function () {
    currentSlide++;
    if (currentSlide >= sliderItems.length) {
      currentSlide = 0; // Revenir au début si on atteint la fin
    }
    showSlide(currentSlide);
  });

  // Ajouter un gestionnaire d'événements pour le bouton précédent
  document.getElementById("prevBtn").addEventListener("click", function () {
    currentSlide--;
    if (currentSlide < 0) {
      currentSlide = sliderItems.length - 1; // Aller à la fin si on est au début
    }
    showSlide(currentSlide);
  });

  // Fonction pour afficher le slide actuel
  function showSlide(index) {
    // Masquer tous les slides
    sliderItems.forEach(function (item) {
      item.style.display = "none";
    });

    // Affiche le slide actuel
    sliderItems[index].style.display = "block";
  }
});
