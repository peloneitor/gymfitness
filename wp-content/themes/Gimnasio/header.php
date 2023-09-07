<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <div class="contenedor | barra-navegacion">
            <div class="logo">
                <a href="<?php echo site_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logotipo">
                </a>
            </div>
             <?php
                $args = array (
                    'theme_location' => 'menu-principal',
                    'container' => 'nav',
                    'container_class' => 'menu-principal'
                );

                wp_nav_menu($args);
            ?>
        </div>
        <?php if(is_front_page()) { ?>
            <div class="tabline text-center">
                <h1>
                    <?php the_field('hero_heading'); ?>
                </h1>
                <p><?php the_field('hero_texto') ?></p>
            </div>
        <?php } ?>

    </header>