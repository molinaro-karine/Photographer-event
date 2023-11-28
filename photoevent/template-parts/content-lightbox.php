<?php
$article_title = get_the_title();
?>

<div id="lightbox">
    <div class="lightbox-content">
        <!-- Contenu de la lightbox -->
       
    </div>
    <div class="lightbox-close-btn">
        <span>&times;</span>
    </div>
    <div class="lightbox-next-btn">
        <span>Suivante</span>
        <img class="arrow arrow_right" src="<?php echo get_template_directory_uri(); ?>/assets/images/Arrow_right.png" alt="Flèche vers la droite" />
    </div>
    <div class="lightbox-prev-btn">
        <img class="arrow arrow_left" src="<?php echo get_template_directory_uri(); ?>/assets/images/Arrow_left.png" alt="Flèche vers la gauche" />
        <span>Précédente</span>
    </div>
    <div class="lightbox-infos">
            <p class="lightbox-title"><?php echo $article_title; ?></p>
            <p class="lightbox-cat"><?php echo the_terms(get_the_ID(), 'categorie-photo', false); ?></p>
        </div>
</div>
