<!-- intégration image medium 1/1 -->

<?php

$thumbnail_id = get_post_thumbnail_id();
$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'custom-size');





?>


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

	<div class="gallery-photo">
    <div class="gallery-img size-img">
        <img id="img-fullscreen" class="img-hover" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_alt; ?>" title="<?php echo $article_title; ?>">
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
                <p class="gallery-cat"><?php echo the_terms(get_the_ID(), 'categories', false); ?></p>
            </div>
        </div>
    </div>
</div>
</div>