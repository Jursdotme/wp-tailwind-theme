<?php

/**
 * Steffen Sten functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Steffen_Sten
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('steffensten_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function steffensten_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Steffen Sten, use a find and replace
		 * to change 'steffensten' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('steffensten', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'steffensten'),
				'menu-2' => esc_html__('Mobile Primary', 'steffensten'),
				'menu-2b' => esc_html__('Mobile Secondary', 'steffensten'),
				'menu-3' => esc_html__('Footer', 'steffensten'),
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
				'steffensten_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

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
endif;
add_action('after_setup_theme', 'steffensten_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function steffensten_content_width() {
	$GLOBALS['content_width'] = apply_filters('steffensten_content_width', 640);
}
add_action('after_setup_theme', 'steffensten_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function steffensten_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'steffensten'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'steffensten'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'steffensten_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function steffensten_scripts() {
	wp_enqueue_style('steffensten-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION);
	wp_enqueue_style('raleway-font', 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700;800&display=swap', array(), _S_VERSION);
	
	wp_enqueue_script('alpine', 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js', null, null, true);
	wp_enqueue_script('axios', 'https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js', null, null, true);
	wp_enqueue_script('vuejs', 'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js', array('axios'), null, true);
	wp_enqueue_script('reffilter', get_template_directory_uri() . '/js/reference-filter.js', array('vuejs'), null, true);
}
add_action('wp_enqueue_scripts', 'steffensten_scripts');

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
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Nav Walkers
 */
require get_template_directory() . '/inc/MainNavWalker.php';
require get_template_directory() . '/inc/MobileNavWalker.php';
require get_template_directory() . '/inc/MobileSecondaryNavWalker.php';
require get_template_directory() . '/inc/FooterNavWalker.php';

/**
 * Disable Gutenberg on certain places
 */
require get_template_directory() . '/inc/disableEditors.php';

/**
 * Register support for Gutenberg wide images in your theme
 */
function gutenberg_width_support() {
	add_theme_support('align-wide');
}
add_action('after_setup_theme', 'gutenberg_width_support');

/**
 * Get Gutenberg colors
 */
require get_template_directory() . '/inc/gutenbergColors.php';

/**
 * Get post pagination
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Get ACF blocks
 */
require get_template_directory() . '/inc/acf-blocks.php';

/**
 * Add image sizes
 */
add_image_size('icon', 96, 96, true); // 220 pixels wide by 180 pixels tall, hard crop mode
add_image_size('employee', 330, 440, false); // 220 pixels wide by 180 pixels tall, hard crop mode



/**
 * Get raference archive custom query
 */
require get_template_directory() . '/inc/reference-archive-query.php';



/**
 * Implement ref filter rest endpoint.
 */
require get_template_directory() . '/inc/reference-rest-endpoint.php';