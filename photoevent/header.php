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
        <a href="<?php echo home_url('/'); ?>">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="Logo">
        </a>
        <div class="nav-desktop">
            <?php wp_nav_menu([
                'theme_location' => 'main',
                'menu_class' => 'navbar'
            ]);?>
        </div>
    </div>
</header>
    
    <?php wp_body_open(); ?>