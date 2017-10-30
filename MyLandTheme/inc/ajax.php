<?php
/**
 * Created by PhpStorm.
 * User: Everad
 * Date: 30.10.2017
 * Time: 14:36
 */

add_action('wp_ajax_nopriv_land_save_user_contact_form', 'land_save_contact');
add_action('wp_ajax_land_save_user_contact_form', 'land_save_contact');

function land_save_contact()
{
    $title = wp_strip_all_tags($_POST['name']);
    $email = wp_strip_all_tags($_POST['email']);
    $message = wp_strip_all_tags($_POST['message']);
    $args = array(
        'post_title' => $title,
        'post_content' => $message,
        'post_author' => 1,
        'post_status' => 'publish',
        'post_type' => 'sunset-contact',
        'meta_input' => array(
            '_contact_email_value_key' => $email,
        ),
    );
    $postID = wp_insert_post($args);
    echo $postID;
    die();
}