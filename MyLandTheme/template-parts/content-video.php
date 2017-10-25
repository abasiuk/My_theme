<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 01.09.2017
 * Time: 11:32
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'land-format-video' ); ?>>

    <header class="entry-header text-center">

        <div class="embed-responsive embed-responsive-16by9">
            <?php echo land_get_embedded_media( array('video','iframe') ); ?>
        </div>

        <?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>

    </header>

    <div class="entry-content">

        <?php if( land_get_attachment() ): ?>

            <a class="standard-featured-link" href="<?php the_permalink(); ?>">
                <div class="standard-featured background-image" style="background-image: url(<?php echo land_get_attachment(); ?>);"></div>
            </a>

        <?php endif; ?>

        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <div class="button-container text-center">
            <a href="<?php the_permalink(); ?>" class="btn btn-land"><?php _e( 'Read More' ); ?></a>
        </div>

    </div><!-- .entry-content -->

    <footer class="entry-footer">
    </footer>

</article>
