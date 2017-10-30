<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 22.08.2017
 * Time: 12:19
 */
function land_register_nav_menu() {
    register_nav_menu( 'primary', 'Header Navigation Menu' );

    add_theme_support( 'custom-background' );

    add_theme_support( 'custom-header' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'post-formats', array ('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

    $args = array(
        'width' => 350,
        'height' => 55,
        'flex-width' => false,
        'flex-height' => false,
        'header-text' => array('site-title')
    );
    add_theme_support('custom-logo', $args);
}
add_action( 'after_setup_theme', 'land_register_nav_menu' );

function add_admin_iris_scripts( $hook ){

    // подключаем свой файл скрипта
    wp_enqueue_script('admin.main', get_template_directory_uri() . '/js/admin.main.js', array('wp-color-picker'), false, true );

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script(
        'iris',
        admin_url( 'js/iris.min.js' ),
        array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
        false,
        1
    );
}
add_action( 'admin_enqueue_scripts', 'add_admin_iris_scripts' );

function land_customize_css(){

    $color = '#' . get_header_textcolor();
    $maincolor = get_theme_mod('primary_color', '#000000');
    $header_bg_color = get_theme_mod('header_bg_color', '#f5f5f5');
    ?>
    <style>
        #text-color{
            color: <?php echo $color; ?>;
            border-color: <?php echo $color; ?>;
        }
        .toggle-mnu span, .toggle-mnu span:after, .toggle-mnu span:before{
            background-color: <?php echo $color; ?>;
        }
        .navbar__list li a{
            color: <?php echo $color; ?>;
        }
        .nav-container, .buttons, .main-color, .land-sidebar__title, .tagcloud a, .btn{
            background-color: <?php echo $maincolor; ?>;
        }
        .logo:first-letter, h1 span, h2 span, h3 span, h4 span, h5 span, h6 span, .land-sidebar__content ul li, .land-sidebar__content ul li a {
            color: <?php echo $maincolor; ?>;
        }
        .main-head{
            background-color:  <?php echo $header_bg_color; ?>;
        }

    </style>
    <?php

}
add_action('wp_head', 'land_customize_css');

function land_get_attachment( $num = 1 ){

    $output = '';
    if( has_post_thumbnail() && $num == 1 ):
        $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
    else:
        $attachments = get_posts( array(
            'post_type' => 'attachment',
            'posts_per_page' => $num,
            'post_parent' => get_the_ID()
        ) );
        if( $attachments && $num == 1 ):
            foreach ( $attachments as $attachment ):
                $output = wp_get_attachment_url( $attachment->ID );
            endforeach;
        elseif( $attachments && $num > 1 ):
            $output = $attachments;
        endif;

        wp_reset_postdata();

    endif;

    return $output;
}
function land_create_single_header($img){
    $output = array();
    if (!is_home()){
        $output['hidden'] = 'display: none;';
        $output['header_img'] = 'background: none; min-height: 220px;';
        $output['parallax'] = '';
    }else{
        $output['hidden'] = '';
        $output['header_img'] = 'background: transparent;';
        $output['parallax'] = 'data-parallax="scroll" data-image-src="' . $img . '"';
    }
    return $output;
}
function land_get_embedded_media( $type = array() ){
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed = get_media_embedded_in_content( $content, $type );

    if( in_array( 'audio' , $type) ):
        $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
    else:
        $output = $embed[0];
    endif;

    return $output;
}

/*Sidebar*/

function land_sidebar_init(){

    register_sidebar(array(
            'name' => esc_html("Land Sidebar", "landtheme"),
            'id' => 'land-sidebar',
            'description' => 'Dynamic Sidebar',
            'before_widget' => '<section id="%1$s" class = "land-sidebar__content %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="land-sidebar__title">',
            'after_title' => '</h2>'
        )
    );
}
add_action('widgets_init', 'land_sidebar_init');

function land_tagcloud_font_change($args){
    $args['smallest'] = 12;
    $args['largest'] = 14;

    return $args;
}

add_filter('widget_tag_cloud_args', 'land_tagcloud_font_change');