<?php
/**
 * VW Fitness functions and definitions
 *
 * @package VW Fitness
 */
/* Breadcrumb Begin */
function vw_fitness_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}

if (!function_exists('vw_fitness_setup')):
function vw_fitness_setup() {

	$GLOBALS['content_width'] = apply_filters('vw_fitness_content_width', 640);

	load_theme_textdomain('vw-fitness', get_template_directory().'/languages');

	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support('title-tag');
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support('custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	));
	add_image_size('vw-fitness-homepage-thumb', 240, 145, true);
	register_nav_menus(array(
			'primary' => __('Primary Menu', 'vw-fitness'),
			'footer'  => __('Footer Menu', 'vw-fitness'),
		));
	add_theme_support('custom-background', array(
			'default-color' => 'f1f1f1',
		));

	//selective refresh for sidebar and widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support('post-formats', array('image', 'video', 'gallery', 'audio', ));

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style(array('css/editor-style.css', vw_fitness_font_url()));

	// Theme Activation Notice
	global $pagenow;

	if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
		add_action('admin_notices', 'vw_fitness_activation_notice');
	}

	// Theme Activation Redirects To Get Started Page
	if (is_admin() && ('themes.php' == $pagenow) && isset($_GET['activated']) && wp_get_theme()->get('TextDomain') === 'vw-fitness') {
		wp_redirect(admin_url('themes.php?page=vw_fitness_guide'));
	}
}
endif;// vw_fitness_setup
add_action('after_setup_theme', 'vw_fitness_setup');

// Notice after Theme Activation
function vw_fitness_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
		echo '<p>'.esc_html__('Thank you for choosing VW Fitness theme. Would like to have you on our Welcome page so that you can reap all the benefits of our VW Fitness theme.', 'vw-fitness').'</p>';
		echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=vw_fitness_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'vw-fitness' ) .'</a></span>';
		echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/vw-fitness-theme/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'vw-fitness' ) .'</a></span>';
		echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.vwthemes.com/premium/gym-fitness-wordpress-theme/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE PRO', 'vw-fitness' ) .'</a></span>';
	echo '</div>';
}

function vw_fitness_widgets_init() {
	register_sidebar(array(
		'name'          => __('Blog Sidebar', 'vw-fitness'),
		'description'   => __('Appears on blog page sidebar', 'vw-fitness'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Page Sidebar', 'vw-fitness'),
		'description'   => __('Appears on page sidebar', 'vw-fitness'),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Third Column Sidebar', 'vw-fitness'),
		'description'   => __('Appears on page sidebar', 'vw-fitness'),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer 1', 'vw-fitness'),
		'description'   => __('Appears on footer', 'vw-fitness'),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer 2', 'vw-fitness'),
		'description'   => __('Appears on footer', 'vw-fitness'),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer 3', 'vw-fitness'),
		'description'   => __('Appears on footer', 'vw-fitness'),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Footer 4', 'vw-fitness'),
		'description'   => __('Appears on footer', 'vw-fitness'),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => __( 'Social Icon', 'vw-fitness' ),
		'description'   => __( 'Appears on topbar', 'vw-fitness' ),
		'id'            => 'social-icon',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'vw-fitness' ),
		'description'   => __( 'Appears on shop page', 'vw-fitness' ),
		'id'            => 'woocommerce-shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Sidebar', 'vw-fitness' ),
		'description'   => __( 'Appears on single product page', 'vw-fitness' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Social Icon', 'vw-fitness' ),
		'description'   => __( 'Appears on right side footer', 'vw-fitness' ),
		'id'            => 'footer-icon',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) ); 

}
add_action('widgets_init', 'vw_fitness_widgets_init');

