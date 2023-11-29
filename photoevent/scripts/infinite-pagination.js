(function ($) {
  $(document).ready(function () {
    // Initialisation des variables
    let page = 2;
    let canLoadMore = true;
    let loadedImageIds = []; //Stocke les IDs des images déjà chargées

    function loadMorePosts() {
      // Vérifie si on peut charger plus de photos
      if (canLoadMore) {
        $.ajax({
          url: photoevent_js.ajax_url,
          type: "post",
          data: {
            action: "load_more_posts",
            page: page,
            posts_per_page: 2,
            exclude_ids: loadedImageIds.join(","), // Exclure les IDs déjà chargés
          },
          success: function (response) {
            if (response) {
              $(".image-gallery").append(response);
              page++;
              // Mettre à jour les IDs déjà chargés
              loadedImageIds = loadedImageIds.concat(
                response.match(/\b\d+\b/g).map(Number)
              );
            } else {
              // Si la requête ne renvoie pas de nouvelles photos, on désactive le chargement
              canLoadMore = false;
              $("#load-more").text("Plus de photos");
            }
          },
        });
      }
    }

    $("#load-more").on("click", function (e) {
      e.preventDefault();
      loadMorePosts(); //Appelle la fonction pour charger plus de photos
    });
  });
})(jQuery);
