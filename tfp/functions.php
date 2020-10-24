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
    return tfp_get_customposts('post');
    /*
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array (
        'post_type' => 'post',
        'order' => 'DESC',
        'paged' => $paged
    );
    $tfp_posts = new WP_Query($args);
    return $tfp_posts;
    */
}

/* カスタム投稿タイプの投稿一覧を得る */
function tfp_get_customposts( $post_type ) {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array (
        'post_type' => $post_type,
        'order' => 'DESC',
        'paged' => $paged
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

    /* 'header_img' というカスタムフィールドを検索 */
    $header_img_url = get_post_meta(get_the_ID(), 'header_img', true);
    if ( $header_img_url ) {
        return $header_img_url;
    }
    else {
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

/* 使用するWebフォントをインクルードするHTMLコードを返す */
function tfp_include_webfonts() {
    echo '<!-- tfp_include_webfonts -->';
    $webfonts_src = get_option('tfp_webfonts');
    $exploded = explode("\n", $webfonts_src);
    $result = '';
    foreach ( $exploded as $url) {
        if ( $url ) {
            $result = $result . '<link rel="stylesheet" href="' . $url . '">';
        }
    }
    return $result;
}

/* ページタイトルの表示に使用するフォントファミリーを得る */
function tfp_get_title_font_family() {
    $family = get_option('tfp_title_fontfamily');
    if ( $family ) {
        return $family;
    }
    else {
        return 'sans-serif';
    }
}

/* 投稿一覧用の背景画像を呼び出し、URLを返す。
この関数はWordPressループ内で呼び出すこと */
function tfp_get_post_background() {

    $img_src = get_option( 'tfp_default_post_background');
    if ( $img_src ) {
        return get_site_url() . '/' . $img_src;
    }
};

/* 投稿一覧用のサムネイル画像を呼び出し、<img>タグのHTMLコードを返す。
この巻数はWordPressループ内で呼び出すこと */
function tfp_get_post_thumbnail() {
    if ( has_post_thumbnail() ) {
        $img_id = get_post_thumbnail_id();
        $img_src = wp_get_attachment_image_src($img_id, 'full');

        if ($img_src) {
            $img_code = '<img class="post-thumbnail-img" src=' . $img_src[0] . '>';
            return $img_code;
        }
    }
    return '';
}

/* 記事一覧ページでページャーを出力する 
the_queryを使用するため、この関数はWP_Queryを使用した
文脈で使用すること */
function tfp_pagenavi( $the_query ) {

    echo '<!-- tfp_pagenavi -->';
    $big = 999999999;

    $param = array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '/page/%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $the_query->max_num_pages
    );

    echo paginate_links( $param );

}