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
            <div class="filtres-cat js-filter">
                <form id="categories" class="js-filter-form colonne">
                    <select id="categories-select" name="categories">
                        <option value="">CATÉGORIE</option>
                        <option value="all">Toutes les catégories</option>
                        <option value="reception">Réception</option>
                        <option value="mariage">Mariage</option>
                        <option value="concert">Concert</option>
                        <option value="television">Télévision</option>
                    </select>
                </form>
            </div>
            <!-- formats -->
            <div class="filtre-format">
                <form id="format" class="js-filter-form colonne">
                    <select id="format-select" name="format">
                        <option value="">FORMATS</option>
                        <option value="all">Tous les formats</option>
                        <option value="paysage">Paysage</option>
                        <option value="portrait">Portrait</option>
                    </select>
                </form>
            </div>
        </div>
        <!-- tri par-->
        <div class="filtre-tri">
            <form id="ordre" class="js-filter-form colonne">
                <select id="date-select" name="order">
                    <option value="" selected disabled>Trier par</option>
                    <option value="DESC">Nouveautés</option>
                    <option value="ASC">Les plus anciennes</option>
                </select>
            </form>
        </div>
    </div>

    <!-- affichage des images, définit les paramètres de la requête pour récupérer les articles de type 'photo' -->
    <?php
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 12,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'paged'          => 1,  // Numéro de page initial
    );

    $blog_posts = new WP_Query($args);
    ?>

    <section class="image-gallery">
        <?php if ($blog_posts->have_posts()): ?>
            <?php while ($blog_posts->have_posts()): $blog_posts->the_post(); ?>
                <?php get_template_part('template-parts/content-photo'); ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?> <!-- Réinitialise la requête principale -->
        <?php endif; ?>
    </section>

    <!-- Bouton "Charger plus" pour la pagination infinie -->
    <div class="btn__wrapper">
        <a href="#!" class="loadmore" id="load-more">Charger plus</a>
    </div>
</section>

<?php get_footer(); ?>