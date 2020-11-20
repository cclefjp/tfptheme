<!-- 全てのページのヘッダを記載 -->
<!DOCTYPE HTML>
<html lang="<?php bloginfo( 'language' ); ?>">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <?php echo tfp_include_webfonts(); ?>
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
        <title><?php get_the_title(); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <header id="header" style="background: <?php echo tfp_get_header_img_cssstyle( 'no-repeat' ); ?> background-size: cover;">
                <div class="header-inner">
                    <?php the_widget('TFP_LogoWidget'); ?>
                    <div class="header-searchbox">
                        <?php get_search_form(true); ?>
                    </div>
                    <div class="header-navi">
                        <nav class="header-navi">
                        <?php wp_nav_menu(
                            array ( 
                            'theme_location' => 'header-navi'
                        )
                        ); ?>
                        </nav>
                    </div> <!-- header-navi -->
                    <div class="<?php echo tfp_get_title_class(); ?>" style="
                    color: <?php echo tfp_get_header_font_color(); ?>;
                    font-family: <?php echo tfp_get_title_font_family(); ?>;
                    ">
                        <?php echo tfp_get_page_title(); ?>
                    </div><!-- page-title -->
                </div> <!-- header-inner -->
            </header>
            <div class="page-body">
            	<?php if ( function_exists( 'tfp_breadcrumb' )): ?>
              	<div class="breadcrumb">
									<?php tfp_breadcrumb(); ?>
								</div><!-- breadcrumb -->
							<?php endif; ?>

