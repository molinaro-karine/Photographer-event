 <!-- Slide d'image, récupére toutes les photos sauf celle actuellement affichée -->
 <div class="gallery-slide">
       <?php 
       $exclude_post_id = get_the_ID(); // Récupérer l'ID du post actuel
        $slider_args = array(
            'post_type' => 'photo',
            'posts_per_page' => -1, // Récupérer toutes les photos
            'post__not_in' => array($exclude_post_id), // Exclure le post actuel
        );

        $slider_query = new WP_Query($slider_args);

        if ($slider_query->have_posts()) :
            while ($slider_query->have_posts()) :
                $slider_query->the_post();
        ?>
            
        <div class="slider-item">
            <img class="img-slide" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
        </div>
        <?php
            endwhile;
                wp_reset_postdata(); // Réinitialiser les données de la requête principale
            endif;
        ?>
        <div class="gallery-navigation">
            <img id="prevBtn"src="<?php echo get_template_directory_uri(); ?>/assets/images/prev-left-arrow.svg" alt="Flèche vers la gauche">
            <img id="nextBtn"src="<?php echo get_template_directory_uri(); ?>/assets/images/next-right-arrow.svg" alt="Flèche vers la droite">
        </div>
    </div>
        </div>
