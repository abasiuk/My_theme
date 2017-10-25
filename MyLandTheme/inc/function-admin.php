<?php
/*
 *
 *
 * @LandTheme
 * ADMIN PAGE
 *
 *
 *
 * */

function land_add_admin_page(){
    add_menu_page('Land Theme Options', 'LandTheme', 'manage_options', 'abasiuk_land', 'land_theme_create_page', get_template_directory_uri() . '/image/land-icon.png', 110);

    add_submenu_page('abasiuk_land', 'Land Theme Options', 'Settings', 'manage_options', 'abasiuk_land', 'land_theme_create_page');

    add_action('admin_init', 'land_custom_settings');
}

add_action('admin_menu', 'land_add_admin_page');

function land_custom_settings(){
    register_setting('land-settings-group', 'activate_land');
    register_setting('land-settings-group', 'section_1');
    register_setting('land-settings-group', 'section_2');
    register_setting('land-settings-group', 'section_1_name');
    register_setting('land-settings-group', 'section_1_desc');

    add_settings_section('land-main-options', 'Theme Options', 'land_main_options', 'abasiuk_land');

    add_settings_field('activate-land', 'Activate Landing Page as Home Page?', 'land_activate_page','abasiuk_land' ,'land-main-options');
    add_settings_field('section-1', 'Activate Section 1?', 'land_activate_sect_1', 'abasiuk_land', 'land-main-options' );
    add_settings_field('sname-1', 'Enter the name for Section 1:', 'land_section_1_name', 'abasiuk_land', 'land-main-options');
    add_settings_field('sdesc-1', 'Enter the description for Section 1:', 'land_section_1_desc', 'abasiuk_land', 'land-main-options');
    add_settings_field('section-2', 'Activate Section 2?', 'land_activate_sect_2', 'abasiuk_land', 'land-main-options' );

}

//Land Main Settings

function land_main_options(){
    echo 'Custom Main Options';
}

function land_section_1_desc(){
    $value = esc_attr( get_option( 'section_1_desc' ) );
    echo '<input name="section_1_desc" type="text" class="section_1_desc" value="'. $value .'"/>';
}
function land_section_1_name(){
    $value = esc_attr( get_option( 'section_1_name' ) );
    echo '<input name="section_1_name" type="text" class="section_1_name" value="'. $value .'"/>';
}

function land_activate_page(){
    $options = get_option( 'activate_land' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="activate_land" name="activate_land" value="1" '.$checked.' /></label>';
}

function land_activate_sect_1(){
    $options = get_option( 'section_1' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="section_1" name="section_1" value="1" '.$checked.' /></label>';
}

function land_activate_sect_2(){
    $options = get_option( 'section_2' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="section_2" name="section_2" value="1" '.$checked.' /></label>';
}


// Template submenu functions
function land_theme_create_page(){
    //generation of our admin page
    require_once ( get_template_directory() . '/inc/templates/land-admin.php' );
}
