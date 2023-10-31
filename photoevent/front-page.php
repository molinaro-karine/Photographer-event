<?php
/**
 * Template Name: ACCUEIL
 *
 * @package WordPress
 * @subpackage nathalie-mota theme
 */

get_header(); ?>

<?php get_template_part( 'template-parts/content-hero' ); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    	<h1><?php the_title(); ?></h1>
    
    	<?php the_content(); ?>

	<?php endwhile; endif; ?>


<?php get_footer(); ?>



