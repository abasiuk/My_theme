<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 28.08.2017
 * Time: 12:16
 */
$header1 = get_option('section_1_name');
$desc1 = get_option('section_1_desc');
if (empty($desc1)){
    $desc1 = 'This is description';
}
?>
<section class="sect_1">
    <div class="container">
        <h2><?php echo $header1; ?></h2>
        <p class="on-center"><?php echo $desc1; ?></p>
        <div class="row">
            <div class="info clearfix">
                <?php
                    $args = array(
                        'numberposts' => 4,
                        'post_status' => 'publish',
                        );
                    $posts = wp_get_recent_posts($args);
                    foreach ($posts as $post) : ?>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-block main-color" style="background-image:url(<?php if (has_post_thumbnail($post['ID'])) echo wp_get_attachment_url( get_post_thumbnail_id( $post['ID'] ) ); ?>);">
                                <h3><?php echo $post['post_title'];?></h3>
                                <p><?php echo $post['post_excerpt'];?></p>
                                <a href="<?php echo get_permalink($post['ID']); ?>" class="buttons know"><i class="fa fa-plus" aria-hidden="true"></i>Know more</a>
                            </div>
                        </div>

                    <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>