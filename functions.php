<?php
/**
 * Krohnschein functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Krohnschein
 */

if ( ! function_exists( 'krohnschein_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function krohnschein_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Krohnschein, use a find and replace
		 * to change 'krohnschein' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'krohnschein', get_template_directory() . '/languages' );

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
		add_image_size( 'krohnschein-full-bleed', 2000, 1200, true );
		add_image_size( 'krohnschein-index-img', 1000, 550, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'krohnschein' ),
			'menu-2' => esc_html__( 'Social', 'krohnschein' ),
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
		add_theme_support( 'custom-background', apply_filters( 'krohnschein_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'krohnschein_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function krohnschein_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'krohnschein_content_width', 640 );
}
add_action( 'after_setup_theme', 'krohnschein_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function krohnschein_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'krohnschein' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'krohnschein' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'krohnschein_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function krohnschein_scripts() {
	wp_enqueue_style( 'krohnschein-style', get_stylesheet_uri() );

	wp_enqueue_script( 'krohnschein-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'korhnschein-lightbox', get_template_directory_uri() . '/js/featherlight.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'krohnschein-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'krohnschein_scripts' );

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

function wpdocs_custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
	return sprintf( '%1$s',
		__( '...', 'textdomain' )
	);
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


add_action('admin_init', 'krohnschein_welcome_settings');
function krohnschein_welcome_settings() {
	add_settings_section(
		'krohnschein_settings_section', // Section ID
		'Welcome Message', // Section Title
		'krohnschein_options_callback', // Callback
		'general' // What Page?  This makes the section show up on the General Settings Page
	);

	add_settings_field( // Option 1
		'welcome_title', // Option ID
		'Welcome Title', // Label
		'krohnschein_textbox_callback', // !important - This is where the args go!
		'general', // Page it will be displayed (General Settings)
		'krohnschein_settings_section', // Name of our section
		array( // The $args
			'welcome_title' // Should match Option ID
		)
	);

	add_settings_field( // Option 2
		'welcome_description', // Option ID
		'Welcome paragraph', // Label
		'krohnschein_textbox_callback', // !important - This is where the args go!
		'general', // Page it will be displayed
		'krohnschein_settings_section', // Name of our section (General Settings)
		array( // The $args
			'welcome_description' // Should match Option ID
		)
	);

	register_setting('general','welcome_title', 'esc_attr');
	register_setting('general','welcome_description', 'esc_attr');
}

function krohnschein_options_callback() { // Section Callback
	echo '<p>Compose the welcome Message in the white box, below the hero element</p>';
}

function krohnschein_textbox_callback($args) {  // Textbox Callback
	$option = get_option($args[0]);
	echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}