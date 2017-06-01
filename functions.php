<?php
/**
 * gardensanctuaries functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gardensanctuaries
 */

if ( ! function_exists( 'gardensanctuaries_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gardensanctuaries_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gardensanctuaries, use a find and replace
	 * to change 'gardensanctuaries' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gardensanctuaries', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'gardensanctuaries' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gardensanctuaries_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'gardensanctuaries_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gardensanctuaries_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gardensanctuaries_content_width', 640 );
}
add_action( 'after_setup_theme', 'gardensanctuaries_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gardensanctuaries_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gardensanctuaries' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gardensanctuaries' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gardensanctuaries_widgets_init' );

// include custom jQuery
function shapeSpace_include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');
    
/**
 * Enqueue scripts and styles.
 */
function gardensanctuaries_scripts() {
	wp_enqueue_style( 'gardensanctuaries-style-unslider', get_template_directory_uri().'/unslider.css'  );
    wp_enqueue_style( 'gardensanctuaries-style-unslider-dots', get_template_directory_uri().'/unslider-dots.css'  );

    wp_enqueue_style( 'gardensanctuaries-style', get_stylesheet_uri());
    
	wp_enqueue_script( 'gardensanctuaries-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    
    wp_enqueue_script( 'gardensanctuaries-unslider-min', get_template_directory_uri() . '/js/unslider-min.js', array(), '20170215', true );
    
    wp_enqueue_script( 'gardensanctuaries-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170215', true );

	wp_enqueue_script( 'gardensanctuaries-custom', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gardensanctuaries_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/** ------ ALL ADMIN CUSTOMIZATIONS --------- **/
    
/**hide the wordpress icon **/
function kw_admin_remove_wordpress_icon( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
add_filter( 'admin_bar_menu', 'kw_admin_remove_wordpress_icon', 999 );

//remove admin bar when logged in;

add_filter('show_admin_bar', '__return_false');


//Create Options Page

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}


//remove ninjaforms from editing pages

function remove_post_custom_fields() {
	remove_meta_box( 'nf_admin_metaboxes_appendaform' , 'post' , 'normal' ); 
    remove_meta_box( 'nf_admin_metaboxes_appendaform' , 'page' , 'normal' ); 
//    remove_action('add_meta_boxes','ninja_forms_add_custom_box' );
}
add_action( 'do_meta_boxes' , 'remove_post_custom_fields' );


function wpse120418_unregister_categories() {
    register_taxonomy( 'category', array() );
    unregister_widget( 'WP_Widget_Categories' );
}
add_action( 'init', 'wpse120418_unregister_categories' );