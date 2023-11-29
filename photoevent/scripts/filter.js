jQuery(document).ready(function ($) {
  // Initialisation de Select2 sur les listes déroulantes
  let select2Dropdown = $("#categories-select, #format-select, #date-select");

  select2Dropdown.select2();

  // Ajoute une classe lors de l'ouverture du menu déroulant
  select2Dropdown.on("select2:open", function () {
    $(".select2-container .select2-selection__arrow").addClass("rotate-up");
  });

  // Retire la classe lors de la fermeture du menu déroulant
  select2Dropdown.on("select2:close", function () {
    $(".select2-container .select2-selection__arrow").removeClass("rotate-up");
  });

  // Écoute les changements dans la sélection de catégories, de formats et de tri
  select2Dropdown.change(function () {
    // Récupère les valeurs sélectionnées
    let selectedCategory = $("#categories-select").val();
    let selectedFormat = $("#format-select").val();
    let selectedOrder = $("#date-select").val();

    // Requête Ajax
    $.ajax({
      url: photoevent_js.ajax_url,
      type: "post",
      data: {
        action: "filter_photos",
        selectedCategory: selectedCategory,
        selectedFormat: selectedFormat,
        selectedOrder: selectedOrder,
      },
      success: function (response) {
        // Met à jour la section de la galerie avec les nouvelles photos
        $(".image-gallery").html(response);
      },
    });
  });
});
