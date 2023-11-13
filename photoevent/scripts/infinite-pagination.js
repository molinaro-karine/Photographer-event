(function ($) {
  $(document).ready(function () {
    let page = 2;
    let canLoadMore = true;
    let loadedImageIds = [];

    function loadMorePosts() {
      if (canLoadMore) {
        $.ajax({
          url: photoevent_js.ajax_url,
          type: "post",
          data: {
            action: "load_more_posts",
            page: page,
            posts_per_page: 2,
            exclude_ids: loadedImageIds.join(","), // Envoyer les IDs déjà chargés pour les exclure
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
              canLoadMore = false;
              $("#load-more").text("Plus de photos");
            }
          },
        });
      }
    }

    $("#load-more").on("click", function (e) {
      e.preventDefault();
      loadMorePosts();
    });
  });
})(jQuery);
