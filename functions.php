<?php
/**
 * Parts Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Parts_Store
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'parts_store_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function parts_store_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Parts Store, use a find and replace
		 * to change 'parts-store' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'parts-store', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'parts-store' ),
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
				'parts_store_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'parts_store_setup' );
function register_navwalker(){
	require_once get_template_directory() . '/lib/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function parts_store_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'parts_store_content_width', 640 );
}
add_action( 'after_setup_theme', 'parts_store_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function parts_store_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'parts-store' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'parts-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 1', 'parts-store' ),
			'id'            => 'footer-w-1',
			'description'   => esc_html__( 'Add widgets here.', 'parts-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 2', 'parts-store' ),
			'id'            => 'footer-w-2',
			'description'   => esc_html__( 'Add widgets here.', 'parts-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 3', 'parts-store' ),
			'id'            => 'footer-w-3',
			'description'   => esc_html__( 'Add widgets here.', 'parts-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'parts_store_widgets_init' );
 

/**
 * Enqueue scripts and styles.
 */
function parts_store_scripts() {
	wp_enqueue_style( 'parts-store-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'parts-store-style', 'rtl', 'replace' );

	wp_enqueue_style( 'parts-store-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_script( 'parts-store-bootstrap-bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'parts-store-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'parts_store_scripts' );

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

// Register Product Post Type
function pa_custom_product() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'parts-store' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'parts-store' ),
		'menu_name'             => __( 'Products', 'parts-store' ),
		'name_admin_bar'        => __( 'Product', 'parts-store' ),
		'archives'              => __( 'Product Archives', 'parts-store' ),
		'attributes'            => __( 'Product Attributes', 'parts-store' ),
		'parent_item_colon'     => __( 'Parent Product:', 'parts-store' ),
		'all_items'             => __( 'All Products', 'parts-store' ),
		'add_new_item'          => __( 'Add New Product', 'parts-store' ),
		'add_new'               => __( 'Add New Product', 'parts-store' ),
		'new_item'              => __( 'New Product', 'parts-store' ),
		'edit_item'             => __( 'Edit Product', 'parts-store' ),
		'update_item'           => __( 'Update Product', 'parts-store' ),
		'view_item'             => __( 'View Product', 'parts-store' ),
		'view_items'            => __( 'View Products', 'parts-store' ),
		'search_items'          => __( 'Search Product', 'parts-store' ),
		'not_found'             => __( 'Not found', 'parts-store' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'parts-store' ),
		'featured_image'        => __( 'Featured Image', 'parts-store' ),
		'set_featured_image'    => __( 'Set featured image', 'parts-store' ),
		'remove_featured_image' => __( 'Remove featured image', 'parts-store' ),
		'use_featured_image'    => __( 'Use as featured image', 'parts-store' ),
		'insert_into_item'      => __( 'Insert into Product', 'parts-store' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'parts-store' ),
		'items_list'            => __( 'Products list', 'parts-store' ),
		'items_list_navigation' => __( 'Products list navigation', 'parts-store' ),
		'filter_items_list'     => __( 'Filter Products list', 'parts-store' ),
	);
	$args = array(
		'label'                 => __( 'Product', 'parts-store' ),
		'description'           => __( 'Product Description', 'parts-store' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'pa_custom_product', 0 );
// Register Product Post Type
function pa_custom_supplier() {

	$labels = array(
		'name'                  => _x( 'Supplier', 'Post Type General Name', 'parts-store' ),
		'singular_name'         => _x( 'Supplier', 'Post Type Singular Name', 'parts-store' ),
		'menu_name'             => __( 'Suppliers', 'parts-store' ),
		'name_admin_bar'        => __( 'Supplier', 'parts-store' ),
		'archives'              => __( 'Supplier Archives', 'parts-store' ),
		'attributes'            => __( 'Supplier Attributes', 'parts-store' ),
		'parent_item_colon'     => __( 'Parent Supplier:', 'parts-store' ),
		'all_items'             => __( 'All Suppliers', 'parts-store' ),
		'add_new_item'          => __( 'Add New Supplier', 'parts-store' ),
		'add_new'               => __( 'Add New Supplier', 'parts-store' ),
		'new_item'              => __( 'New Supplier', 'parts-store' ),
		'edit_item'             => __( 'Edit Supplier', 'parts-store' ),
		'update_item'           => __( 'Update Supplier', 'parts-store' ),
		'view_item'             => __( 'View Supplier', 'parts-store' ),
		'view_items'            => __( 'View Suppliers', 'parts-store' ),
		'search_items'          => __( 'Search Supplier', 'parts-store' ),
		'not_found'             => __( 'Not found', 'parts-store' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'parts-store' ),
		'featured_image'        => __( 'Featured Image', 'parts-store' ),
		'set_featured_image'    => __( 'Set featured image', 'parts-store' ),
		'remove_featured_image' => __( 'Remove featured image', 'parts-store' ),
		'use_featured_image'    => __( 'Use as featured image', 'parts-store' ),
		'insert_into_item'      => __( 'Insert into Supplier', 'parts-store' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Supplier', 'parts-store' ),
		'items_list'            => __( 'Suppliers list', 'parts-store' ),
		'items_list_navigation' => __( 'Suppliers list navigation', 'parts-store' ),
		'filter_items_list'     => __( 'Filter Suppliers list', 'parts-store' ),
	);
	$args = array(
		'label'                 => __( 'Supplier', 'parts-store' ),
		'description'           => __( 'Supplier Description', 'parts-store' ),
		'labels'                => $labels,
		'supports'              => array( 'title','thumbnail' ),
		 
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'supplier', $args );

}
add_action( 'init', 'pa_custom_supplier', 0 );
// product list shortcode 

function pa_products_the_shortcode_func() {
    
    ob_start();
 
    // include template with the arguments (The $args parameter was added in v5.5.0)
    get_template_part( 'template-parts/productlistshortcode' );
 
    return ob_get_clean();
 
}
add_shortcode( 'pa_products_list', 'pa_products_the_shortcode_func' );

// product list shortcode 

function pa_supplier_the_shortcode_func() {
    
    ob_start();
 
    // include template with the arguments (The $args parameter was added in v5.5.0)
    get_template_part( 'template-parts/supplierlistscode' );
 
    return ob_get_clean();
 
}
add_shortcode( 'pa_supplier_list', 'pa_supplier_the_shortcode_func' );

// require_once(__DIR__.'./lib/cmb2/init.php');
require_once(__DIR__.'/lib/cmb2/example-functions.php');