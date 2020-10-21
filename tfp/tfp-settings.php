<?php

/**
 * tfp-settings.php
 * Theme for Programmerのサイト全体に影響するの設定画面に関する記載
 */

 /* メニューにtfp設定画面を追加 */
 add_action('admin_menu', 'tfp_setting_menu');
 function tfp_setting_menu() {
     add_options_page(
         'tfp', //タイトル
         'tfp', //表示名
         'manage_options', //権限
         'tfp_settings', //ページid
         'tfp_setting_page' //Viewを読み出す関数
     );
 }

 /* 設定ページ内のフィールドの作成 */
add_action('admin_init', 'register_tfp_settings');
function register_tfp_settings() {
    $tfp_options = ['logo_img',
                    'default_header_img',
                    'default_post_img',
                    'header_font_color',
                    'webfonts',
                    'title_fontfamily',
                    'copyright_statement',
                    'twitter_account',
                    'github_account'];
    foreach($tfp_options as $tfp_option) {
        register_setting('tfp_settings', 'tfp_' . $tfp_option);
    }
}

/* Viewの設定 */
function tfp_setting_page() {
    include 'view_tfpsetting.php';
}