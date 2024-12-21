<?php

function ajouter_style()
{

    wp_enqueue_style(
        'mon_stlyle',
        get_template_directory_uri() . '/style.css',
        array(),
        filemtime(get_template_directory() . '/style.css')
    );
}

add_action('wp_enqueue_scripts', 'ajouter_style');


function ajout_options()
{
    // Activer le support des menus personnalisés
    add_theme_support('menus');
}

add_action("after_setup_theme", "ajout_options");

/**
 * Modifie la requete principale de WordPress avant qu'elle soit exécuté
 * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
 * Dépendant de la condition initiale on peut filtrer un type particulier de requête
 * Dans ce cas ci nous filtrons la requête de la page d'accueil
 * @param WP_query  $query la requête principal de WP
 */
function modifie_requete_principal( $query ) {
if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
  $query->set( 'category_name', 'cours' );
  $query->set( 'orderby', 'title' );
  $query->set( 'order', 'ASC' );
  }
 }
 add_action( 'pre_get_posts', 'modifie_requete_principal' );



 function theme_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100,  
        'width'       => 300,  
        'flex-height' => true, 
        'flex-width'  => true, 
    ));
}
add_action('after_setup_theme', 'theme_setup');


function enqueue_theme_scripts() {
    wp_enqueue_script(
        'menu-toggle',
        get_template_directory_uri() . '/assets/js/menu.js',
        array(),
        false,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

