<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 01.09.2017
 * Time: 11:25
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'land-format-audio' ); ?>>
    <header class="entry-header">

        <?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>

    </header>

    <div class="entry-content">

        <?php echo land_get_embedded_media( array('audio','iframe') ); ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">
    </footer>

</article>
