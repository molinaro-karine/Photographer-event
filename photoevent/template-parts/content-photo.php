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

?>

<div class="gallery-item">
    <div class="gallery-img size-img">
        <img id="img-fullscreen" class="img-hover" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_alt; ?>" title="<?php echo $article_title; ?>">
    </div>
    <div class="gallery-hover-icon">
        <a href="<?php echo get_post_permalink(); ?>">
            <img class="icon-oeil" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Icône en forme d'oeil" />
        </a>
        <a href="#">
            <img class="icon-fullscreen" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fullscreen.png" alt="Icône de plein écran" />
        </a>
        <div class="gallery-img-info" data-date=<?php $post_date = get_the_date('Y');
            echo $post_date; ?>>
            <p class="gallery-title"><?php echo $article_title; ?></p>
            <p class="gallery-cat"><?php echo the_terms(get_the_ID(), 'categorie-photo', false); ?></p>
        </div>
    </div>
</div>
</div>