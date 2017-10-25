<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 01.09.2017
 * Time: 10:58
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'land-format-image' ); ?>>

    <header class="entry-header text-center background-image" style="background-image: url(<?php echo land_get_attachment(); ?>);">

        <?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>

        <div class="entry-excerpt image-caption">
            <?php the_excerpt(); ?>
        </div>

    </header>

    <footer class="entry-footer">

    </footer>

</article>
