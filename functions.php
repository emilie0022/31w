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

function customize_footer_section($wp_customize) {
    // Section Footer
    $wp_customize->add_section('footer', array(
        'title' => __('Footer', 'textdomain'),
        'priority' => 130,
    ));

    // Adresse du collège
    $wp_customize->add_setting('footer_college_address', array(
        'default' => '123 Rue du Collège, Ville',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_college_address_control', array(
        'label' => __('Adresse du Collège', 'textdomain'),
        'section' => 'footer',
        'settings' => 'footer_college_address',
        'type' => 'text',
    ));

    // Téléphone
    $wp_customize->add_setting('footer_phone', array(
        'default' => '123-456-7890',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_phone_control', array(
        'label' => __('Téléphone', 'textdomain'),
        'section' => 'footer',
        'settings' => 'footer_phone',
        'type' => 'text',
    ));

    // Email
    $wp_customize->add_setting('footer_email', array(
        'default' => 'email@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('footer_email_control', array(
        'label' => __('Courriel', 'textdomain'),
        'section' => 'footer',
        'settings' => 'footer_email',
        'type' => 'email',
    ));

    // Réseaux sociaux : Facebook
    $wp_customize->add_setting('social_facebook_image', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'social_facebook_image_control', array(
        'label' => __('Icône Facebook', 'textdomain'),
        'section' => 'footer',
        'settings' => 'social_facebook_image',
    )));

    $wp_customize->add_setting('social_facebook_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('social_facebook_link_control', array(
        'label' => __('Lien Facebook', 'textdomain'),
        'section' => 'footer',
        'settings' => 'social_facebook_link',
        'type' => 'url',
    ));

    // Réseaux sociaux : Instagram
    $wp_customize->add_setting('social_instagram_image', array(
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'social_instagram_image_control', array(
        'label' => __('Icône Instagram', 'textdomain'),
        'section' => 'footer',
        'settings' => 'social_instagram_image',
    )));

    $wp_customize->add_setting('social_instagram_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('social_instagram_link_control', array(
        'label' => __('Lien Instagram', 'textdomain'),
        'section' => 'footer',
        'settings' => 'social_instagram_link',
        'type' => 'url',
    ));
}
add_action('customize_register', 'customize_footer_section');
