<?php
/**
 * Template Name: Custom
 * Description: Template for custom posts
 */
?>
<!-- カスタム投稿一覧ページの構造を記載 -->

<?php
/**
 * カスタム投稿タイプの一覧をブログ記事一覧のように表示するためのテンプレート
 * 使用法:
 * 1. カスタム投稿タイプの識別子がhogehogeであるなら、このページをpage-hogehoge.php
 * と改名してください。
 * 2. このphpブロック下部の$customtype_nameを'hogehoge'に変更してください。
 * 3. 現状では各投稿の見え方はブログ同様content-archive.phpによって表示されますが、カスタマイズ
 * する場合はcontent-archive.phpを別ファイルにコピーし、このファイル下部のget_template_partで
 * カスタマイズした新しいファイルを読み込むようにしてください。
 * 4. 一覧を表示する固定ページの編集ページにおいてこのテンプレートを適用してください。固定ページのURLスラッグ
 * がhogehogeと一致している場合はデフォルトテンプレートとして本テンプレートが適用されます。
 */
$customtype_name = 'hogehoge'
?>

<?php get_header(); ?>
<div class="page-inner full-width">
    <div class="page-main" id="archive">
        <div class="main-container">
            <div class="main-wrapper">
                <div class="postLists">

<?php
    $tfp_custom_posts = tfp_get_customposts($customtype_name);
    if (  $tfp_custom_posts->have_posts() ):
        while ( $tfp_custom_posts->have_posts() ):
            $tfp_custom_posts->the_post();
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