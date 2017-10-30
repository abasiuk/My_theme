<?php
    get_header();

    $activateLand = get_option( 'activate_land' );
    $options1 = get_option( 'section_1' );
    get_template_part('template-parts/header');
    if ($activateLand) :
        if ($options1){
            get_template_part('template-parts/landing-page/land-section-1');
        }
        ?>
    <?php else : ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <div class="container land-posts-container">
                    <div class="row">
                        <div class="col-md-9">
                            <?php

                            if( have_posts() ):

                                while( have_posts() ): the_post();

                                    /*
                                    $class = 'reveal';
                                    set_query_var( 'post-class', $class );
                                    */
                                    get_template_part( 'template-parts/content', get_post_format() );

                                endwhile;

                            endif;

                            ?>
                        </div>
                        <div class="col-md-3">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>

                </div><!-- .container -->

            </main>
        </div><!-- #primary -->

    <?php endif; ?>

<?php get_footer(); ?>