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
            <header id="header" style="background: <?php echo tfp_get_header_img_cssstyle( 'no-repeat' ); ?> background-size: cover;">
                <div class="header-inner">
                    <div class="header-logo">
                        <a class="logo-anker" href="<?php echo home_url(); ?>">
                            <span class="title-logo">
                                <img class="header-logo-img", src="<?php echo tfp_get_logoimg_uri(); ?>" alt="logo img">
                                <?php bloginfo('name'); ?>
                            </span>
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

