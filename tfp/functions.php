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

/* フッター部のSNS linkコードを出力する。 */
/* <li class="..."><a ...></li>の繰り返し */
function tfp_get_sns_link() {
    $statement = '';

    /* twitter */
    $twitter_account = get_option( 'tfp_twitter_account' );
    if ( $twitter_account) {
        $statement = $statement . '<li class="twitter"><a class="twitter-anker" href="https://twitter.com/';
        $statement = $statement . $twitter_account . '" target="_blank" rel="noopener noreferrer"></a></li>';
    }

    /* github */
    $github_account = get_option( 'tfp_github_account' );
    if ( $github_account) {
        $statement = $statement . '<li class="github">';
        $statement = $statement . '<a class="github-anker" href="https://github.com/';
        $statement = $statement . $github_account . '" target="_blank" rel="noopener noreferrer"></a></li>';
    }

    return $statement;
}

/* ヘッダー画像のURLを得る */
function tfp_get_header_img() {

    if ( has_post_thumbnail() ) {
        $img_id = get_post_thumbnail_id();
        $img_src = wp_get_attachment_image_src($img_id, 'full');

        if ($img_src) {
            return $img_src[0];
        }
    } else {
        /* デフォルトのヘッダー画像 */
        $img_src = get_option( 'tfp_default_header_img' );
        if ( $img_src ) {
            return get_site_url() . '/' . $img_src;
        }
    }
    return '';
}

/* ヘッダー画像をCSSスタイルで返す url(...) */
function tfp_get_header_img_cssstyle( $css_option ) {
    $imgurl = tfp_get_header_img();
    if ( $imgurl ) {
        $imgcss = 'url(' . $imgurl . ') ' . $css_option . ';';
        return $imgcss;
    }
    else {
        return '';
    }
}

/* アイキャッチ画像を使用可能にする */
add_theme_support('post-thumbnails');

/* ページタイトルを得る(ヘッダー部画像重ね表示用) */
function tfp_get_page_title() {
    echo '<!-- tfp_get_page_title -->';
    if( is_front_page() ) {
        echo '<!-- gpt_front -->';
        return get_bloginfo( 'name' );
    } else {
        echo '<!-- gpt_not_front -->';
        return get_the_title();
    }
}
/* ヘッダ背景に重ねるロゴ、タイトル文字のフォント色を得る */
function tfp_get_header_font_color() {
    return get_option('tfp_header_font_color');
}

/* タイトルクラスを返す関数 */
function tfp_get_title_class() {
    if ( is_page() ) { /* 固定ページ */
        return 'page-title';
    }
    elseif ( is_single() ) { /* 投稿ページ */
        return 'post-title';
    }
}