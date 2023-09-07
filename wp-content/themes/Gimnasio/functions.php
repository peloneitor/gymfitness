<?php

//includes

require get_template_directory() . '/includes/widgets.php';
require get_template_directory() . '/includes/queries.php';

function gimnasio_setup() {

    //imagenes destacadas
    add_theme_support('post-thumbnails');

    // Titulos para SEO
    add_theme_support('title_tag');
}
add_action('after_setup_theme', 'gimnasio_setup');


function gimnasio_menus() {
    register_nav_menus( array(
        'menu-principal' => __('Menu-Principal', 'gimnasio')
    ) );
}

add_action('init', 'gimnasio_menus');

function gimnasio_scripts_styles() {
        //Archivos css
    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');
    wp_enqueue_style('lightboxcss', get_template_directory_uri() .'/css/lightbox.min.css', 
    array (), '2.11.4' );
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), '10.0.4');
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0.0' );

    // Archivos Js //
    wp_enqueue_script('jquery');
    wp_enqueue_script('lightboxjs', get_template_directory_uri() .'/js/lightbox.min.js', 
    array(), '2.11.4', true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '10.0.4', true);
    wp_enqueue_script('scripts', get_template_directory_uri() .'/js/scripts.js', 
    array('swiper-js'), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'gimnasio_scripts_styles');

// Definir zona de widgets

function gimnasio_widgets() {
    register_sidebar(array(
        'name' => 'sidebar 1',
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget>',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'sidebar 2',
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget>',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init', 'gimnasio_widgets');

//Crear shortcode
function gimnasio_ubicacion_shortcode() {
    ?>
    <div class="mapa">
        <?php
            if(is_page('contacto')) {
                the_field('ubicacion');
            }
        ?>
    </div>
    <h2 class="text-center text-primary">Formulario de contacto</h2>
    <?php
    echo do_shortcode('[contact-form-7 id="88" title="Formulario de contacto 1"]');
}
add_shortcode('gimnasio_ubicacion', 'gimnasio_ubicacion_shortcode');

/** Imagenes dinamicas como BG */
function gymfitness_hero_imagen() {
// obtener el id de la pagina de inicio
$front_id = get_option('page_on_front');

var_dump($front_id);

//obtener la imagen
$id_imagen = get_field('hero_imagen', $front_id);

var_dump($id_imagen);

//obtener la ruta de la imagen
$imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];


//crear css
wp_register_style('custom', false);
wp_enqueue_style('custom');

$imagen_destacada_css = "
    body.home .header {
         background-image: linear-gradient( rgb(0 0 0 / .75 ), rgb(0 0 0 / .75)), url($imagen);
    }
";

//inyectar css
wp_add_inline_style('custom', $imagen_destacada_css);
}
add_action('init', 'gymfitness_hero_imagen');