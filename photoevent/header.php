<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <?php wp_head(); ?>
</head>

<body>
<header class="header">
    <div class="header-container">
        <a href="<?php echo home_url('/'); ?>"aria-label="Page d'accueil de Nathalie Mota">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="Logo">
        </a>
        <div class="header-nav">
            <?php wp_nav_menu([
                'theme_location' => 'main',
                'menu_class' => 'navbar'
            ]);?>
            <li><a href="#" class="menu-item modal-js" id="myBtn" data-toggle="modal" role="button">CONTACT</a></li>
        </div>
    </div>
</header>
    
<?php get_template_part( 'template-parts/content-modale' ); ?>

    <?php wp_body_open(); ?>