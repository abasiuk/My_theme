<?php
/*
 *
 *
 * Header
 *
 *
 * */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php bloginfo( 'name' ); wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; wp_head(); ?>
</head>
<?php $add_class = ''; $header_bg = ''; if (!is_home()){ $add_class = 'main_bg'; $header_bg = get_header_image(); } ?>
<body <?php body_class($add_class); ?> style="background-image: url(<?php echo $header_bg; ?>)">
<div class="preloader" id="preloader">
    <div class="load"></div>
</div>
<div class="nav-container">
    <nav class="navbar">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'navbar__list'
        ) );
        ?>
    </nav>
    <a href="#" class="toggle-mnu onnav"><span></span></a>
</div>


