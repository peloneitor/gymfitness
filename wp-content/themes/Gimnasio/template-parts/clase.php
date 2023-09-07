<?php
    while( have_posts() ) : the_post();

        the_title('<h1 class="text-center text-primario">','</h1>');
        if(has_post_thumbnail()) {
            the_post_thumbnail('full', array('class' => 'imagen-destacada'));
        }

        
                $hora_de_inicio = get_field('hora_de_inicio');
            $hora_de_finalizacion = get_field('hora_de_finalizacion');
                ?>

                <p class="informacion-clase">
                    <?php the_field('dias_clase'); ?> - 
                    <?php echo $hora_de_inicio. " a ". $hora_de_finalizacion; ?>
                </p>
                <?php
          
         the_content();

    endwhile;