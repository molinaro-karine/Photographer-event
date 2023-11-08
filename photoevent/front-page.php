<?php
/**
 * Template Name: ACCUEIL
 *
 * @package WordPress
 * @subpackage nathalie-mota theme
 */

get_header(); ?>


<?php get_template_part( 'template-parts/content-hero' ); ?>





<section class="galerie">
    <div class="filtres-container">
        <!-- récupère les catégories -->

        <div class="filtres">
            <!-- categories -->
            <div class="filtres-cat  js-filter">
                <form id="categories" class="js-filter-form colonne">
                    <select id="categories-select">
                        <option value="">Catégories</option>
                        <option value="all" hidden></option>
                        <option value="all">Toutes les catégories</option>
                    </select>
                </form>
            </div>

            <!-- formats -->
            <div class="filtre-format">
                <form id="format" class="js-filter-form  colonne">
                    <select id="format-select">
                    <option value="">Formats</option>
                        <option value="all" hidden></option>
                        <option value="all">Tous les formats</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- tri -->
        <div class="filtre-tri">
            <form id="ordre" class="js-filter-form colonne">
                <select id="date-select">
                <option value="">Trier par</option>
                    <option value="all" hidden></option>
                    <option value="DESC">Nouveautés</option>
                    <option value="ASC">Les plus anciennes</option>
                </select>
            </form>
        </div>
    </div>

    <!-- affichage des images  -->
    <?php
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => 1,
    );
    $blog_posts = new WP_Query( $args );
    ?>
    <section class="image-gallery">
    <?php if ($blog_posts->have_posts() ): ?>
        
            <?php while ($blog_posts->have_posts() ): $blog_posts->the_post(); ?>
            <div class="gallery-item">
            <?php get_template_part( 'template-parts/content-photo' ); ?>
            </div>
            <?php endwhile; ?>
        
        </section>
        
        <div class="btn__wrapper">
            <a href="#!" class="loadmore" id="load-more">Load more</a>
        </div>
    <?php endif; ?>
</div>



<?php get_footer(); ?>


