<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Fitness
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
    <div class="container">
        <div class="page-content">
            <h1><?php echo esc_html(get_theme_mod('vw_fitness_404_page_title',__('404 Not Found','vw-fitness')));?></h1>
            <p class="text-404"><?php echo esc_html(get_theme_mod('vw_fitness_404_page_content',__('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','vw-fitness')));?></p>
            <?php if( get_theme_mod('vw_fitness_404_page_button_text','Back to Home Page') != ''){ ?>
                <div class="read-moresec">
                    <a href="<?php echo esc_url( home_url() ); ?>" class="button"><?php echo esc_html(get_theme_mod('vw_fitness_404_page_button_text',__('Back to Home Page','vw-fitness')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_fitness_404_page_button_text',__('Back to Home Page','vw-fitness')));?></span></a>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    <div class="clearfix"></div>
    </div>
</main>

<?php get_footer(); ?>