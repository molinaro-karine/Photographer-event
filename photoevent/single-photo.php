<?php
/**
 * The template for displaying all single posts
 */
?>

<?php get_header(); ?>


<!-- section information et photo de la single-photo -->
<div class="photo-container">
    <div class="photo-info">
        <ul class="info-text-photo">
            <li>
                <?php the_title( '<h2 class="photo-titre"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h2>' ); ?>
            </li>
            <li>
                <p class="ref info-text">RÉFÉRENCE : <span id="reference"><?php echo get_field('reference'); ?></span></p>
            </li>
            <li>
                <p class="categorie info-text">CATEGORIE :</p>
                <?php the_terms( $post->ID, 'categorie-photo', 'CATEGORIE : ' ); ?>
            </li>
            <li>
                <p class="format info-text">FORMAT :</p><?php the_terms( $post->ID, 'format-photo', 'FORMAT : ' ); ?>
            </li>
            <li>
                <p class="type info-text">TYPE :</p><?php echo get_field('type'); ?>
            </li>
            <li>
                <p class="annee info-text">ANNÉE :</p><?php echo get_field('annee'); ?>
            </li>
        </ul>
    </div>

    <?php

    while (have_posts()) :
        the_post();
        //extraire la valeur du champ personnalisé depuis le contenu personnalisé associé
        $reference_value = get_field('reference', $post_id);
        // On insère le formulaire de demandes de renseignements
        // get_field('reference')
        $refPhoto = "";
        if (get_field('reference')) {
            $refPhoto = get_field('reference');
        };

        get_template_part('template-parts/content-photo');

    endwhile; // End of the loop.
    ?>

    <div class="interested-photo">
        <div class="interested-photo-text-button">
            <p class="interested-photo-text">Cette photo vous intéresse ?</p>
            <button class="button modal-js">Contact</button>
        </div>
        <div class="gallery-slide">
            <?php if (have_posts()) :
                while (have_posts()) :
                    the_post(); ?>
                    <img class="img-hero" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
            <?php endwhile;
            endif; ?>
        </div>
    </div>

    <div class="related-photos">
        <h3 class="related-titre">VOUS AIMEREZ AUSSI</h3>
        <div class="related-container">
            <?php
            // Récupérer les catégories actuelles de la photo
            $current_categories = wp_get_post_terms($post->ID, 'categorie-photo', array("fields" => "ids"));

            // Paramètres de la requête pour obtenir d'autres photos des mêmes catégories
            $related_args = array(
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie-photo',
                        'field' => 'id',
                        'terms' => $current_categories,
                        'operator' => 'IN',
                    ),
                ),
                'post__not_in' => array($post->ID),
            );

            $related_photos = new WP_Query($related_args);

            // Afficher les photos liées
            if ($related_photos->have_posts()) :
                while ($related_photos->have_posts()) :
                    $related_photos->the_post(); ?>
                    <div class="gallery-item">
                        <?php get_template_part('template-parts/content-photo'); ?>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>

</div>
<?php get_footer(); ?>