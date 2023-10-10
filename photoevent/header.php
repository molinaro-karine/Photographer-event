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
        </div>
    
    <?php wp_body_open(); ?>