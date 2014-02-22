<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie10 lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie10 lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="author" content="<?php bloginfo('name'); ?>" />
    <title><?php wp_title( ' - ', 1, 'right' ); ?><?php bloginfo('name'); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/elements/img/favicon.ico" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <h1 class="logo">
            <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo('name'); ?></a>
        </h1>
        <?php wp_nav_menu(
            array(
                'theme_location'  => 'main-nav',
                'menu'            => '',
                'container'       => 'nav',
                'container_class' => 'main-nav-container',
                'container_id'    => '',
                'menu_class'      => 'main-nav',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => ''
            )
        ); ?>
    </header>
