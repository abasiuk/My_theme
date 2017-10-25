<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 22.08.2017
 * Time: 11:13
 */

/*
 *
 *
 * Front-end Enqueue Func
 *
 *
 * */

function land_load_scripts(){

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style('fonts', get_template_directory_uri() . '/css/fonts.css', array(), '1.0.0', 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl-carousel/owl.carousel.css', array(),'1.0.0', 'all');
    wp_enqueue_style('owl-theme', get_template_directory_uri() . '/css/owl-carousel/owl.theme.default.css', array(), '1.0.0', 'all');

    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/css/owl-carousel/owl.carousel.min.js', array('jquery'), '2.0.0', true);
    wp_enqueue_script('parallax', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), '1.4.0', true);

}
add_action( 'wp_enqueue_scripts', 'land_load_scripts' );

function land_admin_scripts(){

    // подключаем свой файл скрипта
    wp_enqueue_script('admin.main', get_template_directory_uri() . '/js/admin.main.js', array('wp-color-picker'), false, true );
    wp_enqueue_style('admin.land', get_template_directory_uri() . '/css/admin.land.css', array(), false, 'all');

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script(
        'color-picker.min',
        admin_url( 'js/color-picker.min.js' ),
        array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
        false,
        1
    );
}
add_action( 'admin_enqueue_scripts', 'land_admin_scripts' );