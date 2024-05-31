<?php
/**
 * jpremier functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OPS
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Enqueue styles.
 */
function ops_enqueue_scripts()
{
    // Enqueue Font Awesome CSS from the theme directory
    wp_enqueue_style('ops-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/all.min.css', array(), '1.2.0');

    // Enqueue Bootstrap Icons CSS from the theme directory
    wp_enqueue_style('ops-bootstrap-icons', get_template_directory_uri() . '/assets/css/bootstrap-icons/bootstrap-icons.css', array(), '1.2.0');

    // Enqueue Bootstrap CSS from the theme directory
    wp_enqueue_style('ops-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.2.0');

    // Enqueue AOS (Animate On Scroll) CSS from the theme directory
    wp_enqueue_style('ops-aos', get_template_directory_uri() . '/assets/css/aos.css', array(), '1.2.0');

    // Enqueue the main theme stylesheet
    wp_enqueue_style('ops-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.2.0');

    // Enqueue Google Fonts stylesheet
    wp_enqueue_style('ops-google-fonts', 'https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&display=swap', false);

    // Enqueue jQuery if needed (commented out)
    // wp_enqueue_script('jquery');

    // Enqueue jQuery Migrate if needed (commented out)
    // wp_enqueue_script('jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.4.1.min.js', array('jquery'), '3.4.1', true);
}
add_action('wp_enqueue_scripts', 'ops_enqueue_scripts');

/**
 * Enqueue scripts.
 */
function theme_scripts()
{
    // Enqueue imagesloaded
    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/scripts/imagesloaded.pkgd.min.js', array(), '1.2.0', true);

    // Enqueue BigPicture
    wp_enqueue_script('big-picture', get_template_directory_uri() . '/assets/scripts/BigPicture.min.js', array('jquery'), '1.2.0', true);

    // Enqueue purecounter
    wp_enqueue_script('purecounter', get_template_directory_uri() . '/assets/scripts/purecounter.min.js', array('jquery'), '1.2.0', true);

    // Enqueue bootstrap bundle
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/scripts/bootstrap.bundle.min.js', array('jquery'), '1.2.0', true);

    // Enqueue aos
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/scripts/aos.min.js', array('jquery'), '1.2.0', true);

    // Enqueue main
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/scripts/main.js', array('jquery'), '1.2.0', true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');

/**
 * custom-form.js.
 */
function enqueue_custom_scripts() {
    // Enqueue jQuery from WordPress core
    wp_enqueue_script('jquery');

    // Enqueue the custom JavaScript file
    wp_enqueue_script(
        'custom-form-js', 
        get_template_directory_uri() . '/assets/scripts/custom-form.js',
        array('jquery'), 
        null, 
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

/**
 * Register custom post types.
 */
function custom_post()
{
    // Registering custom post type 'teams'
    register_post_type(
        'teams',
        array(
            'labels' => array(
                'name' => 'Teams',
                'singular_name' => 'Team',
            ),
            'hierarchical' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'dfteams'),
            'capability_type' => 'post',
            'has_archive' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-networking',
            'supports' => array('title', 'thumbnail', 'editor', 'page-attributes'),
            'taxonomies' => array('category'),
        )
    );

    // Registering custom post type 'projects'
    register_post_type(
        'projects',
        array(
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
            ),
            'hierarchical' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'projects'),
            'capability_type' => 'post',
            'has_archive' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-portfolio',
            'supports' => array('title', 'thumbnail', 'editor', 'page-attributes'),
            'taxonomies' => array('category'),
        )
    );

    // Registering custom post type 'services'
    register_post_type(
        'services',
        array(
            'labels' => array(
                'name' => 'Services',
                'singular_name' => 'Service',
            ),
            'hierarchical' => false,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'services'),
            'capability_type' => 'post',
            'has_archive' => true,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-admin-tools',
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('category'),
        )
    );
}
add_action('init', 'custom_post');
