<?php 

// Ajoute la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajoute automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

 // ajout de la gestion du menu
 add_theme_support('menus');

 //Format d'images
 add_image_size('photo-size', 500, 500, true);


// Fichiers css

// branchement des fichiers CSS
function photoevent_enqueue_styles(){
//Chargement du style personnalisé du theme
    wp_enqueue_style( 'nathalie-mota-style', get_stylesheet_uri(), array(), '1.0' );    
    
//Chargement de style personnalisé pour le theme
    wp_enqueue_style("style", get_template_directory_uri() . '/style.css');
    wp_enqueue_style("style_header", get_template_directory_uri() . '/assets/css/header.css');
    wp_enqueue_style("style_footer", get_template_directory_uri() . '/assets/css/footer.css');
    wp_enqueue_style("style_contact", get_template_directory_uri() . '/assets/css/contact.css');
    wp_enqueue_style("style_hero", get_template_directory_uri() . '/assets/css/hero.css');
    wp_enqueue_style("style_front-page", get_template_directory_uri() . '/assets/css/front-page.css');
    wp_enqueue_style("style_photo", get_template_directory_uri() . '/assets/css/single-photo.css');
    wp_enqueue_style("style_lightbox", get_template_directory_uri() . '/assets/css/lightbox.css');
    wp_enqueue_style('select2', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css');

}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_styles');

/**
 * Enqueue custom script
 */
function photoevent_scripts() {
// Charge les fichiers JavaScripts via la fonction WordPress  wp_enqueue_script()
  wp_enqueue_script( 'photoevent', get_stylesheet_directory_uri() . '/scripts/script.js', array( 'jquery' ), '1.0.0', true );
  wp_enqueue_script( 'infinite-pagination', get_stylesheet_directory_uri() . '/scripts/infinite-pagination.js', array( 'jquery' ), '1.0.0', true );
  wp_enqueue_script( 'lightbox', get_stylesheet_directory_uri() . '/scripts/lightbox.js', array( 'jquery' ), '1.0.0', true );
  wp_enqueue_script( 'filter', get_stylesheet_directory_uri() . '/scripts/filter.js', array( 'jquery' ), '1.0.0', true );
  wp_enqueue_script( 'slide', get_stylesheet_directory_uri() . '/scripts/slide-photo.js', array( 'jquery' ), '1.0.0', true );
  wp_enqueue_script('select2', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js', array('jquery'), '4.0.13', true);
 
  
  //vérifie si la page actuelle utilise le modèle 'single-photo.php', et si c'est le cas, il ajoute le script 'slide-photo.js
  if(is_page_template('single-photo.php')){
    wp_enqueue_script( 'slide', get_stylesheet_directory_uri() . '/scripts/slide-photo.js', array( 'jquery' ), '1.0.0', true );
    }

    // Transmet la valeur de référence depuis PHP au script JavaScript
    $reference_value = get_field('reference', $post_id);
    wp_localize_script('photoevent', 'reference_data', array(
    'reference_value' => esc_attr($reference_value)
));

    //Partage et passe des données de PHP vers JavaScript de manière sécurisée
    wp_localize_script('photoevent', 'photoevent_js', array(
        'ajax_url' => admin_url('admin-ajax.php')));

  }
  
  add_action( 'wp_enqueue_scripts', 'photoevent_scripts' );

// Déclare un emplacement de menu

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



//Fonction PHP pour gerer la requête Ajax pour la pagination

function load_more_posts() {
  $page = $_POST['page'];
  $exclude_ids = isset($_POST['exclude_ids']) ? explode(',', $_POST['exclude_ids']) : [];

  $args = array(
    'post_type'      => 'photo',
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged'          => $page,
    'post__not_in'   => $exclude_ids, // Exclure les IDs déjà chargés
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
      get_template_part('template-parts/content-photo');
    endwhile;
  endif;

  wp_die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');



// Filtres
function filter_photos() {
  $selectedCategory = isset($_POST['selectedCategory']) ? $_POST['selectedCategory'] : '';
  $selectedFormat = isset($_POST['selectedFormat']) ? $_POST['selectedFormat'] : '';
  $selectedOrder = isset($_POST['selectedOrder']) ? $_POST['selectedOrder'] : 'DESC';

  $args = array(
      'post_type'      => 'photo',
      'posts_per_page' => 12,
      'orderby'        => 'date',
      'order'          => $selectedOrder,
      'paged'          => 1,
  );

  if ($selectedCategory && $selectedCategory !== 'all') {
      $args['tax_query'] = array(
          array(
              'taxonomy' => 'categorie-photo',
              'field'    => 'slug',
              'terms'    => $selectedCategory,
          ),
      );
  }

  if ($selectedFormat && $selectedFormat !== 'all') {
      $args['tax_query'][] = array(
          'taxonomy' => 'format-photo', 
          'field'    => 'slug',
          'terms'    => $selectedFormat,
      );
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();
          get_template_part('template-parts/content-photo');
      endwhile;
  else :
      echo 'Aucune photo trouvée.';
  endif;

  wp_die();
}

add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');