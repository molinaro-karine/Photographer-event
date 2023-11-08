<?php

/**
 * The template for displaying all single posts
 */
?>

<?php get_header(); ?>


<!-- section information et photo de la single-photo -->
<div class="photo-container">
	<div class="photo-info">
		<ul class="info part">
			<li>
				<?php the_title( '<h2 class="photo-titre"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</li>
			<li>
				<p class="ref info-tx">RÉFÉRENCE : <span id="reference"><?php echo get_field('reference'); ?></span></p>
			</li>
			<li>
				<p class="categorie info-tx"></P><?php the_terms( $post->ID, 'categorie-photo', 'CATEGORIE : ' ); ?>
			</li>
			<li>
			<p class="categorie info-tx"></P><?php the_terms( $post->ID, 'format-photo', 'FORMAT : ' ); ?>
			</li>
			<li>
				<p class="type info-tx">TYPE :</p><?php echo get_field('type'); ?>
			</li>
			<li>
				<p class="annee info-tx">ANNÉE :<Emb></Emb>
				</p><?php echo get_field('annee'); ?>
			</li>
		</ul>
	</div>
<?php

/* Start the Loop */
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
</div>
<?php get_footer(); ?>
<script>
