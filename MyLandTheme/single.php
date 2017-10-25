<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 31.08.2017
 * Time: 16:51
 */
get_header(); get_template_part('template-parts/header'); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="container">
                <div class="row">

                    <div class="col-xs-12">

                        <?php

                        if( have_posts() ):

                            while( have_posts() ): the_post();

                                get_template_part( 'template-parts/single', get_post_format() );

                                if ( comments_open() ):
                                    comments_template();
                                endif;

                            endwhile;

                        endif;

                        ?>

                    </div><!-- .col-xs-12 -->

                </div><!-- .row -->
            </div><!-- .container -->


        </main>
    </div><!-- #primary -->

<?php get_footer(); ?>