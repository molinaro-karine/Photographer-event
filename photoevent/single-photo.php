<?php

/**
 * The template for displaying all single posts
 */
?>

<?php get_header(); ?>

<!-- section info-photo et la photo -->

<?php
/* Start the Loop */
while (have_posts()) :
	the_post();

	get_template_part('template-parts/content-photo');

endwhile; // End of the loop.
?>
<?php get_footer(); ?>
