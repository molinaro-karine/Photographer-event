<?php
/**
 * Bloc d'affichage d'une photo dans la galerie
 *
 * @package WordPress
 * @subpackage Thème de nathalie-mota
 */

$thumbnail_id = get_post_thumbnail_id();
$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'photo-size');

$thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
$article_title = get_the_title();

// Récupération de la catégorie de l'article
$categories = get_terms(array(
    'taxonomy' => 'categories',
    'hide_empty' => false,
));

// Vérifie si le titre n'est pas vide avant de l'afficher
if (!empty($article_title)) {
    ?>
    <div class="gallery-item">
        <div class="gallery-img size-img">
            <img id="img-fullscreen" class="img-hover" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_alt; ?>" title="<?php echo $article_title; ?>">
        </div>
        <div class="gallery-hover-icon lightbox-trigger" data-lightbox-source="<?php echo $thumbnail_url[0]; ?>">
        <a href="#">
            <img class="icon-fullscreen" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fullscreen.png" alt="Icône de plein écran" />
        </a>
   
    </div>
        <div class="eye-photo">
            <a href="<?php echo get_post_permalink(); ?>">
                <img class="icon-oeil" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Icône en forme d'oeil" />
                <div class="container-info">
                    <p class="gallery-title"><?php echo $article_title; ?></p>
                    <p class="gallery-cat"><?php echo the_terms(get_the_ID(), 'categorie-photo', false); ?></p>
                </div>
            </a>
        </div>

        <div class="gallery-img-info lightbox-info" data-date=<?php $post_date = get_the_date('Y'); echo $post_date; ?>>
            
        </div>
    </div>
</div>
    <?php
}
?>
