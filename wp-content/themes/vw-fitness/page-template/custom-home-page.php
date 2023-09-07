<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_fitness_above_slider' ); ?>

  <?php if( get_theme_mod( 'vw_fitness_slider_hide_show', false) == 1 || get_theme_mod( 'vw_fitness_resp_slider_hide_show', false) == 1) { ?>
    <section class="slider">
      <?php if(get_theme_mod('vw_fitness_slider_type', 'Default slider') == 'Default slider' ){ ?>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_fitness_slider_speed',4000)) ?>"> 
          <?php $vw_fitness_slider_pages = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'vw_fitness_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $vw_fitness_slider_pages[] = $mod;
              }
            }
            if( !empty($vw_fitness_slider_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $vw_fitness_slider_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>     
          <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h1 class=" wow rollIn delay-1000" data-wow-duration="3s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <p class=" wow slideInRight delay-1000" data-wow-duration="3s"><?php $vw_fitness_excerpt = get_the_excerpt(); echo esc_html( vw_fitness_string_limit_words( $vw_fitness_excerpt, esc_attr(get_theme_mod('vw_fitness_slider_excerpt_number','30')))); ?></p>
                    <?php if( get_theme_mod('vw_fitness_slider_button_text','READ MORE') != ''){ ?>
                      <div class="more-btn wow slideInLeft delay-1000" data-wow-duration="2s">             
                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_fitness_slider_button_text',__('READ MORE','vw-fitness')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_fitness_slider_button_text',__('READ MORE','vw-fitness')));?></span></a>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
          endif;?>
          <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
            <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-fitness' );?></span>
          </a>
          <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
            <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-fitness' );?></span>
          </a>
        </div>  
        <div class="clearfix"></div>
          <?php } else if(get_theme_mod('vw_fitness_slider_type', 'Advance slider') == 'Advance slider'){?>
            <?php echo do_shortcode(get_theme_mod('vw_fitness_advance_slider_shortcode')); ?>
          <?php } ?>s
    </section> 
  <?php }?>

  <?php do_action( 'vw_fitness_below_slider' ); ?>

  <section class="our-services wow zoomInUp delay-1000" data-wow-duration="2s">
    <div class="container">
      <div class="row">
        <?php $vw_fitness_service_page = array();
        for ( $count = 0; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'vw_fitness_servicesettings' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $vw_fitness_service_page[] = $mod;
          }
        }
        if( !empty($vw_fitness_service_page) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_fitness_service_page,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $count = 0;
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="col-lg-3 col-md-6">
                <div class="service-main-box">
                    <h2><?php the_title(); ?></h2>                    
                    <div class="box-content">
                      <?php the_post_thumbnail('full'); ?>
                      <p><?php $vw_fitness_excerpt = get_the_excerpt(); echo esc_html( vw_fitness_string_limit_words( $vw_fitness_excerpt,15 ) ); ?></p>
                      <?php if( get_theme_mod('vw_fitness_services_button_text','READ MORE') != ''){ ?>
                        <div class="more-btn">              
                          <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_fitness_services_button_text',__('READ MORE','vw-fitness')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_fitness_services_button_text',__('READ MORE','vw-fitness')));?></span></a>
                        </div>   
                      <?php } ?>            
                      <div class="clearfix"></div>                   
                    </div>
                </div>
              </div>
            <?php $count++; endwhile; 
            wp_reset_postdata();?>
          <?php else : ?>
              <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <div class="clearfix"></div>
      </div>
    </div> 
  </section>

  <?php do_action( 'vw_fitness_below_services' ); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>