function vw_fitness_font_url() {
	$font_url      = '';
	$font_family   = array(
		'ABeeZee:ital@0;1', 
	 	'Abril+Fatface',
	 	'Acme',
	 	'Alfa+Slab+One',
	 	'Allura',
	 	'Anton',
	 	'Architects+Daughter',
	 	'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
	 	'Arvo:ital,wght@0,400;0,700;1,400;1,700',
	 	'Alegreya+Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900',
	 	'Asap:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Assistant:wght@200;300;400;500;600;700;800',
	 	'Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	 	'Bangers',
	 	'Boogaloo',
	 	'Bad+Script',
	 	'Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Bree+Serif',
	 	'BenchNine:wght@300;400;700',
	 	'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Cardo:ital,wght@0,400;0,700;1,400',
	 	'Courgette',
	 	'Caveat+Brush',
	 	'Cherry+Swash:wght@400;700',
	 	'Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
	 	'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
	 	'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Cookie',
	 	'Coming+Soon',
	 	'Charm:wght@400;700',
	 	'Chewy',
	 	'Days+One',
	 	'DM+Serif+Display:ital@0;1',
	 	'Dosis:wght@200;300;400;500;600;700;800',
	 	'EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800',
	 	'Economica:ital,wght@0,400;0,700;1,400;1,700',
	 	'Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Fredoka+One',
	 	'Fjalla+One',
	 	'Frank+Ruhl+Libre:wght@300;400;500;700;900',
	 	'Gabriela',
	 	'Gloria+Hallelujah',
	 	'Great+Vibes',
	 	'Handlee',
	 	'Hammersmith+One',
	 	'Heebo:wght@100;200;300;400;500;600;700;800;900',
	 	'Hind:wght@300;400;500;600;700',
	 	'Inconsolata:wght@200;300;400;500;600;700;800;900',
	 	'Indie+Flower',
	 	'IM+Fell+English+SC',
	 	'Julius+Sans+One',
	 	'Jomhuria',
	 	'Josefin+Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	 	'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	 	'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Kaushan+Script',
	 	'Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
	 	'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
	 	'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Libre+Baskerville:ital,wght@0,400;0,700;1,400',
	 	'Literata:ital,opsz,wght@0,7..72,200;0,7..72,300;0,7..72,400;0,7..72,500;0,7..72,600;0,7..72,700;0,7..72,800;0,7..72,900;1,7..72,200;1,7..72,300;1,7..72,400;1,7..72,500;1,7..72,600;1,7..72,700;1,7..72,800;1,7..72,900',
	 	'Lobster',
	 	'Lobster+Two:ital,wght@0,400;0,700;1,400;1,700',
	 	'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
	 	'Marck+Script',
	 	'Marcellus',
	 	'Merienda+One',
	 	'Monda:wght@400;700',
	 	'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
	 	'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700',
	 	'Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
	 	'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
	 	'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Overpass+Mono:wght@300;400;500;600;700',
	 	'Oxygen:wght@300;400;700',
	 	'Oswald:wght@200;300;400;500;600;700',
	 	'Orbitron:wght@400;500;600;700;800;900',
	 	'Patua+One',
	 	'Pacifico',
	 	'Padauk:wght@400;700',
	 	'Playball',
	 	'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'PT+Sans:ital,wght@0,400;0,700;1,400;1,700',
	 	'PT+Serif:ital,wght@0,400;0,700;1,400;1,700',
	 	'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
	 	'Permanent+Marker',
	 	'Poiret+One',
	 	'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Prata',
	 	'Quicksand:wght@300;400;500;600;700',
	 	'Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700',
	 	'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
	 	'Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	 	'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
	 	'Ropa+Sans:ital@0;1',
	 	'Russo+One',
	 	'Righteous',
	 	'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Satisfy',
	 	'Sen:wght@400;700;800',
	 	'Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
	 	'Shadows+Into+Light+Two',
	 	'Shadows+Into+Light',
	 	'Sacramento',
	 	'Sail',
	 	'Shrikhand',
	 	'Staatliches',
	 	'Stylish',
	 	'Tangerine:wght@400;700',
	 	'Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700',
	 	'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
	 	'Unica+One',
	 	'VT323',
	 	'Varela+Round',
	 	'Vampiro+One',
	 	'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
	 	'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Yanone+Kaffeesatz:wght@200;300;400;500;600;700',
	 	'ZCOOL+XiaoWei'
	);
	
	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

function vw_fitness_scripts() {
	wp_enqueue_style('vw-fitness-font', vw_fitness_font_url(), array());
	wp_enqueue_style('vw-fitness-block-style', get_theme_file_uri('/css/blocks.css') );
	wp_enqueue_style( 'vw-fitness-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	wp_enqueue_style('bootstrap-style', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('vw-fitness-basic-style', get_stylesheet_uri());
	require get_parent_theme_file_path( '/inline-style.php' );
	wp_add_inline_style( 'vw-fitness-basic-style',$vw_fitness_custom_css );
	wp_style_add_data('vw-fitness-style', 'rtl', 'replace');
	wp_enqueue_style('font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css');
	wp_enqueue_script('tether-js', get_template_directory_uri().'/js/tether.js', array('jquery'), '', true);
	wp_enqueue_script('vw-fitness-custom-jquery', get_template_directory_uri().'/js/custom.js', array('jquery'));
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.js', array('jquery'));
	wp_enqueue_script( 'jquery-superfish-js', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	if (get_theme_mod('vw_fitness_animation', true) == true){
		wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.js', array('jquery') );
		wp_enqueue_style( 'animate-css', get_template_directory_uri().'/css/animate.css' );
    }

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'vw_fitness_scripts');

/**
 * Enqueue block editor style
 */
function vw_fitness_block_editor_styles() {
	wp_enqueue_style( 'vw-fitness-font', vw_fitness_font_url(), array() );
    wp_enqueue_style( 'vw-fitness-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
}
add_action( 'enqueue_block_editor_assets', 'vw_fitness_block_editor_styles' );


define('VW_FITNESS_SUPPORT',__('https://wordpress.org/support/theme/vw-fitness/', 'vw-fitness'));
define('VW_FITNESS_FREE_THEME_DOC',__('https://www.vwthemesdemo.com/docs/free-vw-fitness/', 'vw-fitness'));
define('VW_FITNESS_REVIEW',__('https://wordpress.org/support/theme/vw-fitness/reviews/', 'vw-fitness'));
define('VW_FITNESS_BUY_NOW',__('https://www.vwthemes.com/themes/gym-fitness-wordpress-theme/', 'vw-fitness'));
define('VW_FITNESS_LIVE_DEMO',__('https://www.vwthemes.net/vw-fitness-theme/', 'vw-fitness'));
define('VW_FITNESS_PRO_DOC',__('https://www.vwthemesdemo.com/docs/vw-fitness-pro/', 'vw-fitness'));
define('VW_FITNESS_FAQ',__('https://www.vwthemes.com/faqs/', 'vw-fitness'));
define('VW_FITNESS_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/', 'vw-fitness'));
define('VW_FITNESS_CONTACT',__('https://www.vwthemes.com/contact/', 'vw-fitness'));
define('VW_FITNESS_CREDIT',__('https://www.vwthemes.com/themes/wp-gym-fitness-wordpress-theme/', 'vw-fitness'));

if (!function_exists('vw_fitness_credit')) {
	function vw_fitness_credit() {
		echo "<a href=".esc_url(VW_FITNESS_CREDIT)." target='_blank'>".esc_html__('Fitness WordPress Theme', 'vw-fitness')."</a>";
	}
}

/*radio button sanitization*/
function vw_fitness_sanitize_choices($input, $setting) {
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	if (array_key_exists($input, $control->choices)) {
		return $input;
	} else {
		return $setting->default;
	}
}

function vw_fitness_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function vw_fitness_sanitize_number_range( $number, $setting ) {
	$number = absint( $number );
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function vw_fitness_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

/* Excerpt Limit Begin */
function vw_fitness_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'vw_fitness_loop_columns');
	if (!function_exists('vw_fitness_loop_columns')) {
	function vw_fitness_loop_columns() {
		return get_theme_mod( 'vw_fitness_products_per_row', '3' ); 
		// 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'vw_fitness_products_per_page' );
function vw_fitness_products_per_page( $cols ) {
  	return  get_theme_mod( 'vw_fitness_products_per_page',9);
}

function vw_fitness_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function vw_fitness_logo_title_hide_show(){
	if(get_theme_mod('vw_fitness_logo_title_hide_show') == '1' ) {
		return true;
	}
	return false;
}

function vw_fitness_tagline_hide_show(){
	if(get_theme_mod('vw_fitness_tagline_hide_show',0) == '1' ) {
		return true;
	}
	return false;
}

add_action( 'wp_ajax_vw_fitness_reset_all_settings', 'vw_fitness_reset_all_settings' );
function vw_fitness_reset_all_settings() {
	remove_theme_mod( 'vw_fitness_footer_copy' );
	wp_send_json_success(
		array(
			'success' => true,
			'message' => "Reset Completed",
		)
	);
}

//Active Callback
function vw_fitness_default_slider(){
	if(get_theme_mod('vw_fitness_slider_type', 'Default slider') == 'Default slider' ) {
		return true;
	}
	return false;
}

function vw_fitness_advance_slider(){
	if(get_theme_mod('vw_fitness_slider_type', 'Default slider') == 'Advance slider' ) {
		return true;
	}
	return false;
}

function vw_fitness_blog_post_featured_image_dimension(){
	if(get_theme_mod('vw_fitness_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/* Implement the Custom Header feature. */
require get_template_directory().'/inc/custom-header.php';

/* Customizer additions.*/
require get_template_directory().'/inc/customizer.php';

/* Implement the About theme page */
require get_template_directory().'/inc/getting-started/getting-started.php';

/* Social Social Widgets */
require get_template_directory() . '/inc/themes-widgets/social-icon.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/about-us-widget.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/contact-us-widget.php';

/* typography */
require get_template_directory() . '/inc/typography/ctypo.php';

/* Block Pattern */
require get_template_directory() . '/inc/block-patterns/block-patterns.php';

/* TGM Plugin Activation */
require get_template_directory() . '/inc/tgm/tgm.php';

/* Plugin Activation */
require get_template_directory() . '/inc/getting-started/plugin-activation.php';

/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';