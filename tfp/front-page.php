<?php
/**
 * Template Name: Front Page
 * Description: Default Template for front page
 */
?>
<!-- トップページの構造を記載 -->
<?php get_header(); ?>
    <div class="page-inner full-width">
        <div class="page-main" id="postdetail">
            <div class="main-container">
                <div class="main-wrapper">
<?php
 if ( have_posts() ):
 while (  have_posts() ) : the_post();
 get_template_part( 'content-page' );
 endwhile;
 endif;
 ?>
		        </div><!-- main-wrapper -->
		    </div><!-- main-container -->
		</div><!-- postdetail -->
	</div><!-- page-inner -->
<?php get_footer(); ?>
