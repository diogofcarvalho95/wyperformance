<?php
/**
 * wyperformance functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wyperformance
 */


if ( ! defined( 'WYPERFORMANCE_VERSION' ) ) {
	define( 'WYPERFORMANCE_VERSION', '0.1.0' );
}

if ( ! defined( 'WYPERFORMANCE_TYPOGRAPHY_CLASSES' ) ) {
	define(
		'WYPERFORMANCE_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'wyperformance_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wyperformance_setup() {

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'wyperformance' ),
				'menu-2' => __( 'Footer Menu', 'wyperformance' ),
			)
		);

		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );
		add_editor_style( 'style-editor-extra.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'wyperformance_setup' );


/**
 * Enqueue scripts and styles.
 */
function wyperformance_scripts() {
	wp_enqueue_style( 'wyperformance-style', get_stylesheet_uri(), array(), WYPERFORMANCE_VERSION );
	wp_enqueue_script( 'wyperformance-script', get_template_directory_uri() . '/js/script.min.js', array(), WYPERFORMANCE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'wyperformance_scripts' );

/**
 * Enqueue the block editor script.
 */
function wyperformance_enqueue_block_editor_script() {
	if ( is_admin() ) {
		wp_enqueue_script(
			'wyperformance-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			WYPERFORMANCE_VERSION,
			true
		);
		wp_add_inline_script( 'wyperformance-editor', "tailwindTypographyClasses = '" . esc_attr( WYPERFORMANCE_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'wyperformance_enqueue_block_editor_script' );


/**
 * Register ACF Blocks
 */
function my_acf_blocks_init() {
    if (function_exists('acf_register_block_type')) {
        // Regista o bloco de galeria slider
        acf_register_block_type(array(
            'name'              => 'slider-gallery',
            'title'             => __('Slider Gallery'),
            'description'       => __('Um bloco com uma galeria de imagens em slider'),
            'render_template'   => 'template-parts/blocks/slider-gallery.php',
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'keywords'          => array('slider', 'gallery', 'imagem'),
            'enqueue_assets'    => function() {
                wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
                wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
                wp_enqueue_script('slider-gallery-js', get_template_directory_uri() . '/js/slider-gallery.js', array('swiper-js'), null, true);
            },
        ));

		// Regista o bloco de listagem de artigos
        acf_register_block_type(array(
            'name'              => 'article-list',
            'title'             => __('Lista de Artigos'),
            'description'       => __('Um bloco que exibe uma lista de artigos'),
            'render_template'   => 'template-parts/blocks/article-list.php',
            'category'          => 'formatting',
            'icon'              => 'list-view',
            'keywords'          => array('artigos', 'posts', 'lista'),
        ));
    }
}
add_action('acf/init', 'my_acf_blocks_init');
