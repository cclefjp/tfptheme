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
                <div class="postLists">

<?php
    $tfp_posts = tfp_get_posts();
    if (  $tfp_posts->have_posts() ):
        while ( $tfp_posts->have_posts() ):
            $tfp_posts->the_post();
            get_template_part( 'content-archive' );
        endwhile;
        wp_reset_postdata();
    endif;
?>
                </div><!-- postLists -->
		        <div class="pager">
		      	    <ul class="pagerList">
<?php
    if (function_exists( 'tfp_pagenavi' )):
        tfp_pagenavi();
    endif;
?>
			        </ul>
		        </div><!-- pager -->
            </div><!-- main-wrapper -->
        </div><!-- main-container -->
    </div><!-- page-main -->
</div><!-- page-inner -->
<?php get_footer(); ?>