<?php
/* functions.php - tfpテーマ用の関数群 */

/* カスタムメニューを有効化する */
register_nav_menus(
    array(
    'header-navi' => 'Header Menu',
    'footer-navi' => 'Footer Menu'
    )
);

/* サイト全体の設定項目を管理する設定ページ */
include 'tfp-settings.php';

/* ロゴ画像を得る */
function tfp_get_logoimg_uri() {
    $logoimgpath = get_site_url() . '/' . get_option( 'tfp_logo_img' );
    return esc_url( $logoimgpath );
}

/* 公開ブログ投稿一覧を得る */
function tfp_get_posts() {
    $args = array (
        'post_type' => 'post',
        'order' => 'DESC'
    );
    $tfp_posts = new WP_Query($args);
    return $tfp_posts;
}

/* カスタム投稿タイプの投稿一覧を得る */
function tfp_get_customposts( $post_type ) {
    $args = array (
        'post_type' => $post_type,
        'order' => 'DESC'
    );
    $tfp_customposts = new WP_Query($args);
    return $tfp_customposts;
}

/* 著作権表示のための文章を得る */
function tfp_get_copyright_statement() {
    return get_option( 'tfp_copyright_statement' );
}