<!-- 全てのページのヘッダを記載 -->
<!DOCTYPE HTML>
<html lang="<?php bloginfo( 'language' ); ?>">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
        <title><?php get_the_title(); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <header id="header">
                <div class="header-inner">
                    <div class="logo">
                        <a class="logo-header" href="<?php echo home_url(); ?>">
                            <img src="<?php echo tfp_get_logoimg_uri(); ?>" alt="<?php bloginfo('name'); ?>">
                        </a>
                    </div> <!-- logo -->
                    <div class="header-navi">
                        <nav class="header-navi">
                        <?php wp_nav_menu(
                            array ( 
                            'theme_location' => 'header-navi'
                        )
                        ); ?>
                        </nav>
                    </div> <!-- header-navi -->
                </div> <!-- header-inner -->
            </header>

