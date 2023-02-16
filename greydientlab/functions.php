<?php
/**
 * Greydientlab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package greydientlab
 */

if ( ! defined( '_GL_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_GL_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function greydientlab_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on greydientlab, use a find and replace
		* to change 'greydientlab' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'greydientlab', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'greydientlab' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'greydientlab_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'greydientlab_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function greydientlab_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'greydientlab_content_width', 640 );
}
add_action( 'after_setup_theme', 'greydientlab_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function greydientlab_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'greydientlab' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'greydientlab' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'greydientlab_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function greydientlab_scripts() {
	wp_enqueue_style( 'greydientlab-style', get_stylesheet_uri(), array(), _GL_VERSION );
	wp_style_add_data( 'greydientlab-style', 'rtl', 'replace' );
	wp_enqueue_style( 'components', get_template_directory_uri() . '/frontend/static/css/components.min.css', array(), _GL_VERSION );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/dashbs.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/plugins/slick/slick.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/frontend/static/css/main.min.css', array(), _GL_VERSION );
	wp_enqueue_style('sass',get_template_directory_uri(). '/frontend/resources/sass/main.css',array(), _GL_VERSION);
 
	wp_enqueue_script( 'greydientlab-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _GL_VERSION, true );
	wp_enqueue_script( 'components', get_template_directory_uri() . '/frontend/static/js/components.min.js', array(), _GL_VERSION, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/plugins/slick/slick.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/frontend/static/js/main.min.js', array(), _GL_VERSION, true );

	wp_localize_script(
		'main',
		'ajaxVar',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'ajax-nonce' ),
		)
	);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'greydientlab_scripts' );

/**
 * Enqueues Bootstrap on the frontend and in the block editor.
 */
function enqueue_bootstrap() {
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/plugins/bootstrap/dashbs.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/plugins/slick/slick.css' );

	wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/plugins/slick/slick.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap-scripts', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), '', true );
}
add_action( 'enqueue_block_assets', 'enqueue_bootstrap' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load autoload.
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Load acf blocks.
 */
require get_template_directory() . '/acf/blocks/blocks.php';

/**
 * Load Frontend Components.
 *
 * @param array $directories array of directory.
 */
function load_directories( $directories ) {
	$directories[] = get_template_directory() . '/frontend/components';
	return $directories;
}
add_filter( 'loader_directories', 'load_directories' );

/**
 * Create alias for moxie-lean/loader.
 *
 * @param array $alias array of alias.
 */
function load_alias( $alias ) {
	$alias['atom'] = 'atoms';
		// TODO: Enable alias
		// $alias['molecule'] = 'molecules';
		// $alias['organism'] = 'organisms';
		// $alias['template'] = 'templates';
		return $alias;
}
add_filter( 'loader_alias', 'load_alias' );

/**
 * Load acf fields.
 */
require get_template_directory() . '/acf/custom-fields/fields.php';

function custom_footer_widget_one(){
	$args = array(
		'id' => 'footer-widget-col-one',
		'name' => __('Footer Column One','text_domain'),
		'description' => __('Column One','text_domain'),
		'before_title' => '<h3 class="title" style="color:#d92e27;">',
		'after_title' => '</h3>',
		'before_widget' =>'<div id ="%1s" class="widget %2$s"',
		'after_widget' =>'</div>'

	);
	register_sidebar($args);
}
add_action('widgets_init','custom_footer_widget_one');

function custom_footer_widget_two(){
	$args = array(
		'id' =>'footer-widget-col-two',
		'name' => 'Footer Column Two','text_domain',
		'description' => 'Column Two','text_domain',
		'before_title' =>'<h3 class="title" style="color:#d92e27;">',
		'after_title' =>'</h3>',
		'before_widget' =>'<div id ="%1s" class="widget %2$s"',
		'after_widget' =>'</div>'

	);
	register_sidebar($args);


}
add_action('widgets_init','custom_footer_widget_two');

function custom_footer_widget_three(){
	$args = array(
		'id' =>'footer-widget-col-three',
		'name' => 'Footer Column Three','text_domain',
		'description' => 'Column Three','text_domain',
		'before_title' =>'<h3 class="title" style="color:#d92e27;">',
		'after_title' =>'</h3>',
		'before_widget' =>'<div id ="%1s" class="widget %2$s"',
		'after_widget' =>'</div>'

	);
	register_sidebar($args);


}
add_action('widgets_init','custom_footer_widget_three');

function custom_footer_widget_four(){
	$args = array(
		'id' =>'footer-widget-col-four',
		'name' => 'Footer Column Four','text_domain',
		'description' => 'Column Four','text_domain',
		'before_title' =>'<h4 class="title" style="color:#d92e27;">',
		'after_title' =>'</h4>',
		'before_widget' =>'<div id ="%1s" class="widget %2$s"',
		'after_widget' =>'</div>'

	);
	register_sidebar($args);


}

add_action('widgets_init','custom_footer_widget_four');

function terms_and_policy(){
	$args = array(
		'id' =>'terms-and-policy',
		'name' => 'Terms and Policy Section','text_domain',
		'description' => 'Terms and Policy Section','text_domain',
		'before_title' =>'<h4 class="title" style="color:#d92e27;">',
		'after_title' =>'</h4>',
		'before_widget' =>'<div id ="%1s" class="widget %2$s"',
		'after_widget' =>'</div>'

	);
	register_sidebar($args);


}
add_action('widgets_init','terms_and_policy');