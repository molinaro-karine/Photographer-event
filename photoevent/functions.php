<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );


// Fichiers css

// branchement des fichiers CSS
function photoevent_enqueue_styles()
{
    wp_enqueue_style("style", get_template_directory_uri() . '/style.css');
    wp_enqueue_style("style_header", get_template_directory_uri() . '/assets/css/header.css');
}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_styles');