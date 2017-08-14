<?php
/**
 * GSR01 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GSR01
 */

if ( ! function_exists( 'gsr01_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gsr01_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on GSR01, use a find and replace
	 * to change 'gsr01' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gsr01', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'gsr01' ),
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
	add_theme_support( 'custom-background', apply_filters( 'gsr01_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'gsr01_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gsr01_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gsr01_content_width', 640 );
}
add_action( 'after_setup_theme', 'gsr01_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gsr01_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gsr01' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gsr01' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gsr01_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gsr01_scripts() {
	wp_enqueue_style( 'gsr01-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gsr01-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gsr01-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gsr01_scripts' );



// Register SoulTemplates
function create_soultemplates() {

	$labels = array(
		'name'                  => _x( 'SoulTemplates', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'SoulTemplate', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'SoulTemplates', 'text_domain' ),
		'name_admin_bar'        => __( 'SoulTemplate', 'text_domain' ),
		'archives'              => __( 'SoulTemplate Archives', 'text_domain' ),
		'attributes'            => __( 'SoulTemplate Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent SoulTemplate:', 'text_domain' ),
		'all_items'             => __( 'All SoulTemplates', 'text_domain' ),
		'add_new_item'          => __( 'Add New SoulTemplate', 'text_domain' ),
		'add_new'               => __( 'Add New SoulTemplate', 'text_domain' ),
		'new_item'              => __( 'New SoulTemplate', 'text_domain' ),
		'edit_item'             => __( 'Edit SoulTemplate', 'text_domain' ),
		'update_item'           => __( 'Update SoulTemplate', 'text_domain' ),
		'view_item'             => __( 'View SoulTemplate', 'text_domain' ),
		'view_items'            => __( 'View SoulTemplates', 'text_domain' ),
		'search_items'          => __( 'Search SoulTemplate', 'text_domain' ),
		'not_found'             => __( 'SoulTemplate Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'SoulTemplate Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into SoulTemplate', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this SoulTemplate', 'text_domain' ),
		'items_list'            => __( 'SoulTemplates list', 'text_domain' ),
		'items_list_navigation' => __( 'SoulTemplate list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter SoulTemplates list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'SoulTemplate', 'text_domain' ),
		'description'           => __( 'A Custom Post Type for the GSR01 Theme', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'revisions', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-editor-kitchensink',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'soultemplate', $args );

}
add_action( 'init', 'create_soultemplates', 0 );





/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function gsr01_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'gsr01_pingback_header' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
