document.addEventListener("DOMContentLoaded", function () {
  const lightbox = document.getElementById("lightbox");
  const lightboxContent = document.querySelector(".lightbox-content");
  const lightboxTriggerElements =
    document.querySelectorAll(".lightbox-trigger");
  const lightboxNextBtn = document.querySelector(".lightbox-next-btn");
  const lightboxPrevBtn = document.querySelector(".lightbox-prev-btn");
  const lightboxCloseBtn = document.querySelector(".lightbox-close-btn span");

  const hideLightbox = () => {
    lightbox.style.display = "none";
  };

  let currentIndex = 0;

  if (lightbox) {
    lightboxTriggerElements.forEach(function (element, index) {
      element.addEventListener("click", function (event) {
        event.preventDefault();

        currentIndex = index;

        // L'attribut data-lightbox-source pour obtenir la source de l'image
        const imgSrc = element.getAttribute("data-lightbox-source");

        // Mise à jour du contenu de la lightbox avec les informations de l'image
        lightboxContent.innerHTML = `
          <img src="${imgSrc}" alt="Image en plein écran">
          <div class="lightbox-info-content">
              ${lightboxContent.innerHTML}
          </div>
        `;

        // Afficher la lightbox
        lightbox.style.display = "flex";
      });
    });

    lightboxNextBtn.addEventListener("click", function () {
      currentIndex = (currentIndex + 1) % lightboxTriggerElements.length;
      updateLightboxContent();
    });

    lightboxPrevBtn.addEventListener("click", function () {
      currentIndex =
        (currentIndex - 1 + lightboxTriggerElements.length) %
        lightboxTriggerElements.length;
      updateLightboxContent();
    });

    lightboxCloseBtn.addEventListener("click", hideLightbox);

    // Fermer la lightbox
    lightbox.addEventListener("click", function (event) {
      if (event.target === lightbox) {
        hideLightbox();
      }
    });
  }

  function updateLightboxContent() {
    const nextElement = lightboxTriggerElements[currentIndex];
    const imgSrc = nextElement.getAttribute("data-lightbox-source");

    // Mettre à jour le contenu de la lightbox avec les informations de l'image suivante
    lightboxContent.innerHTML = `
      <img src="${imgSrc}" alt="Image en plein écran">
    `;
  }
});
