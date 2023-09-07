<?php
/**
 * @package VW Fitness
 * @subpackage vw-fitness
 * @since 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_fitness_header_style()
*/

function vw_fitness_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'vw_fitness_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'             => true,
		'flex-height'            => true,
		'admin-preview-callback' => 'vw_fitness_admin_header_image',
	) ) );
}

add_action( 'after_setup_theme', 'vw_fitness_custom_header_setup' );

if ( ! function_exists( 'vw_fitness_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see vw_fitness_header_style_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'vw_fitness_header_style' );
function vw_fitness_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .header .top-header,.page-template-custom-home-page .header .top-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'vw-fitness-basic-style', $custom_css );
	endif;
}
endif; // vw_fitness_header_style