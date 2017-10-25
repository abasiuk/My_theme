<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 31.08.2017
 * Time: 16:56
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('land-single-post'); ?>>
    <header class="entry-header text-center">

        <?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>

    </header>

    <div class="entry-content">

        <?php if( land_get_attachment() ): ?>

                <div class="standard-featured background-image" style="background-image: url(<?php echo land_get_attachment(); ?>);"></div>

        <?php endif; ?>

        <div class="entry-excerpt">
            <?php the_content(); ?>
        </div>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

    </footer>

</article>
