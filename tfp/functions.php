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
    } else if (is_404() ) {
        echo '<!-- gpt_404 -->';
        return '404 Not Found';
    }else {
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
    elseif (is_404() ) { /* 404 */
        return 'page-title';
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

/* 記事一覧ページでページャーを出力する */
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

/* パンくずナビを出力する */
function tfp_breadcrumb() {
    /* 404 not foundの場合は出力しない */
    if ( is_404() ) {
        return;
    }
    $post = get_post( get_the_ID() );

    $parent_post = $post->post_parent;
    $parent_title = get_the_title( $parent_post );

    while( $parent_title != the_title( ' ', ' ', false) ) {

        /* 親がない場合はトップページの情報を表示 トップページ自身には表示しない */
        if ( ! $parent_post) {
            echo '<!-- top -->';
            $frontid = get_option( 'page_on_front' );
            if (! is_front_page() ) {
                echo '<a href="' . get_permalink( $frontid ) . '" title="トップページ"> トップページ</a>';
                echo ' &gt; ';
            }
        } else {
            echo '<!-- parent -->';
            echo '<!-- ';
            print_r($parent_post);
            echo ' -->';
            echo '<a href="' . get_permalink( $parent_post ) . '" title="' . $parent_title . '">' . $parent_title . '</a>';

        }
        
        if ( $parent_post ) {
            $parent_post = $parent_post->post_parent;
        }
        $parent_title = get_the_title($parent_post);
        if ( ! $parent_post ) {
            break;
        } else {
            echo ' &gt; ';
        }
        
    }

    // 続けて現在の投稿へのリンク
    if ( ! is_front_page() ) {

        /* 投稿では投稿アーカイブページのリンクを入れる */
        if ( is_single() ) {
            echo '<!-- 1 -->';
            $post_type = get_post_type();
            echo '<!-- 2 $post_type = ' . $post_type . ' -->';
            if ( $post_type == 'post' ) {
                $archive_slug = get_option('tfp_blogarchive_slug');
                $archive_link = get_site_url() . '/' . $archive_slug;
                $archive_page = get_page_by_path($archive_slug, OBJECT);
                $archive_title = $archive_page->post_title;
            }
            else {
                $archive_link = get_post_type_archive_link( $post_type );
                echo '<!-- 3 $archive_link = ' . $archive_link . ' -->';
                $page_path = basename( untrailingslashit( $archive_link ) );
                echo '<!-- 3.5 $page_path = ' . $page_path . ' -->';
                $archive_page = get_page_by_path( $page_path, OBJECT );
                echo '<!-- 3.6 $archive_page = ';
                print_r($archive_page);
                $archive_title = $archive_page->post_title;
                // $archive_title = post_type_archive_title( '', false );
                echo '<!-- archive $archive_title = ' . $archive_title . ' -->';
            }
            echo '<a href="' . $archive_link . '">' . $archive_title . '</a>';
            echo ' &gt; ';
        }

        echo '<!-- current -->';
        echo '<a href="';
        the_permalink();
        echo '" rel="bookmark" title="';
        the_title_attribute();
        echo '">';
        the_title();
        echo '</a>';
    }
}

/* 投稿アーカイブを有効にしてスラッグを指定する */
function post_has_archive( $args, $post_type ) {

    $args['rewrite'] = true;
    if ( $post_type == 'post' ) {
        $urlslug = get_option( 'tfp_blogarchive_slug' );
        if (! $urlslug ) {
            $urlslug = 'blog';
        }
        
    } else {
        $urlslug = $post_type;
    }
    $args['has_archive'] = $urlslug;
    // echo '<!-- $post_type = ' . $post_type . ', $urlslug = ' . $urlslug . ' -->';
    return $args;
}

add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

/* 目次表示ウィジェット */
class TFP_TOCWidget extends WP_Widget {

    function __construct() {
		parent::__construct(
			'tfp_tocwidget', // Base ID
			'TFP目次表示', // Name
			array( 'description' => '投稿の見出しを抽出し、目次を表示します。', ) // Args
		);
    }
    

	/**
	 * 表側の Widget を出力する
	 *
	 * @param array $args      'register_toc_sidebar'で設定した「before_title, after_title, before_widget, after_widget」が入る
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

        echo $args['before_title'];
        echo '目次';
        echo $args['after_title'];


        $dom = new DOMDocument('1.0', 'UTF-8');
        $html = get_the_content();
        @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'),
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xpath = new DOMXPath($dom);
        $xpath->registerNamespace("php", "http://php.net/xpath");
        $xpath->registerPHPFunctions();

        echo '<!-- before query -->';
        $headers = $xpath->query('//*');
        //$headers = $xpath->query('//h2');
        echo '<!-- after query -->';
        echo '<div class="widget-toc">';
        foreach( $headers as $header ) {
            $nodename = $header->nodeName;
            $ankerid = $header->getAttribute('id');

            if ( $ankerid ) {
                $toc_code = '<a href="#' . $ankerid . '">' . $header->nodeValue . '</a>';
            }
            else {
                $toc_code = $header->nodeValue;
            }
        
            if($nodename == 'h1' || $nodename == 'H1' ) {
                echo '<h4>' . $toc_code . '</h4>';
            }
            elseif ($nodename == 'h2' || $nodename == 'H2' ) {
                // print_r($header->getAttribute('id'));
                echo '<h5>' . $toc_code . '</h5>';
            }
            elseif ( $nodename == 'h3' || $nodename == 'H3' ) {
                echo '<h6>' . $toc_code . '</h6>';
            }
        }
        echo '</div><!-- toc -->';
        echo '<!-- after output -->';

        echo $args['after_widget'];
    }
    
    /** Widget管理画面を出力する
     *
     * @param array $instance 設定項目
     * @return string|void
     */
    public function form( $instance ){
    }

    /** 新しい設定データが適切なデータかどうかをチェックする。
     * 必ず$instanceを返す。さもなければ設定データは保存（更新）されない。
     *
     * @param array $new_instance  form()から入力された新しい設定データ
     * @param array $old_instance  前回の設定データ
     * @return array               保存（更新）する設定データ。falseを返すと更新しない。
     */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

}

/* 目次を表示するサイドバー */
function tfp_register_toc_sidebar() {
    register_widget('TFP_TOCWidget');
    register_sidebar ( array (
        'name' => 'tfp投稿ページサイドバー右',
        'id' => 'tfp_right_sidebar',
        'description' => 'TFPの右サイドバー',
        'before_widget' => '<aside class="side-inner">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="sidebar_title">',
        'after_title' => '</h4>'
    ));
}

add_action( 'widgets_init', 'tfp_register_toc_sidebar');

// サイトロゴウィジェットのコード
include_once('functions_logowidget.php');

// 検索フォームにHTML5マークアップのサポートを追加
add_theme_support('html5', array('search-form'));
