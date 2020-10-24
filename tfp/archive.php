<?php
/**
 * Template Name: Archive
 * Description: Template for blog posts
 */
?>
<!-- 投稿一覧ページの構造を記載 -->
<?php get_header(); ?>
<div class="page-inner full-width">
    <div class="page-main" id="archive">
        <div class="main-container">
            <div class="main-wrapper">
                <ul class="postLists">

<?php
    $the_query = tfp_get_posts();
    if (  $the_query->have_posts() ):
        while ( $the_query->have_posts() ):
            $the_query->the_post();
            get_template_part( 'content-archive' );
        endwhile;
        wp_reset_postdata();
    endif;
?>
                </ul><!-- postLists -->
		        <div class="pager">
<?php
    if (function_exists( 'tfp_pagenavi' )):
        tfp_pagenavi( $the_query );
    endif;
?>
		        </div><!-- pager -->
            </div><!-- main-wrapper -->
        </div><!-- main-container -->
    </div><!-- page-main -->
</div><!-- page-inner -->
<?php get_footer(); ?>