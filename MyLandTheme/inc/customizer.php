<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 29.08.2017
 * Time: 16:44
 */

function land_theme_customizer( $wp_customize ){

    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#ff5c36'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'         => __('Primary color', 'land'),
                'section'       => 'colors',
                'priority'      => 9
            )
        )
    );

    $wp_customize->add_setting(
        'header_bg_color',
        array(
            'default'           => '#f5f5f5'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
                'label'         => __('Header background color', 'land'),
                'section'       => 'background_image',
                'priority'      => 9
            )
        )
    );
}

add_action( 'customize_register', 'land_theme_customizer' );
