
<section class="hero">
  <h1 class="title"><?php the_title() ?></h1>
  <?php query_posts(
      array(
          'post_type' => 'photo',
          'posts_per_page' => 1,
          'orderby' => 'rand',
          'terms' => 'paysage',
      )
      
  ); ?>
  <?php if (have_posts()) :
      while (have_posts()) :
        the_post(); ?>
          <img class="img-hero" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>"> 
  <?php endwhile;endif; ?>
</section>