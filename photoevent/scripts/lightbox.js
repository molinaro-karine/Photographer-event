document.addEventListener("DOMContentLoaded", function () {
  const lightbox = document.getElementById("lightbox");
  const lightboxContent = document.querySelector(".lightbox-content");
  const lightboxTriggerElements =
    document.querySelectorAll(".lightbox-trigger");

  if (lightbox) {
    lightboxTriggerElements.forEach(function (element) {
      element.addEventListener("click", function (event) {
        event.preventDefault();

        const imgSrc = element.querySelector("img").getAttribute("src");
        const imgAlt = element.querySelector("img").getAttribute("alt");
        const imgTitle = element.querySelector("img").getAttribute("title");

        // Mettez à jour le contenu de la lightbox avec les informations de l'image
        lightboxContent.innerHTML = `
                  <img src="${imgSrc}" alt="${imgAlt}" title="${imgTitle}">
              `;

        // Afficher la lightbox
        lightbox.style.display = "flex";
      });
    });

    // Cacher la lightbox lorsque l'utilisateur clique à l'extérieur de son contenu
    lightbox.addEventListener("click", function (event) {
      if (event.target === lightbox) {
        lightbox.style.display = "none";
      }
    });
  }
});
