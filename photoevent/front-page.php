<?php
/**
 * Template Name: ACCUEIL
 *
 * @package WordPress
 * @subpackage nathalie-mota theme
 */


// Récupére les termes de la taxonomie 'categorie-photo'
$categories = get_terms(array(
    'taxonomy' => 'categorie-photo',
    'hide_empty' => false, // Inclure les termes même s'ils n'ont pas de posts associés
));

// Récupére les termes de la taxonomie 'format-photo'
$formats = get_terms(array(
    'taxonomy' => 'format-photo',
    'hide_empty' => false,
));

get_header(); ?>
<?php get_template_part( 'template-parts/content-hero' ); ?>

<!-- Selects qui permettent de filtrer et trier les photos-->
<section class="galerie">
    <div class="filtres-container">
        <div class="filtres">
            <!-- Catégories -->
            <select id="categories-select" name="categories" class="js-filter-form colonne">
                <option value="">CATÉGORIE</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></option>
                <?php endforeach; ?>
            </select>
            <!-- Formats -->
            <div class="filtre-format">
                <select id="format-select" name="format" class="js-filter-form colonne">
                    <option value="">FORMATS</option>
                    <?php foreach ($formats as $format) : ?>
                        <option value="<?php echo esc_attr($format->slug); ?>"><?php echo esc_html($format->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <!-- Trier -->
        <div class="filtre-tri">
            <select id="date-select" name="order" class="js-filter-form colonne">
                <option value="">TRIER PAR</option>
                <option value="DESC">Nouveautés</option>
                <option value="ASC">Les plus anciennes</option>
            </select>
        </div>
    </div>

    <!-- Affichage des images, définit les paramètres de la requête pour récupérer les articles de type 'photo' -->
    <?php
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 12,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'paged'          => 1,
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
