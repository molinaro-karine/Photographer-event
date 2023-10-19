<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

 // ajout de la gestion du menu
 add_theme_support('menus');


// Fichiers css

// branchement des fichiers CSS
function photoevent_enqueue_styles()
{
    wp_enqueue_style("style", get_template_directory_uri() . '/style.css');
    wp_enqueue_style("style_header", get_template_directory_uri() . '/assets/css/header.css');
    wp_enqueue_style("style_footer", get_template_directory_uri() . '/assets/css/footer.css');
    wp_enqueue_style("style_contact", get_template_directory_uri() . '/assets/css/contact.css');
}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_styles');

/**
 * Enqueue custom script
 */
function photoevent_enqueue_scripts() {
	// Enqueue custom script
	wp_enqueue_script( 'photo-event-custom-script', get_stylesheet_directory_uri() . '/scripts/script.js', array( 'jquery' ), '1.0', true );
  }
  add_action( 'wp_enqueue_scripts', 'photoevent_enqueue_scripts' );

// Déclarer un emplacement de menu

function register_my_menus()
{
    register_nav_menus(
        array(
            'main' => __('Menu principal'),
            'footer' => __('Bas de page'),
        )
    );
}
add_action('after_setup_theme', 'register_my_menus');