jQuery(document).ready(function ($) {
  // Écoute les changements dans la sélection de catégories, de formats et de tri
  $("#categories-select, #format-select, #date-select").change(function () {
    // Récupére les valeurs sélectionnées
    let selectedCategory = $("#categories-select").val();
    let selectedFormat = $("#format-select").val();
    let selectedOrder = $("#date-select").val();

    //requête Ajax
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
