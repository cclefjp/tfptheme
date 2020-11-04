<div class="wrap">
    <h2> Theme for Programmerの設定 </h2>
    <form method="post", action="options.php">

    <?php settings_fields('tfp_settings'); ?>
    <?php do_settings_sections('tfp_settings'); ?>

    <!-- ここから各フィールドの設定 -->
    <table class="form-table">
        <tbody>

					<tr>
            <th scope="row">
            	<label for="tfp_blogarchive_slug">ブログアーカイブページのslug</label>
            </th>
            <td>
            (パンくずナビで使用します)
            </td>
            <td>
            	<input type="text" id="tfp_blogarchive_slug" class="regular-text" name="tfp_blogarchive_slug" value="<?php echo get_option('tfp_blogarchive_slug'); ?>">
            </td>
          </tr>

            <tr>
            <th scope="row">
            <label for="tfp_logo_img">ロゴ画像</label>
            </th>
            <td>
            <?php echo get_site_url() . '/'; ?>
            </td>
            <td>
            <input type="text" id="tfp_logo_img" class="regular-text" name="tfp_logo_img" value="<?php echo get_option('tfp_logo_img'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="tfp_default_header_img">デフォルトのヘッダー背景画像</label>
            </th>
            <td>
            <?php echo get_site_url() . '/'; ?>
            </td>
            <td>
            <input type="text" id="tfp_default_header_img" class="regular-text" name="tfp_default_header_img" value="<?php echo get_option('tfp_default_header_img'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="tfp_default_post_background">デフォルトの投稿サムネイル背景画像</label>
            </th>
            <td>
            <?php echo get_site_url() . '/'; ?>
            </td>
            <td>
            <input type="text" id="tfp_default_post_background" class="regular-text" name="tfp_default_post_background" value="<?php echo get_option('tfp_default_post_background'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="tfp_header_font_color">ヘッダー部のロゴとページタイトルのフォント色</label>
            </th>
            <td>
            <input type="text" id="tfp_header_font_color" class="regular-text" name="tfp_header_font_color" value="<?php echo get_option('tfp_header_font_color'); ?>">
            </td>
            </tr>

            <th scope="row">
            <label for="tfp_webfonts">使用するWebフォントのリスト</label>
            </th>
            <td>
            使用するWebフォントのURLを改行で区切って記載します。
            </td>
            <td>
            <textarea class="regular-text" name="tfp_webfonts" id="tfp_webfonts" cols="30" rows="5">
                <?php echo get_option('tfp_webfonts'); ?>    
            </textarea>
	        </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="tfp_title_fontfamily">ページタイトルのフォントファミリー</label>
            </th>
            <td>
            <input type="text" id="tfp_title_fontfamily" class="regular-text" name="tfp_title_fontfamily" value="<?php echo get_option('tfp_title_fontfamily'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="tfp_twitter_account">フッターからリンクするTwitterアカウント</label>
            </th>
            <td>
            @
            </td>
            <td>
            <input type="text" id="tfp_twitter_account" class="regular-text" name="tfp_twitter_account" value="<?php echo get_option('tfp_twitter_account'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
            <label for="tfp_github_account">フッターからリンクするGitHubアカウント</label>
            </th>
            <td>
            https://github.com/
            </td>
            <td>
            <input type="text" id="tfp_github_account" class="regular-text" name="tfp_github_account" value="<?php echo get_option('tfp_github_account'); ?>">
            </td>
            </tr>

            <tr>
            <th scope="row">
                <label for="tfp_copyright_statement">著作権表示</label>
            </th>
            <td>
            <input type="text" id="tfp_copyright_statement" class="regular-text" name="tfp_copyright_statement" value="<?php echo get_option('tfp_copyright_statement'); ?>">
            </td>
            </tr>

        </tbody>
    </table>

    <?php submit_button(); ?>
    </form>
</div> <!-- wrap -->
